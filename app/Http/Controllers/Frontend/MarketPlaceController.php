<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Templetes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MarketPlaceController extends Controller
{
    public function index()
    {
        $templates = Templetes::where('status', 1)->get();
        return view('landing.market-place',[
            'templates' => $templates,
        ]);
    }

    public function show($slug)
    {
        $templates = Templetes::where('slug',$slug)->first();
        dd($templates);
        return view('landing.single-product');
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
