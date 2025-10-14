<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Page;
use App\Models\User;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['site_main_logo', Null],
            ['site_footer_logo', Null],
            ['site_fav_icon', Null],
            ['site_icon_image', Null],
            ['site_information', 'Kathmandu Holiday'],
            ['site_phone', '9858390993'],
            ['site_email', 'info@kathmanduholiday.com'],
            ['site_phone_two', '9858390993'],
            ['site_email_two', 'info@kathmanduholiday.com'],
            ['site_location', 'Shukra Bhawan, Thamel Marg, Kathmandu'],
            ['site_location_url', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d113024.3948482901!2d85.15919149726561!3d27.7169053!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19d25661482b%3A0x2f1639d4d0ba9959!2sAdventure%20Planner%20Pvt.%20Ltd.!5e0!3m2!1sen!2snp!4v1683524016919!5m2!1sen!2snp'],
            ['site_facebook', 'https://paradiseinfo.tech/'],
            ['site_youtube', 'https://paradiseinfo.tech/'],
            ['site_instagram', 'https://paradiseinfo.tech/'],
            ['site_linkedin', 'https://paradiseinfo.tech/'],
            ['site_experiance', 'Kathmandu Holiday'],
            ['site_copyright', 'Kathmandu Holiday'],

            ['homepage_title', 'Kathmandu Holiday'],
            ['homepage_image', Null],
            ['homepage_image_two', Null],
            ['homepage_image_three', Null],
            ['homepage_description', 'Kathmandu Holiday'],
            ['homepage_seo_title', 'Kathmandu Holiday'],
            ['homepage_seo_description', 'Kathmandu Holiday'],
            ['homepage_seo_keywords', 'Kathmandu Holiday'],
            ['homepage_seo_schema', Null],

            ['videotitle', 'Adventure'],
            ['videourl', Null],
            ['videoimage', Null],

            ['destinationtitle', 'Best Featured Destination'],
            ['destinationinfo', Null],
            ['destinations', Null],

            ['activitytitle', 'Best Featured Activities'],
            ['activityinfo', Null],
            ['activitys', Null],

            ['popularpackagetitle', 'POPULAR PACKAGES'],
            ['popularpackageinfo', Null],
            ['popularpackage', Null],

            ['toppackagetitle', 'TOP PACKAGES'],
            ['toppackageinfo', Null],
            ['toppackage', Null],

            ['topdealtitle', 'DEALS & OFFERS'],
            ['topdealinfo', 'Last Minute Amazing Deals'],
            ['topdeals', Null],

            ['whyustitle', 'Our Services'],
            ['whyusinfo', Null],
            ['whyus', Null],

            ['reviewtitle', 'REVIEW & TESTIMONIALS'],
            ['reviewinfo', Null],
            ['reviews', Null],

            ['faqtitle', 'FAQs'],
            ['faqinfo', Null],
            ['faqs', Null],

            ['team_title', 'Kathmandu Holiday'],
            ['team_description', 'Kathmandu Holiday'],

            ['blog_title', 'Our Blogs'],
            ['blog_description', 'Kathmandu Holiday'],
        ];

        if (count($items)) {
            foreach ($items as $item) {
                Setting::create([
                    'key' => $item[0],
                    'value' => $item[1],
                ]);
            }
        }

        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@kathmanduholiday.com',
            'password' => Hash::make('Nepal@123'),
        ]);

        $pages = [
            ['name' => 'Contact Us', 'slug' => 'contact-us', 'description' => null,   'template' => 9, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'About Us', 'slug' => 'about-us', 'description' => null,   'template' => 2, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Packages', 'slug' => 'packages', 'description' => null,   'template' => 14, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Activities', 'slug' => 'activities', 'description' => null,   'template' => 15, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Our Teams', 'slug' => 'our-teams', 'description' => null,   'template' => 3, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Testimonials', 'slug' => 'testimonials', 'description' => null,   'template' => 4, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Faqs', 'slug' => 'faqs', 'description' => null,   'template' => 5, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Partners', 'slug' => 'partners', 'description' => null,   'template' => 6, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Blogs', 'slug' => 'blogs', 'description' => null,   'template' => 10, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Services', 'slug' => 'services', 'description' => null,   'template' => 11, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Gallery', 'slug' => 'gallery', 'description' => null,   'template' => 13, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Destinations', 'slug' => 'destinations', 'description' => null,   'template' => 17, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Category', 'slug' => 'category', 'description' => null,   'template' => 19, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sitemap', 'slug' => 'sitemap', 'description' => null,   'template' => 16, 'status' => 1, 'created_at' => now(), 'updated_at' => now()]
        ];

        Page::insert($pages);
    }
}
