<?php

namespace App\Admin\Controllers;

use App\Models\Order;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OrdersController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '充值订单详情';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order);

        $grid->column('no', '订单流水号');
        $grid->column('user.name', '商家姓名');
        $grid->column('price','真实金额');
        $grid->column('give_price','赠送金额');
        $grid->column('payment_no','支付宝订单号');
        $grid->column('pay_status')->display(function($value){
            return Order::$PAYStatusMap[$value];
        });
        $grid->column('paid_at', '支付时间');
        // 禁用创建按钮，后台不需要创建订单
        $grid->disableCreateButton();
        $grid->actions(function ($actions) {
            // 禁用删除和编辑按钮
            $actions->disableDelete();
            $actions->disableEdit();
        });
        $grid->tools(function ($tools) {
            // 禁用批量删除按钮
            $tools->batch(function ($batch) {
                $batch->disableDelete();
            });
        });
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Order::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('no', __('No'));
        $show->field('user_id', __('User id'));
        $show->field('price', __('Price'));
        $show->field('give_price', __('Give price'));
        $show->field('total_amount', __('Total amount'));
        $show->field('payment_method', __('Payment method'));
        $show->field('payment_no', __('Payment no'));
        $show->field('pay_status', __('Pay status'));
        $show->field('paid_at', __('Paid at'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Order);

        $form->text('no', __('No'));
        $form->number('user_id', __('User id'));
        $form->decimal('price', __('Price'));
        $form->decimal('give_price', __('Give price'));
        $form->decimal('total_amount', __('Total amount'));
        $form->text('payment_method', __('Payment method'))->default('alipay');
        $form->text('payment_no', __('Payment no'));
        $form->text('pay_status', __('Pay status'))->default('pending');
        $form->datetime('paid_at', __('Paid at'))->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
