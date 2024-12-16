<?php

namespace App\Admin\Controllers;

use App\Models\Settings;
use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Layout\Content;
use OpenAdmin\Admin\Show;

class SettingsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Settings';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Settings());

        $grid->column('id', __('Id'));
        $grid->column('key', __('Key'));
        $grid->column('value', __('Value'));
        $grid->column('type', __('Type'));
        $grid->column('description', __('Description'));
        $grid->column('group', __('Group'));
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
        $show = new Show(Settings::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('key', __('Key'));
        $show->field('value', __('Value'));
        $show->field('type', __('Type'));
        $show->field('description', __('Description'));
        $show->field('group', __('Group'));
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
        $form = new Form(new Settings());
        $getAllSettings = Settings::all()->groupBy('group');

        foreach ($getAllSettings as $key => $settingItems) {
            $form->tab($key, function ($form) use ($settingItems) {
                foreach ($settingItems as $settingItem) {
                    $this->createFormField($form, $settingItem);
                }
            });
        }
        $form->saving(function (Form $form) use ($getAllSettings) {
            foreach ($getAllSettings as $key => $settingItems) {
                foreach ($settingItems as $settingItem) {
                    dd($settingItem->key);
                    $form->model()->where('key', $settingItem->key)->update(['value' => $form->input($settingItem->key)]);
                }
            }
        });

        return $form;
    }

    protected function createFormField(Form $form, $settingItem)
    {
        $formFieldMap = [
            'text' => 'text',
            'select' => 'select',
            'textarea' => 'textarea',
            'switch' => 'switch',
            'email' => 'email',
            'image' => 'image',
            'password' => 'password',
            'url' => 'url',
            'number' => 'number',
            'date' => 'date',
            'time' => 'time',
            // Add other types here as needed
        ];

        $method = $formFieldMap[$settingItem->type] ?? null;

        if ($method) {
            $formSettingsItem = $form->$method($settingItem->key, $settingItem->label);

            if ($settingItem->description) {
                $formSettingsItem->help($settingItem->description);
            }

            if ($settingItem->rules) {
                $formSettingsItem->rules($settingItem->rules);
            }

            if (in_array($settingItem->type, ['text', 'textarea']) && $settingItem->placeholder) {
                $formSettingsItem->placeholder($settingItem->placeholder);
            }

            if ($settingItem->type === 'select' && $settingItem->options) {
                $formSettingsItem->options(json_decode($settingItem->options, true));

                if ($settingItem->default) {
                    $formSettingsItem->default($settingItem->default);
                }
            }

            $formSettingsItem->value($settingItem->value);
        }


    }
}






