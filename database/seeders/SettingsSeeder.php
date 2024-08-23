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
            // General Settings
            [
                'key' => 'site_name',
                'value' => 'Liyamana',
                'type' => 'text',
                'description' => 'Site name',
                'group' => 'General',
                'label' => 'Site Name',
                'placeholder' => 'Site Name',
                'rules' => 'required',
                'options' => null,
                'default' => 'Liyamana'
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
                'value' => 'favicon.png',
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
                'key' => 'tagline',
                'value' => 'Your Postal Mail, Modernized.',
                'type' => 'text',
                'description' => 'Site Tagline',
                'group' => 'General',
                'label' => 'Tagline',
                'placeholder' => 'Enter Site Tagline',
                'rules' => 'required',
                'options' => null,
                'default' => 'Your Postal Mail, Modernized.'
            ],

            // Appearance Settings
            [
                'key' => 'theme_primary_color',
                'value' => '#007bff',
                'type' => 'color',
                'description' => 'Primary Color for Theme',
                'group' => 'Appearance',
                'label' => 'Primary Color',
                'placeholder' => 'Enter Primary Color',
                'rules' => 'required',
                'options' => null,
                'default' => '#007bff'
            ],
            [
                'key' => 'theme_secondary_color',
                'value' => '#6c757d',
                'type' => 'color',
                'description' => 'Secondary Color for Theme',
                'group' => 'Appearance',
                'label' => 'Secondary Color',
                'placeholder' => 'Enter Secondary Color',
                'rules' => 'required',
                'options' => null,
                'default' => '#6c757d'
            ],
            [
                'key' => 'font_style',
                'value' => 'Arial',
                'type' => 'select',
                'description' => 'Default Font Style',
                'group' => 'Appearance',
                'label' => 'Font Style',
                'placeholder' => 'Select Font Style',
                'rules' => 'required',
                'options' => json_encode([
                    'Arial' => 'Arial',
                    'Times New Roman' => 'Times New Roman',
                    'Courier New' => 'Courier New',
                ]),
                'default' => 'Arial'
            ],
            [
                'key' => 'background_image',
                'value' => 'background.jpg',
                'type' => 'image',
                'description' => 'Background Image for Site',
                'group' => 'Appearance',
                'label' => 'Background Image',
                'placeholder' => 'Upload Background Image',
                'rules' => null,
                'options' => null,
                'default' => null
            ],

            // SEO Settings
            [
                'key' => 'meta_title',
                'value' => 'Welcome to Liyamana',
                'type' => 'text',
                'description' => 'Meta Title for SEO',
                'group' => 'SEO',
                'label' => 'Meta Title',
                'placeholder' => 'Enter Meta Title',
                'rules' => 'required',
                'options' => null,
                'default' => 'Welcome to Liyamana'
            ],
            [
                'key' => 'meta_description',
                'value' => 'Liyamana is a modern platform for sending personalized letters and templates.',
                'type' => 'textarea',
                'description' => 'Meta Description for SEO',
                'group' => 'SEO',
                'label' => 'Meta Description',
                'placeholder' => 'Enter Meta Description',
                'rules' => 'required',
                'options' => null,
                'default' => 'Liyamana is a modern platform for sending personalized letters and templates.'
            ],
            [
                'key' => 'meta_keywords',
                'value' => 'letters, templates, personalized, mail, billing, invitations',
                'type' => 'text',
                'description' => 'Meta Keywords for SEO',
                'group' => 'SEO',
                'label' => 'Meta Keywords',
                'placeholder' => 'Enter Meta Keywords',
                'rules' => 'required',
                'options' => null,
                'default' => 'letters, templates, personalized, mail, billing, invitations'
            ],

            // Contact Information
            [
                'key' => 'address',
                'value' => 'No.128, Wellawaya Street, Buttala',
                'type' => 'textarea',
                'description' => 'Physical Address',
                'group' => 'Contact Information',
                'label' => 'Address',
                'placeholder' => 'Enter Address',
                'rules' => 'required',
                'options' => null,
                'default' => null
            ],
            [
                'key' => 'phone',
                'value' => '0712345678',
                'type' => 'text',
                'description' => 'Contact Phone Number',
                'group' => 'Contact Information',
                'label' => 'Phone',
                'placeholder' => 'Enter Phone Number',
                'rules' => 'required',
                'options' => null,
                'default' => null
            ],
            [
                'key' => 'email',
                'value' => 'info@liyamana.com',
                'type' => 'email',
                'description' => 'Primary Contact Email',
                'group' => 'Contact Information',
                'label' => 'Email',
                'placeholder' => 'Enter your email here',
                'rules' => 'required',
                'options' => null,
                'default' => 'info@liyamana.com'
            ],
            [
                'key' => 'contact_form_recipient_email',
                'value' => 'support@liyamana.com',
                'type' => 'email',
                'description' => 'Recipient Email for Contact Form',
                'group' => 'Contact Information',
                'label' => 'Contact Form Recipient Email',
                'placeholder' => 'Enter Contact Form Recipient Email',
                'rules' => 'required',
                'options' => null,
                'default' => 'support@liyamana.com'
            ],

            // Email Settings
            [
                'key' => 'mail_driver',
                'value' => 'smtp',
                'type' => 'select',
                'description' => 'Mail Driver',
                'group' => 'Email',
                'label' => 'Mail Driver',
                'placeholder' => 'Select Mail Driver',
                'rules' => 'required',
                'options' => json_encode([
                    'smtp' => 'SMTP',
                    'sendmail' => 'Sendmail',
                    'mailgun' => 'Mailgun',
                ]),
                'default' => 'smtp'
            ],
            [
                'key' => 'mail_host',
                'value' => 'smtp.mailtrap.io',
                'type' => 'text',
                'description' => 'Mail Host',
                'group' => 'Email',
                'label' => 'Mail Host',
                'placeholder' => 'Enter Mail Host',
                'rules' => 'required',
                'options' => null,
                'default' => 'smtp.mailtrap.io'
            ],
            [
                'key' => 'mail_port',
                'value' => '2525',
                'type' => 'text',
                'description' => 'Mail Port',
                'group' => 'Email',
                'label' => 'Mail Port',
                'placeholder' => 'Enter Mail Port',
                'rules' => 'required',
                'options' => null,
                'default' => '2525'
            ],
            [
                'key' => 'mail_username',
                'value' => 'your_username',
                'type' => 'text',
                'description' => 'Mail Username',
                'group' => 'Email',
                'label' => 'Mail Username',
                'placeholder' => 'Enter Mail Username',
                'rules' => 'required',
                'options' => null,
                'default' => 'your_username'
            ],
            [
                'key' => 'mail_password',
                'value' => 'your_password',
                'type' => 'password',
                'description' => 'Mail Password',
                'group' => 'Email',
                'label' => 'Mail Password',
                'placeholder' => 'Enter Mail Password',
                'rules' => 'required',
                'options' => null,
                'default' => null
            ],
            [
                'key' => 'mail_encryption',
                'value' => 'tls',
                'type' => 'select',
                'description' => 'Mail Encryption',
                'group' => 'Email',
                'label' => 'Mail Encryption',
                'placeholder' => 'Select Mail Encryption',
                'rules' => 'required',
                'options' => json_encode([
                    'tls' => 'TLS',
                    'ssl' => 'SSL',
                ]),
                'default' => 'tls'
            ],
            [
                'key' => 'mail_from_address',
                'value' => 'no-reply@liyamana.com',
                'type' => 'email',
                'description' => 'Mail From Address',
                'group' => 'Email',
                'label' => 'Mail From Address',
                'placeholder' => 'Enter Mail From Address',
                'rules' => 'required',
                'options' => null,
                'default' => 'no-reply@liyamana.com'
            ],
            [
                'key' => 'mail_from_name',
                'value' => 'Liyamana',
                'type' => 'text',
                'description' => 'Mail From Name',
                'group' => 'Email',
                'label' => 'Mail From Name',
                'placeholder' => 'Enter Mail From Name',
                'rules' => 'required',
                'options' => null,
                'default' => 'Liyamana'
            ],

            // Social Media Settings
            [
                'key' => 'facebook_url',
                'value' => 'https://facebook.com/liyamanaplatform',
                'type' => 'url',
                'description' => 'Facebook Page URL',
                'group' => 'Social Media',
                'label' => 'Facebook URL',
                'placeholder' => 'Enter Facebook Page URL',
                'rules' => 'required',
                'options' => null,
                'default' => 'https://facebook.com/liyamanaplatform'
            ],
            [
                'key' => 'twitter_url',
                'value' => 'https://twitter.com/liyamanaplatform',
                'type' => 'url',
                'description' => 'Twitter Profile URL',
                'group' => 'Social Media',
                'label' => 'Twitter URL',
                'placeholder' => 'Enter Twitter Profile URL',
                'rules' => 'required',
                'options' => null,
                'default' => 'https://twitter.com/liyamanaplatform'
            ],
            [
                'key' => 'instagram_url',
                'value' => 'https://instagram.com/liyamanaplatform',
                'type' => 'url',
                'description' => 'Instagram Profile URL',
                'group' => 'Social Media',
                'label' => 'Instagram URL',
                'placeholder' => 'Enter Instagram Profile URL',
                'rules' => 'required',
                'options' => null,
                'default' => 'https://instagram.com/liyamanaplatform'
            ],
            [
                'key' => 'linkedin_url',
                'value' => 'https://linkedin.com/company/liyamanaplatform',
                'type' => 'url',
                'description' => 'LinkedIn Profile URL',
                'group' => 'Social Media',
                'label' => 'LinkedIn URL',
                'placeholder' => 'Enter LinkedIn Profile URL',
                'rules' => 'required',
                'options' => null,
                'default' => 'https://linkedin.com/company/liyamanaplatform'
            ],

            // Notification Settings
            [
                'key' => 'notification_email',
                'value' => 'notifications@liyamana.com',
                'type' => 'email',
                'description' => 'Notification Email',
                'group' => 'Notifications',
                'label' => 'Notification Email',
                'placeholder' => 'Enter Notification Email',
                'rules' => 'required',
                'options' => null,
                'default' => 'notifications@liyamana.com'
            ],
            [
                'key' => 'enable_sms_notifications',
                'value' => 'true',
                'type' => 'select',
                'description' => 'Enable SMS Notifications',
                'group' => 'Notifications',
                'label' => 'Enable SMS Notifications',
                'placeholder' => 'Enable SMS Notifications',
                'rules' => 'required',
                'options' => json_encode([
                    'true' => 'Yes',
                    'false' => 'No',
                ]),
                'default' => 'true'
            ],
            [
                'key' => 'sms_notification_number',
                'value' => '+94771234567',
                'type' => 'text',
                'description' => 'Phone Number for SMS Notifications',
                'group' => 'Notifications',
                'label' => 'SMS Notification Number',
                'placeholder' => 'Enter Phone Number',
                'rules' => 'required',
                'options' => null,
                'default' => '+94771234567'
            ],

        ];

        DB::table('settings')->insert($settings);
    }
}
