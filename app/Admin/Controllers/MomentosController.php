<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Momentos;

class MomentosController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Momentos';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Momentos());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('short_description', __('Short description'));
        $grid->column('description', __('Description'));
        $grid->column('feature_image', __('Feature image'));
        $grid->column('article', __('Article'));
        $grid->column('taken_by', __('Taken by'));
        $grid->column('template_id', __('Template id'));
        $grid->column('user_id', __('User id'));
        $grid->column('category_ids', __('Category ids'));
        $grid->column('theme', __('Theme'));
        $grid->column('configuration', __('Configuration'));
        $grid->column('video_links', __('Video links'));
        $grid->column('seo_tags', __('Seo tags'));
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
        $show = new Show(Momentos::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('short_description', __('Short description'));
        $show->field('description', __('Description'));
        $show->field('feature_image', __('Feature image'));
        $show->field('article', __('Article'));
        $show->field('taken_by', __('Taken by'));
        $show->field('template_id', __('Template id'));
        $show->field('user_id', __('User id'));
        $show->field('category_ids', __('Category ids'));
        $show->field('theme', __('Theme'));
        $show->field('configuration', __('Configuration'));
        $show->field('video_links', __('Video links'));
        $show->field('seo_tags', __('Seo tags'));
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
        $form = new Form(new Momentos());

        $form->textarea('name', __('Name'));
        $form->textarea('short_description', __('Short description'));
        $form->textarea('description', __('Description'));
        $form->textarea('feature_image', __('Feature image'));
        $form->textarea('article', __('Article'));
        $form->textarea('taken_by', __('Taken by'));
        $form->textarea('template_id', __('Template id'));
        $form->text('user_id', __('User id'));
        $form->textarea('category_ids', __('Category ids'));
        $form->text('theme', __('Theme'));
        $form->text('configuration', __('Configuration'));
        $form->text('video_links', __('Video links'));
        $form->textarea('seo_tags', __('Seo tags'));
        $form->textarea('seo_description', __('Seo description'));
        $form->text('slug');

        return $form;
    }
}
