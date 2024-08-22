<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'key' => 'site_name',
                'value' => 'OpenAdmin',
                'type' => 'text',
                'description' => 'Site name',
                'group' => 'General',
                'label' => 'Site Name',
                'placeholder' => 'Site Name',
                'rules' => 'required',
                'options' => null,
                'default' => 'OpenAdmin'
            ],

            [
                'key' => 'site_logo',
                'value' => 'liyamana.png',
                'type' => 'image',
                'description' => 'Site Logo',
                'group' => 'General',
                'label' => 'Site Logo',
                'placeholder' => 'Site Logo',
                'rules' => 'required',
                'options' => null,
                'default' => null
            ],
            [
                'key' => 'site_favicon',
                'value' => 'liyamana.png',
                'type' => 'image',
                'description' => 'Site Favicon',
                'group' => 'General',
                'label' => 'Site Favicon',
                'placeholder' => 'Site Favicon',
                'rules' => 'required',
                'options' => null,
                'default' => null
            ],
            [
                'key' => 'language',
                'value' => 'en',
                'type' => 'select',
                'description' => 'Website Language',
                'group' => 'General',
                'label' => 'Language',
                'placeholder' => 'Select Language',
                'rules' => 'required',
                'options' => json_encode([
                    'en' => 'English',
                    'si' => 'Sinhala',
                ]),
                'default' => 'en'
            ],
            [
                'key' => 'currency',
                'value' => 'LKR',
                'type' => 'select',
                'description' => 'Shop Currency',
                'group' => 'General',
                'label' => 'Currency',
                'placeholder' => 'Select Currency',
                'rules' => 'required',
                'options' => json_encode([
                    'USD' => 'US Dollar',
                    'LKR' => 'Sri Lanka Rupee',
                ]),
                'default' => 'LKR'
            ],
            [
                'key' => 'is_template_editor_enabled',
                'value' => true,
                'type' => 'switch',
                'description' => null,
                'group' => 'General',
                'label' => 'Template Editor',
                'placeholder' => null,
                'rules' => null,
                'options' => null,
                'default' => null
            ],
            [
                'key' => 'address',
                'value' => 'No.128, Wellawaya Street, Buttala',
                'type' => 'textarea',
                'description' => null,
                'group' => 'Contact Information',
                'label' => 'Address',
                'placeholder' => 'No.128, Wellawaya Street, Buttala',
                'rules' => 'required',
                'options' => null,
                'default' => null
            ],
            [
                'key' => 'phone',
                'value' => '0712345678',
                'type' => 'text',
                'description' => null,
                'group' => 'Contact Information',
                'label' => 'Phone',
                'placeholder' => '0712345678',
                'rules' => 'required',
                'options' => null,
                'default' => null
            ],
            [
                'key' => 'email',
                'value' => 'info@liyamana.com',
                'type' => 'email',
                'description' => null,
                'group' => 'Contact Information',
                'label' => 'Email',
                'placeholder' => 'Enter your email here',
                'rules' => 'required',
                'options' => null,
                'default' => null
            ]
        ];

        DB::table('settings')->insert($settings);
    }
}
