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
    public function index(Request $request)
    {
        $requestAllData = $request->all();
        unset($requestAllData['_token']);
        $templateCategories = TempleteCategories::where('status', 1)->get();
        $templates = Templetes::where('status', 1);


        if(key_exists('category',$requestAllData))
        {
            if($requestAllData['category'])
            {
                $templateCategoriesFromId = TempleteCategories::where('slug', $requestAllData['category'])
                    ->first();
                $stringId = (string)$templateCategoriesFromId->id;
                $templates->whereJsonContains('category_ids', $stringId);
            }
        }

        if(key_exists('search_keyword',$requestAllData))
        {
            if($requestAllData['search_keyword'])
            {
                $templates->where('name', 'like', '%'.$requestAllData['search_keyword'].'%');
            }
        }

        if(key_exists('sort_by',$requestAllData))
        {
            if($requestAllData['sort_by'])
            {
                if($requestAllData['sort_by'] == 'price_high_to_low'){
                    $templates->orderBy('price', 'desc');
                }else if($requestAllData['sort_by'] == 'price_low_to_high'){
                    $templates->orderBy('price', 'asc');
                }else if($requestAllData['sort_by'] == 'newest'){
                    $templates->orderBy('created_at', 'desc');
                }else if($requestAllData['sort_by'] == 'oldest'){
                    $templates->orderBy('created_at', 'asc');
                }
            }
        }

        return view('landing.market-place',[
            'templateCategories' => $templateCategories,
            'templates' => $templates->get(),
            'query' => $requestAllData
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
        $templates = Templetes::where('slug',$slug)
            ->with('sizes')
            ->first();

        $orderDetails = OrderedDesign::where('id',$order_id)
            ->first();

        if(auth()->user()){
            $previousOrder = OrderedDesign::where('user_id',auth()->user()->id)
                ->where('template_id',$templates->id)
                ->get();
        }
        return view('landing.writing-desk.index',[
            'template' => $templates,
            'previousOrder' => $previousOrder ?? null,
            'order_details' => $orderDetails,
            'design' => $orderDetails->design ?? null
        ]);
    }


    public function createOrderAsGuest($slug, Request $request)
    {
        $template = Templetes::where('slug',$slug)->first();

        $orderedDesign = new OrderedDesign();
        $orderedDesign->address = [
            'from_address' => $request->from_adress,
            'to_address' => $request->to_adress
        ];
        $orderedDesign->order_details = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone,
        ];
        $orderedDesign->price = number_format($template->price,2);
        $orderedDesign->status = 'pending';
        $orderedDesign->template_id = $template->id;

        if(auth()->user())
        {
            $orderedDesign->user_id = auth()->user()->id;
        }
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
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            Auth::login($userDetails);
         }

        $orderedDesign->template_id = $template->id;
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
        $objectsData =  $orderDetails->design;


        return view('landing.print-studio.print-studio',[
            'order_details' => $orderDetails,
            'template_details' => $templateDetails,
            'object_data' => $objectsData
        ]);
    }

    public function selectOrder($slug,Request $request)
    {
        $orderDetails = OrderedDesign::where('id',$request->navigate_order_id)->first();
        $template  = Templetes::where('id', $orderDetails->template_id)->first();

        return redirect()->route('landing.writing-desk',[
            'slug' => $template->slug,
            'order_id' => $request->navigate_order_id
        ]);

    }

    public function previewDesignStore(Request $request)
    {
        dd($request);

    }
}
