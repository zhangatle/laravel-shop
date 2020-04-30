<?php

namespace App\Jobs;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class CloseOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $order;

    /**
     * CloseOrder constructor.
     * @param Order $order
     * @param $delay
     */
    public function __construct(Order $order, $delay)
    {
        $this->order = $order;
        $this->delay($delay);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if($this->order->paid_at) {
            return;
        }
        DB::transaction(function () {
            $this->order->update(['closed' => true]);
            foreach ($this->order->items as $item) {
                // 当前订单类型是秒杀订单，并且对应的商品是上架且尚未到截止时间
                if($item->order->type === Order::TYPE_SECKILL && $item->product->on_sale && !$item->product->seckill->is_after_end) {
                    Redis::incr('seckill_sku_'.$item->productSku->id);
                }
                $item->productSku->addStock($item->amount);
            }
            if($this->order->couponCode) {
                $this->order->couponCode->changeUsed(false);
            }
        });
    }
}
