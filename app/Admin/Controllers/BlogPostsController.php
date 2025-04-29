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

        $grid->model()->orderBy('created_at', 'desc');

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('content', __('Content'));
        $grid->column('slug', __('Slug'));
        $grid->column('status', __('Status'))->switch();
        $grid->column('is_featured', __('Featured'))->switch();
        $grid->column('featured_image', __('Featured image'))->image();
        $grid->column('category_ids', __('Categories'))->display(function ($categoryIds) {
            if (empty($categoryIds)) return '';

            $categories = TempleteCategories::whereIn('id', $categoryIds)->pluck('category_name')->toArray();
            return implode(', ', $categories);
        });
        $grid->column('user_id', __('Author'))->display(function ($userId) {
            $user = Administrator::find($userId);
            return $user ? $user->username : 'Unknown';
        });
        $grid->column('tags', __('Tags'))->display(function($tags) {
            if (is_string($tags)) {
                $tags = json_decode($tags, true);
            }
            return is_array($tags) ? implode(', ', $tags) : $tags;
        });
        $grid->column('seo_description', __('Seo description'));
        $grid->column('created_at', __('Created'))->sortable();
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
        $show->field('category_ids', __('Category ids'))->as(function($category_ids) {
            if (is_string($category_ids)) {
                $category_ids = json_decode($category_ids, true);
            }
            return is_array($category_ids) ? implode(', ', $category_ids) : $category_ids;
        });
        $show->field('user_id', __('User id'));
        $show->field('tags', __('Tags'))->as(function($tags) {
            if (is_string($tags)) {
                $tags = json_decode($tags, true);
            }
            return is_array($tags) ? implode(', ', $tags) : $tags;
        });
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

        $form->text('title', __('Title'))->required();
        $form->textarea('content', __('Content'))->required();
        $form->text('slug', __('Slug'))->required();
        $form->switch('status', __('Status'))->default(1);
        $form->switch('is_featured', __('Is featured'))->default(0);
        $form->file('featured_image', __('Featured image'));

        $blog = TempleteCategories::where('status', 1)
            ->pluck('category_name', 'id');

        $users = Administrator::get()
            ->pluck('username', 'id');

        // Change from multipleSelect to select for user_id
        $form->select('user_id', __('User'))->options($users)->required();

        // Keep multipleSelect for category_ids
        $form->multipleSelect('category_ids', __('Categories'))->options($blog);

        $form->tags('tags', __('Tags'));
        $form->textarea('seo_description', __('Seo description'));

        // Handle saving of arrays
        $form->saving(function (Form $form) {
            // Ensure category_ids is properly formatted
            if ($form->category_ids) {
                $form->category_ids = array_values($form->category_ids);
            }
        });

        return $form;
    }
}
