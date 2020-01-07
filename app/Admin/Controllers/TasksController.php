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

        $show->field('id', "id");
        $show->field('usrs','商户姓名')->as(function($user){
            return $user->name();
        });
        $show->field('plant', "任务平台");
        $show->field('task', '任务大类');
        $show->field('type', '任务类别');
        $show->status()->as(function ($value){
            if($value=="pending"){
                return "进行中";
            }
          return  "已完成";
        });
        $show->field('pro_url', '商品链接');
        $show->field('pro_title', '商品标题');
        $show->field('keyword', '关键词');
        $show->field('start_time', '任务开始时间');
        $show->field('custom_1', '自定义需求1');
        $show->field('custom_2', '自定义需求2');
        $show->field('custom_3','自定义需求3');
        $show->field('custom_4', '自定义需求4');
        $show->field('remark','备注');

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

        $form->text('user.name', '用户姓名');
        $form->text('plant', '任务平台');
        $form->text('task', '任务大类');
        $form->text('type', '任务类别');
        $form->text('status', '任务状态')->default('pending');
        $form->text('pro_url', '商品链接');
        $form->text('pro_title','商品标题');
        $form->text('keyword', '关键字');
        $form->datetime('start_time', "任务开始时间")->default(date('Y-m-d H:i:s'));
        $form->text('custom_1','自定义需求1');
        $form->text('custom_2', '自定义需求2');
        $form->text('custom_3', '自定义需求3');
        $form->text('custom_4', '自定义需求4');
        $form->textarea('remark', '任务说明');

        return $form;
    }
}
