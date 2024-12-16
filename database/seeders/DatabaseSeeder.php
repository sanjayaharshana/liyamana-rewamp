<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Templetes;
use Illuminate\Database\Seeder;
use OpenAdmin\Admin\Auth\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $permission = new \OpenAdmin\Admin\Auth\Database\Permission();

        $this->call([
           PermissionSeeeder::class,
           MenuSeeder::class,
           SettingsSeeder::class,
           TemplateCategorySeeder::class,
           TemplateSeeder::class,
        ]);

    }
}
