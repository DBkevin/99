<?php

namespace App\Admin\Controllers;

use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UsersController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '商户管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User);

        $grid->id('ID');
        $grid->name('姓名');
        $grid->phone('电话号码');
        $grid->qq('QQ')->display(function ($value) {
            return $value ? $value : '无';
        });
        $grid->level('会员等级')->display(function($value){
            if($value==2){
                return "VIP";
            }else{
                return '普通';
            }
        });
        $grid->price('金额');
        $grid->column('total_price','累计金额');
        $grid->column('payment', '消费');
        $grid->column('tixian_price', '提现');
        $grid->created_at('注册时间');
           // 不在页面显示 `新建` 按钮，因为我们不需要在后台新建用户
        $grid->disableCreateButton();
        // 同时在每一行也不显示 `编辑` 按钮
        $grid->disableActions();

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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('phone', __('Phone'));
        $show->field('qq', __('Qq'));
        $show->field('email', __('Email'));
        $show->field('email_verified_at', __('Email verified at'));
        $show->field('password', __('Password'));
        $show->field('remember_token', __('Remember token'));
        $show->field('level', __('Level'));
        $show->field('price', __('Price'));
        $show->field('total_price', __('Total price'));
        $show->field('payment', __('Payment'));
        $show->field('tixian_price', __('Tixian price'));
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
        $form = new Form(new User);

        $form->text('name', __('Name'));
        $form->mobile('phone', __('Phone'));
        $form->text('qq', __('Qq'));
        $form->email('email', __('Email'));
        $form->datetime('email_verified_at', __('Email verified at'))->default(date('Y-m-d H:i:s'));
        $form->password('password', __('Password'));
        $form->text('remember_token', __('Remember token'));
        $form->number('level', __('Level'));
        $form->decimal('price', __('Price'))->default(0.00);
        $form->decimal('total_price', __('Total price'))->default(0.00);
        $form->decimal('payment', __('Payment'))->default(0.00);
        $form->decimal('tixian_price', __('Tixian price'))->default(0.00);

        return $form;
    }
}
