<?php

namespace App\Admin\Controllers;

use App\Models\PageSizes;
use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;

class PageSizesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'PageSizes';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PageSizes());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('width', __('Width'));
        $grid->column('height', __('Height'));
        $grid->column('unit', __('Unit'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(PageSizes::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('width', __('Width'));
        $show->field('height', __('Height'));
        $show->field('unit', __('Unit'));
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
        $form = new Form(new PageSizes());

        $form->text('name', __('Name'))->required();
        $form->text('width', __('Width'))->required();
        $form->text('height', __('Height'))->required();
        $form->select('unit', __('Unit'))->options([
            'px' => 'px',
            'em' => 'em',
            'rem' => 'rem',
            'vh' => 'vh',
        ])->required();

        return $form;
    }
}
