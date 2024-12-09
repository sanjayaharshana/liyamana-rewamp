<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\OrderedDesign;
use App\Models\Templetes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\TempleteCategories;
use Illuminate\Support\Facades\Hash;

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

    public function writingDesk($slug, $order_id)
    {
        $templates = Templetes::where('slug',$slug)->first();
        $orderDetails = OrderedDesign::where('id',$order_id)->first();
        return view('landing.writing-desk.index',[
            'template' => $templates,
            'order_details' => $orderDetails
        ]);
    }


    public function createOrderAsGuest($slug, Request $request)
    {
        $template = Templetes::where('slug',$slug)->first();

        $orderedDesign = new OrderedDesign();
        $orderedDesign->address = [
            'from_address' => $request->from_adress,
            'to_address' => $request->to_address
        ];
        $orderedDesign->order_details = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone,
        ];
        $orderedDesign->price = number_format($template->price,2);
        $orderedDesign->status = 'pending';



        if($request->register_account == 'on')
        {
            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed|min:8',
            ]);

           $userDetails = User::create([
                'name' => $request->first_name.' '. $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

           $userDetails->user_id = $userDetails->id;
            Auth::login($userDetails);
         }




        $orderedDesign->save();

        return redirect()->route('landing.writing-desk',['slug' => $slug, 'order_id' => $orderedDesign->id]);
    }


    public function writingDeskStore($slug,Request $request, $order_id)
    {
        $pageDetails = $request->all();
        unset($pageDetails['_token']);

        $arrayOutput = [];
        foreach ($pageDetails as $key => $item)
        {
            $arrayOutput[$key] = json_decode($item);
        }

        $orderDesign =  OrderedDesign::where('id', $order_id)->first();

        $orderDesign->design = $arrayOutput;
        $orderDesign->user_id = auth()->user()->id ?? null;

        $orderDesign->save();

        return redirect()->route('landing.checkout',[
            'slug' => $slug,
            'order_id' => $order_id
        ]);
    }

    public function checkoutPage($slug,$order_id)
    {
        $orderDetails = OrderedDesign::where('id',$order_id)->first();
        $templateDetails = Templetes::where('slug', $slug)->first();

        return view('landing.checkout.index',[
            'order_details' => $orderDetails,
            'template_details' => $templateDetails
        ]);
    }

    public function previewDesign($slug, $order_id)
    {
        $orderDetails = OrderedDesign::where('id',$order_id)->first();

        $templateDetails = Templetes::where('slug', $slug)->first();

        $objectsData =  $orderDetails->design['new_4_page'];




        return view('landing.editor.preview_design',[
            'order_details' => $orderDetails,
            'template_details' => $templateDetails,
            'object_data' => $objectsData
        ]);
    }
}
