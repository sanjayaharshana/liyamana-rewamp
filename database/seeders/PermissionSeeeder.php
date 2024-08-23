<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use OpenAdmin\Admin\Auth\Permission;

class PermissionSeeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permission = \OpenAdmin\Admin\Auth\Database\Permission::firstOrNew([
            'slug' => 'templates.categories'
        ]);
        $permission->name = 'Template Categories';
        $permission->http_method = '';
        $permission->http_path = '/template-categories*';
        $permission->save();


        $permission = \OpenAdmin\Admin\Auth\Database\Permission::firstOrNew([
            'slug' => 'templates'
        ]);
        $permission->name = 'Templates';
        $permission->http_method = '';
        $permission->http_path = '/templates*';
        $permission->save();

        $permission = \OpenAdmin\Admin\Auth\Database\Permission::firstOrNew([
            'slug' => 'inquiries'
        ]);
        $permission->name = 'Inquiries';
        $permission->http_method = '';
        $permission->http_path = '/inquiries*';
        $permission->save();




    }
}
