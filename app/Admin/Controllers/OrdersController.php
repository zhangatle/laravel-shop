<?php

namespace App\Admin\Controllers;

use App\Exceptions\InvalidRequestException;
use Illuminate\Http\Request;
use App\Models\Order;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Illuminate\Foundation\Validation\ValidatesRequests;

class OrdersController extends AdminController
{
    use ValidatesRequests;
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '订单';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order());
        $grid->model()->whereNotNull('paid_at')->orderBy('paid_at', 'desc');

        $grid->column('no', '订单流水号');
        $grid->column('user.name', '买家');
        $grid->column('total_amount', '总金额')->sortable();
        $grid->column('paid_at', '支付时间')->sortable();
        $grid->column('ship_status','物流')->display(function ($value) {
            return Order::$shipStatusMap[$value];
        });
        $grid->column('refund_status', '退款状态')->display(function ($value) {
            return Order::$refundStatusMap[$value];
        });
        // 禁用创建按钮，后台不需要创建订单
        $grid->disableCreateButton();
        $grid->actions(function ($actions) {
            // 禁用删除和编辑
            $actions->disableDelete();
            $actions->disableEdit();
        });
        $grid->tools(function ($tools) {
            $tools->batch(function ($batch) {
                $batch->disableDelete();
            });
        });

        return $grid;
    }

    /**
     * @param $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content->header('查看订单')->body(view('admin.orders.show', ['order'=> Order::find($id)]));
    }

    public function ship(Order $order, Request $request) {
        if (!$order->paid_at) {
            throw new InvalidRequestException('该订单未付款');
        }
        // 判断是否发货
        if ($order->ship_status !== Order::SHIP_STATUS_PENDING){
            throw new InvalidRequestException('该订单已发货');
        }
        // Laravel 5.5 之后 validate 方法可以返回校验过的值
        $data = $this->validate($request, [
            'express_company' => ['required'],
            'express_no'      => ['required'],
        ], [], [
            'express_company' => '物流公司',
            'express_no'      => '物流单号',
        ]);
        $order->update([
            'ship_status' => Order::SHIP_STATUS_DELIVERED,
            'ship_data' => $data,
        ]);
        // 返回上一页
        return redirect()->back();
    }
}
