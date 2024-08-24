<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Admin;
use OpenAdmin\Admin\Auth\Database\Administrator;
use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Templetes;

class TempletesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Templetes';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Templetes());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('price', __('Price'));
        $grid->column('images', __('Images'));
        $grid->column('category_id', __('Category id'));
        $grid->column('user_id', __('User id'));
        $grid->column('slug', __('Slug'));
        $grid->column('status', __('Status'));
        $grid->column('is_featured', __('Is featured'));
        $grid->column('is_trending', __('Is trending'));
        $grid->column('is_new', __('Is new'));
        $grid->column('is_best_selling', __('Is best selling'));
        $grid->column('is_top_rated', __('Is top rated'));
        $grid->column('is_active', __('Is active'));
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
        $show = new Show(Templetes::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('description', __('Description'));
        $show->field('price', __('Price'));
        $show->field('images', __('Images'));
        $show->field('category_id', __('Category id'));
        $show->field('user_id', __('User id'));
        $show->field('slug', __('Slug'));
        $show->field('status', __('Status'));
        $show->field('is_featured', __('Is featured'));
        $show->field('is_trending', __('Is trending'));
        $show->field('is_new', __('Is new'));
        $show->field('is_best_selling', __('Is best selling'));
        $show->field('is_top_rated', __('Is top rated'));
        $show->field('is_active', __('Is active'));
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
        $form = new Form(new Templetes());

        $form->tab('Basic', function ($form) {
            $form->text('name', __('Name'))->required();;
            $form->textarea('description', __('Description'))->required();;
            $form->image('feature_image', __('Feature image'))
                ->required();;
            $form->multipleImage('images', __('Images'))->removable()->sortable();
            $form->multipleSelect('category_id', __('Category'))
                ->options(\App\Models\TempleteCategories::all()
                    ->pluck('category_name','id'))
                ->required();;
            $getAdmins = Administrator::get()->pluck('username','id')->toArray();
            $form->select('user_id','User')->options($getAdmins)->required();;
            $form->switch('is_featured', __('Is featured'));
            $form->text('slug', __('Slug'));
            $form->switch('status', __('Status'))->default(1);
            $form->switch('is_active', __('Is active'))->default(1);



        })->tab('Selling', function ($form) {
            $form->currency('price', __('Price'))->required();;
            $form->currency('buying_price', __('Buying price'))->required();;
            $form->switch('is_best_selling', __('Is best selling'));

        })->tab('Options', function ($form) {

            $form->switch('is_trending', __('Is trending'));
            $form->switch('is_new', __('Is new'));
            $form->switch('is_top_rated', __('Is top rated'));

        })->tab('Search and SEO', function ($form) {

            $form->tags('tags', __('Tags'))->required();;
            $form->textarea('seo_description', __('Seo description'))->required();
        });





        return $form;
    }
}
