<?php

namespace App\Admin\Controllers;

use App\Models\BlogPosts;
use App\Models\TempleteCategories;
use OpenAdmin\Admin\Auth\Database\Administrator;
use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;

class BlogPostsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'BlogPosts';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new BlogPosts());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('content', __('Content'));
        $grid->column('slug', __('Slug'));
        $grid->column('status', __('Status'));
        $grid->column('is_featured', __('Is featured'));
        $grid->column('featured_image', __('Featured image'));
        $grid->column('category_ids', __('Category ids'));
        $grid->column('user_id', __('User id'));
        $grid->column('tags', __('Tags'));
        $grid->column('seo_description', __('Seo description'));
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
        $show = new Show(BlogPosts::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('content', __('Content'));
        $show->field('slug', __('Slug'));
        $show->field('status', __('Status'));
        $show->field('is_featured', __('Is featured'));
        $show->field('featured_image', __('Featured image'));
        $show->field('category_ids', __('Category ids'));
        $show->field('user_id', __('User id'));
        $show->field('tags', __('Tags'));
        $show->field('seo_description', __('Seo description'));
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
        $form = new Form(new BlogPosts());

        $form->text('title', __('Title'));
        $form->textarea('content', __('Content'));
        $form->text('slug', __('Slug'));
        $form->switch('status', __('Status'))->default(1);
        $form->switch('is_featured', __('Is featured'));
        $form->file('featured_image', __('Featured image'));

        $blog =  TempleteCategories::where('status', 1)
            ->pluck('category_name','id');

        $users = Administrator::get()
            ->pluck('username','id');
        $form->multipleSelect('category_ids', __('Categories'))->options($blog);
        $form->multipleSelect('user_id', __('User'))->options($users);
        $form->textarea('tags', __('Tags'));
        $form->textarea('seo_description', __('Seo description'));

        return $form;
    }
}
