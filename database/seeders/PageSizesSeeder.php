<?php

namespace Database\Seeders;

use App\Models\PageSizes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSizesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sizes = [
            [
                'name' => 'Post Card',
                'width' => '600',
                'height' => '300',
                'unit' => 'px',
                'created_at' => now(),
            ],[
                'name' => 'Letter',
                'width' => '600',
                'height' => '800',
                'unit' => 'px',
                'created_at' => now(),
            ]
        ];

        PageSizes::insert($sizes);

    }
}
