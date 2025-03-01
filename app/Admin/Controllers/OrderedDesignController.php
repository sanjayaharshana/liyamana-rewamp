<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\OrderedDesign;

class OrderedDesignController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'OrderedDesign';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new OrderedDesign());

        $grid->column('id', __('Id'));
        $grid->column('price', __('Price'));
        $grid->column('status', __('Status'));
        $grid->column('created_at', __('Created at'))->display(function ($created_at) {
          // Human-readable date
            return date('d M Y H:i', strtotime($created_at));
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
        $show = new Show(OrderedDesign::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('address', __('Address'));
        $show->field('price', __('Price'));
        $show->field('design', __('Design'));
        $show->field('status', __('Status'));
        $show->field('user_id', __('User id'));
        $show->field('order_details', __('Order details'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('template_id', __('Template id'));
        $show->field('printing_details', __('Printing details'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new OrderedDesign());

        $form->textarea('address', __('Address'));
        $form->textarea('price', __('Price'));
        $form->text('design', __('Design'));
        $form->text('status', __('Status'))->default('pending');
        $form->textarea('user_id', __('User id'));
        $form->textarea('order_details', __('Order details'));
        $form->textarea('template_id', __('Template id'));
        $form->textarea('printing_details', __('Printing details'));

        return $form;
    }
}
