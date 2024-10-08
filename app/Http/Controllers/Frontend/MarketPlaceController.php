<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Templetes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\TempleteCategories;
class MarketPlaceController extends Controller
{
    public function index()
    {
        $templateCategories = TempleteCategories::where('status', 1)->get();
        $templates = Templetes::where('status', 1)->get();
        return view('landing.market-place',[
            'templateCategories' => $templateCategories,
            'templates' => $templates,
        ]);
    }

    public function show($slug)
    {
        $templates = Templetes::where('slug',$slug)->first();
        return view('landing.single-product',[
            'template' => $templates,
        ]);
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

    public function writingDesk($slug)
    {
        $templates = Templetes::where('slug',$slug)->first();
        return view('landing.writing-desk.index',[
            'template' => $templates,
        ]);
    }
}
