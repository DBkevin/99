<?php

namespace App\Admin\Controllers;

use App\Models\Product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '充值赠送';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product);

        $grid->id('ID')->sortable();
        $grid->column('interval_price','基准金额');
        $grid->column('give_price', '赠送金额');
        $grid->column('base', '赠送基数');

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
        $show = new Show(Product::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('interval_price', __('Interval price'));
        $show->field('give_price', __('Give price'));
        $show->field('base', __('Base'));
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
        $form = new Form(new Product);

        $form->currency('interval_price', '金额区间下限')->symbol('￥')->help("充值金额如:200-500元赠送20元，这里填200。500-1000赠送100元，这个填写500，以此类推，填区间下限");
        $form->currency('give_price', '赠送金额')->default(0.00)->symbol('￥')->help("赠送金额如:200-500元赠送20元，这里填20。500-1000赠送100元，这个填写100，以此类推，这里要跟上一个对应");
        $form->number('base', '基础倍数，默认无需修改')->default(1)->help("更多充值赠送方式，预留，保持默认为1即可");;

        return $form;
    }
}
