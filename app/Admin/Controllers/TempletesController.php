<?php

namespace App\Admin\Controllers;

use Illuminate\Support\Facades\Request;
use OpenAdmin\Admin\Admin;
use OpenAdmin\Admin\Auth\Database\Administrator;
use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Controllers\Dashboard;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Layout\Column;
use OpenAdmin\Admin\Layout\Content;
use OpenAdmin\Admin\Layout\Row;
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
        $grid->column('status', __('Status'))->display(function ($status) {
            return $status ? '<div style="background-color: #0ab56c;color: white;text-align: center;border-radius: 11px;width: fit-content;padding-left: 10px;padding-right: 10px;">Active</div>' : '<div style="background-color: #9b0606;color: white;text-align: center;border-radius: 11px;width: fit-content;padding-left: 10px;padding-right: 10px;">Inactive</div>';
        });
        $grid->column('is_featured', __('Is featured'))->display(function ($is_featured) {
            return $is_featured ? '<div style="background-color: #0ab56c;color: white;text-align: center;border-radius: 11px;width: fit-content;padding-left: 10px;padding-right: 10px;">Yes</div>' : '<div style="background-color: #9b0606;color: white;text-align: center;border-radius: 11px;width: fit-content;padding-left: 10px;padding-right: 10px;">No</div>';
        });
        $grid->column('is_top_rated', __('Is top rated'))->display(function ($is_top_rated) {
            return $is_top_rated ? '<div style="background-color: #0ab56c;color: white;text-align: center;border-radius: 11px;width: fit-content;padding-left: 10px;padding-right: 10px;">Yes</div>' : '<div style="background-color: #9b0606;color: white;text-align: center;border-radius: 11px;width: fit-content;padding-left: 10px;padding-right: 10px;">No</div>';
        });
        $grid->column('is_active', __('Is active'))->display(function ($is_active) {
            return $is_active ? '<div style="background-color: #0ab56c;color: white;text-align: center;border-radius: 11px;width: fit-content;padding-left: 10px;padding-right: 10px;">Yes</div>' : '<div style="background-color: #9b0606;color: white;text-align: center;border-radius: 11px;width: fit-content;padding-left: 10px;padding-right: 10px;">No</div>';
        });
        $grid->column('created_at', __('Created at'))->display(function ($created_at) {
            return date('d-m-Y', strtotime($created_at));
        });

        $grid->column('slug', __('Editor'))->display(function ($slug) {
            return '<a style="background:#75777c;border-style:none" class="btn btn-primary" href="' .url('admin/template/builder/'.$slug).'">Form Editor</a>';
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
        $show = new Show(Templetes::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
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
            $form->image('feature_image', __('Feature image'));
            $form->multipleImage('images', __('Images'))->removable()->sortable();
            $form->multipleSelect('category_ids', __('Category'))
                ->options(\App\Models\TempleteCategories::all()
                    ->pluck('category_name','id'));
            $getAdmins = Administrator::get()->pluck('username','id')->toArray();
            $form->select('user_id','User')->options($getAdmins)->required();;
            $form->switch('is_featured', __('Is featured'));
            $form->text('slug', __('Slug'));
            $form->switch('status', __('Status'))->default(1);
            $form->switch('is_active', __('Is active'))->default(1);



        })->tab('Selling', function ($form) {

            $form->currency('price', __('Price'))->default(0);
            $form->currency('buying_price', __('Buying price'))->default(0);
            $form->switch('is_best_selling', __('Is best selling'));

        })->tab('Options', function ($form) {

            $form->switch('is_trending', __('Is trending'));
            $form->switch('is_new', __('Is new'));
            $form->switch('is_top_rated', __('Is top rated'));

        })->tab('Search and SEO', function ($form) {

            $form->tags('tags', __('Tags'));
            $form->textarea('seo_description', __('Seo description'));

        })->tab('Layouts',function ($form) {
            $form->table('layouts', 'Layouts', function ($table) {
                $table->text('name');
                $table->text('description');
                $table->image('image');
            });

        });



        $form->saving(function (Form $form) {
            $form->category_ids = $form->input('category_ids');
            $form->slug = str_slug($form->input('name'));
        });
        return $form;
    }

    public function templateFEditor($slug,Content $content)
    {
        $templateDetails = Templetes::where('slug',$slug)->first();

        return $content
            ->css_file(Admin::asset("open-admin/css/pages/dashboard.css"))
            ->title('Dashboard')
            ->view('admin.template-builder',compact(['slug','templateDetails']));

    }

    public function storeTemplateFEditor(\Illuminate\Http\Request $request)
    {
        $templateSlug = Templetes::where('slug',$request->template_slug)->first();

        $layoutArray = $templateSlug->layouts;
        foreach ($layoutArray as $key => $layout) {

            $layoutArray[$key]['form_data'] = json_decode($request->input($key.'_form_data'),true);

            if($layout['name'] == $request->layout_name){
                $templateSlug->layouts[$key]['description'] = $request->layout_description;
                $templateSlug->layouts[$key]['image'] = $request->layout_image;
            }
        }


            Templetes::where('slug',$request->template_slug)
            ->update([
                'layouts' => $layoutArray
            ]);

            return  back();
    }
}
