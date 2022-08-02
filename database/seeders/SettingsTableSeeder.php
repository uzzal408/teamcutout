<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    protected $settings = [
        [
            'key'                       =>  'site_name',
            'value'                     =>  'Team Cut Out Int.',
        ],
        [
            'key'                       =>  'site_title',
            'value'                     =>  'Team Cut Out Int.',
        ],
        [
            'key'                       =>  'default_email_address',
            'value'                     =>  'info@teamcutout.com',
        ],
        [
            'key'                       =>  'site_logo',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'site_favicon',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'footer_copyright_text',
            'value'                     =>  "Copyright © 2022 Team Cut Out Int., All Rights Reserved"
        ],
        [
            'key'                       =>  'seo_meta_title',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'seo_meta_description',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'social_facebook',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'social_youtube',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'social_dropbox',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'social_linkedin',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'google_analytics',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'google_tag_manager',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'facebook_pixels',
            'value'                     =>  '',
        ],

        [
            'key'                       =>  'mobile',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'phone',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'address_1',
            'value'                     =>  'Dhaka,',
        ],
        [
            'key'                       =>  'address_2',
            'value'                     =>  'Dhaka 1204, Bangladesh.',
        ],
        [
            'key'                       =>  'footer_logo',
            'value'                     =>  '',
        ],
    ];

    /**
     * Run the database seeders.
     *
     * @return void
     */


    public function run()
    {
        foreach ($this->settings as $index=>$setting){
            $result = Settings::create($setting);
        }

    }
}
