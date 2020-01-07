<?php

namespace App\Admin\Controllers;

use App\Models\Task;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TasksController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '任务列表';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Task);

        $grid->column('id', __('Id'));
        $grid->column('user.name', '用户姓名');
        $grid->column('plant', "平台类别");
        $grid->column('type', "任务类别");
        $grid->column('status', "任务状态");
        $grid->column('pro_url',"链接");
        $grid->column('pro_title', "标题");
        $grid->column('keyword', "关键字");
        $grid->column('start_time', "任务时间");
        $grid->column('custom_1', "自定义需求1");
        $grid->column('custom_2', "自定义需求2");
        $grid->column('custom_3', "自定义需求3");
        $grid->column('custom_4', "自定义需求4");
        $grid->column('remark', "备注");
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
        $show = new Show(Task::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('plant', __('Plant'));
        $show->field('task', __('Task'));
        $show->field('type', __('Type'));
        $show->field('status', __('Status'));
        $show->field('pro_url', __('Pro url'));
        $show->field('pro_title', __('Pro title'));
        $show->field('keyword', __('Keyword'));
        $show->field('show', __('Show'));
        $show->field('start_time', __('Start time'));
        $show->field('custom_1', __('Custom 1'));
        $show->field('custom_2', __('Custom 2'));
        $show->field('custom_3', __('Custom 3'));
        $show->field('custom_4', __('Custom 4'));
        $show->field('remark', __('Remark'));
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
        $form = new Form(new Task);

        $form->number('user_id', __('User id'));
        $form->text('plant', __('Plant'));
        $form->text('task', __('Task'));
        $form->text('type', __('Type'));
        $form->text('status', __('Status'))->default('pending');
        $form->text('pro_url', __('Pro url'));
        $form->text('pro_title', __('Pro title'));
        $form->text('keyword', __('Keyword'));
        $form->number('show', __('Show'))->default(1);
        $form->datetime('start_time', __('Start time'))->default(date('Y-m-d H:i:s'));
        $form->text('custom_1', __('Custom 1'));
        $form->text('custom_2', __('Custom 2'));
        $form->text('custom_3', __('Custom 3'));
        $form->text('custom_4', __('Custom 4'));
        $form->textarea('remark', __('Remark'));

        return $form;
    }
}
