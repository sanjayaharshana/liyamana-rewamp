<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TemplateImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $foldernames = [
          'harry_potter' => [
              'name' => 'Harry Potter',
              'description' => 'Harry Potter themed templates',
              'feature_image' => 'images/harry_potter_feature.jpg',
              'pages' => [
                  "new_4" => [
                      "name" => "Letter Front Side",
                      "image" => "images/115b6f0126bb5c48cad148336a1d3f0c_13.jpg",
                      "form_data" => json_encode([
                          [
                              "type" => "text",
                              "required" => false,
                              "label" => "Text Field",
                              "className" => "form-control",
                              "name" => "text-1724620622477-0",
                              "access" => false,
                              "subtype" => "text"
                          ]
                      ]),
                      "description" => "sdasd"
                  ],
                  "new_5" => [
                      "name" => "Letter Back Side",
                      "image" => "images/115b6f0126bb5c48cad148336a1d3f0c_13.jpg",
                      "form_data" => json_encode([
                          [
                              "type" => "text",
                              "required" => false,
                              "label" => "Text Field",
                              "className" => "form-control",
                              "name" => "text-1724620622477-0",
                              "access" => false,
                              "subtype" => "text"
                          ]
                      ]),
                      "description" => "sdasd"
                  ]

              ]
          ],
          ''
        ];
        $imageSourceFolder = database_path('seeders/images');
        $imageDestinationFolder = public_path('storage/images');


        // Ensure the destination folder exists
        if (!is_dir($imageDestinationFolder)) {
            mkdir($imageDestinationFolder, 0755, true);
        }

        // List of images to copy
        $imagesToCopy = [
            'Hogwarts-Letter-and-Envelope-back_1.jpg',
            '115b6f0126bb5c48cad148336a1d3f0c_12.jpg',
            'BrownEnvelope_Front_f14edde2-4c8a-4395-9227-4e5357d3176b.webp',
            '115b6f0126bb5c48cad148336a1d3f0c_16.jpg',
        ];


        // Copy files to destination folder
        foreach ($imagesToCopy as $image) {
            $source = $imageSourceFolder . '/' . $image;
            $destination = $imageDestinationFolder . '/' . $image;

            if (file_exists($source)) {
                copy($source, $destination);
            }
        }
    }
}
