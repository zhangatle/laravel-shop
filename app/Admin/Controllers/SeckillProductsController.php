<?php
namespace App\Admin\Controllers;

use App\Models\Product;
use App\Models\ProductSku;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Illuminate\Support\Facades\Redis;

class SeckillProductsController extends CommonProductsController
{
    public function getProductType()
    {
        return Product::TYPE_SECKILL;
    }

    protected function customGrid(Grid $grid)
    {
        $grid->column('id', 'ID')->sortable();
        $grid->column('title', '商品名称');
        $grid->column('on_sale', '已上架')->display(function ($value) {
            return $value ? '是' : '否';
        });
        $grid->column('price', '价格');
        $grid->column('seckill.start_at', '开始时间');
        $grid->column('seckill.end_at', '结束时间');
        $grid->column('sold_count', '销量');
    }

    protected function customForm(Form $form)
    {
        // 秒杀相关字段
        $form->datetime('seckill.start_at', '秒杀开始时间')->rules('required|date');
        $form->datetime('seckill.end_at', '秒杀结束时间')->rules('required|date');
        // 当商品表单保存完毕时触发
        $form->saved(function (Form $form) {
            $product = $form->model();
            // 商品重新加载秒杀和sku字段
            $product->load(['seckill', 'skus']);
            $diff = $product->seckill->end_at->getTimestamp() - time();
            // 遍历商品sku
            $product->skus->each(function (ProductSku $sku) use ($diff, $product) {
                // 如果秒杀商品是上架并且尚未到结束时间
                if($product->on_sale && $diff > 0) {
                    Redis::setex('seckill_sku_'.$sku->id, $diff, $sku->stock);
                } else {
                    Redis::del('seckill_sku_'.$sku->id);
                }
            });
        });
    }
}