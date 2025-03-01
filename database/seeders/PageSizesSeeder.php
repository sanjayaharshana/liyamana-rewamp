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
                'width' => '700',
                'height' => '275',
                'unit' => 'px',
                'created_at' => now(),
            ],[
                'name' => 'Letter',
                'width' => '800',
                'height' => '600',
                'unit' => 'px',
                'created_at' => now(),
            ]
        ];

        PageSizes::insert($sizes);

    }
}
