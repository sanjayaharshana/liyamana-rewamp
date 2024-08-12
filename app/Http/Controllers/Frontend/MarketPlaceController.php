<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MarketPlaceController extends Controller
{
    public function index()
    {
        return view('landing.market-place');
    }

    public function show($slug)
    {
        return view('landing.market-place-single');
    }

    public function jsonSetting()
    {
        $path = public_path('editor_json.json'); // Adjust the path as needed
        $json = File::get($path);
        $data = json_decode($json, true);

        return response()->json($data);
    }

    public function jsonProducts()
    {
        $outArray = [
          'status' => true,
          'products' => [
              [
                  'id' => 1,
                  'name' => 'Sport Tees',
                  'price' => 310,
                  'category' => 'clothes',
                  'currency' => 'USD',
                  'image' => url('landing_pages/head.jpg'),
                  'sub_images' => [
                      url('landing_pages/head.jpg'),
                      url('landing_pages/head1.jpg'),
                  ]
              ]
          ],
          'message' => 'Products loaded successfully.'
        ];
        return response()->json($outArray);
    }
}
