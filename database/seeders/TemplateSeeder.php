<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dumpJson = file_get_contents(public_path('dump_template.json'));
        $dumpJson = json_decode($dumpJson, true);
        foreach ($dumpJson as $keyName => $value) {

            $imageSourceFolder = database_path('seeders/images/'.$keyName);
            $imageDestinationFolder = public_path('storage');

            $imagesToCopy = [
                'feature.jpg',
                'back_page.jpg',
                'front_page.jpg',
            ];

            foreach ($imagesToCopy as $image) {
                $source = $imageSourceFolder . '/' . $image;
                $destination = $imageDestinationFolder . '/' . $keyName.'_'.$image;

                if (file_exists($source)) {
                    copy($source, $destination);
                }
            }

            // Ensure the destination folder exists
            if (!is_dir($imageDestinationFolder)) {
                mkdir($imageDestinationFolder, 0755, true);
            }




            $layouts = $value['layouts'];

            foreach ($layouts as $key => $layoutItem){
                $layouts[$key]['form_data'] = json_encode($layoutItem['form_data']);
            }

            $templates = DB::table('templetes')->insert([
                'name' => $value['name'],
                'description' => $value['description'],
                'price' => $value['price'],
                'user_id' => 1,
                'category_ids' => [1, 2, 3][rand(0, 2)],
                'slug' => $keyName,
                'is_active' => 1,
                'status' => 1,
                'is_featured' => 1,
                'is_new' => rand(0, 1),
                'is_trending' => rand(0, 1),
                'is_best_selling' => rand(0, 1),
                'is_top_rated' => rand(0, 1),
                'images' => json_encode($value['images']),
                'seo_description' => $value['description'],
                'layouts' => json_encode($layouts),
                'feature_image' => $keyName.'_feature.jpg',
                'sizes' => "2",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
