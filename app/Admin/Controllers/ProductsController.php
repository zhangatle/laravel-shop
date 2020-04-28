<?php

namespace App\Admin\Controllers;

use App\Models\Product;
use Encore\Admin\Form;
use Encore\Admin\Grid;

class ProductsController extends CommonProductsController
{
    public function getProductType()
    {
        return Product::TYPE_NORMAL;
    }

    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '商品';

    protected function customGrid(Grid $grid)
    {
        $grid->model()->with(['category']);
        $grid->column('id','ID')->sortable();
        $grid->column('title','商品名称');
        $grid->column('category.name','类目');
        $grid->column('on_sale','已上架')->display(function ($value){
            return $value ? '是' : '否';
        });
        $grid->column('rating','评分');
        $grid->column('sold_count','销量');
        $grid->column('review_count','评论数');
        $grid->column('price','价格');
    }

    protected function customForm(Form $form)
    {
        // TODO: Implement customForm() method.
    }
}
