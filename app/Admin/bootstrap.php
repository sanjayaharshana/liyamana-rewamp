<?php

/**
 * Open-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 * OpenAdmin\Admin\Form::forget(['map', 'editor']);
 *
 * Or extend custom form field:
 * OpenAdmin\Admin\Form::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */
Use OpenAdmin\Admin\Admin;


OpenAdmin\Admin\Form::forget(['editor']);

Admin::js('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js');
Admin::js('https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js');
Admin::js('https://formbuilder.online/assets/js/form-builder.min.js');
Admin::js('https://formbuilder.online/assets/js/form-render.min.js');
