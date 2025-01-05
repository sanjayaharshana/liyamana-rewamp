<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use OpenAdmin\Admin\Auth\Database\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin_menu')->insert([
            [
                'parent_id' => 10,
                'order' => 3,
                'title' => 'Templates',
                'icon' => 'icon-address-card',
                'uri' => 'templates',
                'permission' => 'templates',
                'created_at' => Carbon::now()->subMinutes(2),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 10,
                'order' => 4,
                'title' => 'Template Categories',
                'icon' => 'icon-align-justify',
                'uri' => 'template-categories',
                'permission' => 'templates.categories',
                'created_at' => Carbon::now()->subMinutes(1),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 0,
                'order' => 2,
                'title' => 'Template Management',
                'icon' => 'icon-address-card',
                'uri' => null,
                'permission' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'parent_id' => 0,
                'order' => 4,
                'title' => 'Inquiries',
                'icon' => 'icon-align-justify',
                'uri' => 'inquiries',
                'permission' => 'inquiries',
                'created_at' => Carbon::now()->subMinutes(1),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 0,
                'order' => 5,
                'title' => 'Settings',
                'icon' => 'icon-cogs',
                'uri' => 'settings/create',
                'permission' => 'inquiries',
                'created_at' => Carbon::now()->subMinutes(1),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 0,
                'order' => 6,
                'title' => 'Blog Posts',
                'icon' => 'icon-newspaper',
                'uri' => 'blog-posts',
                'permission' => 'blog-posts',
                'created_at' => Carbon::now()->subMinutes(1),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 10,
                'order' => 7,
                'title' => 'Page Sizes',
                'icon' => 'icon-ruler',
                'uri' => 'page-sizes',
                'permission' => 'page-sizes',
                'created_at' => Carbon::now()->subMinutes(1),
                'updated_at' => Carbon::now(),
            ],
        ]);

    }
}
