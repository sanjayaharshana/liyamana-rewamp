<?php

namespace App\Admin\Controllers;

use App\Models\TempleteCategories;
use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;

class TempleteCategoriesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'TempleteCategories';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new TempleteCategories());

        $grid->column('id', __('Id'));
        $grid->column('category_name', __('Category name'));
        $grid->column('slug', __('Slug'));
        $grid->column('icon', __('Icon'));
        $grid->column('image', __('Image'));
        $grid->column('category_description', __('Category description'));
        $grid->column('seo_description', __('Seo description'));
        $grid->column('status', __('Status'));
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
        $show = new Show(TempleteCategories::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('category_name', __('Category name'));
        $show->field('slug', __('Slug'));
        $show->field('icon', __('Icon'));
        $show->field('image', __('Image'));
        $show->field('category_description', __('Category description'));
        $show->field('seo_description', __('Seo description'));
        $show->field('status', __('Status'));
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
        $form = new Form(new TempleteCategories());

        $form->textarea('category_name', __('Category name'));
        $form->text('slug', __('Slug'));
        $form->text('icon', __('Icon'));
        $form->image('image', __('Image'));
        $form->textarea('category_description', __('Category description'));
        $form->textarea('seo_description', __('Seo description'));
        $form->switch('status', __('Status'))->default(1);

        return $form;
    }
}
