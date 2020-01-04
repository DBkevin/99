<?php

namespace App\Admin\Controllers;

use App\Models\Rate;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class RatesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '价格明细';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Rate);

        $grid->column('id',"id");
        $grid->column('plant',"平台名称");
        $grid->column('type_name', "项目名称");
        $grid->column('price',"价格");
        $grid->column('VIPprie', "VIP价格");
        $grid->column('show_1',"200元每个任务的价格");
        $grid->column('show_2', "1000元每个任务的价格");
        $grid->column('show_3',"1000元每个任务的价格");
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
        $show = new Show(Rate::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('plant', __('Plant'));
        $show->field('type_name', __('Type name'));
        $show->field('price', __('Price'));
        $show->field('VIPprie', __('VIPprie'));
        $show->field('show_1', __('Show 1'));
        $show->field('show_2', __('Show 2'));
        $show->field('show_3', __('Show 3'));
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
        $form = new Form(new Rate);

        $form->text('plant', '平台名称')->help('拼多多任务，京东任务，淘宝任务,字必须一致，否则无法检索和扣费');
        $form->text('type_name','任务名称')->help('app流量，app展现,统一小写英文字母，否则无法检索和扣费');
        $form->number('price', '价格')->help('30流量币就填写30即可,');
        $form->number('VIPprie', 'VIP价格')->help('30流量币就填写30即可,');
        $form->text('show_1', '充值200元')->help("要和赠送的对的上");
        $form->text('show_2','充值1000元')->help("要和赠送的对的上");
        $form->text('show_3', '充值10000元')->help("要和赠送的对的上");

        return $form;
    }
}
