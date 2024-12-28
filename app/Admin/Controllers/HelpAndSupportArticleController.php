<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\HelpAndSupportArticle;

class HelpAndSupportArticleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'HelpAndSupportArticle';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new HelpAndSupportArticle());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('article_body', __('Article body'));
        $grid->column('slug', __('Slug'));
        $grid->column('status', __('Status'));
        $grid->column('user_id', __('User id'));
        $grid->column('featured_image', __('Featured image'));
        $grid->column('meta_title', __('Meta title'));
        $grid->column('meta_keywords', __('Meta keywords'));
        $grid->column('meta_description', __('Meta description'));
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
        $show = new Show(HelpAndSupportArticle::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('article_body', __('Article body'));
        $show->field('slug', __('Slug'));
        $show->field('status', __('Status'));
        $show->field('user_id', __('User id'));
        $show->field('featured_image', __('Featured image'));
        $show->field('meta_title', __('Meta title'));
        $show->field('meta_keywords', __('Meta keywords'));
        $show->field('meta_description', __('Meta description'));
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
        $form = new Form(new HelpAndSupportArticle());

        $form->text('title', __('Title'));
        $form->textarea('article_body', __('Article body'));
        $form->text('slug', __('Slug'));
        $form->switch('status', __('Status'))->default(1);
        $form->textarea('user_id', __('User id'));
        $form->text('featured_image', __('Featured image'));
        $form->textarea('meta_title', __('Meta title'));
        $form->textarea('meta_keywords', __('Meta keywords'));
        $form->textarea('meta_description', __('Meta description'));

        return $form;
    }
}
