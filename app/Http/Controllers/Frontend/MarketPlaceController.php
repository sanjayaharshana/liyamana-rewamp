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

        // If design data exists, use field_details for text fields
        if ($orderDetails && $orderDetails->design) {
            $design = $orderDetails->design;
            $fieldDetails = $orderDetails->field_details;

            // Update design objects with field_details data
            foreach ($design as $pageKey => $pageData) {
                if (isset($pageData['objects']) && isset($fieldDetails[$pageKey])) {
                    foreach ($fieldDetails[$pageKey] as $fieldDetail) {
                        $fieldName = $fieldDetail['field_name'];
                        if (isset($pageData['objects'][$fieldName])) {
                            // Update positions
                            $pageData['objects'][$fieldName]['left'] = $fieldDetail['positions']['left'];
                            $pageData['objects'][$fieldName]['top'] = $fieldDetail['positions']['top'];
                            $pageData['objects'][$fieldName]['width'] = $fieldDetail['positions']['width'];
                            $pageData['objects'][$fieldName]['height'] = $fieldDetail['positions']['height'];
                            $pageData['objects'][$fieldName]['scaleX'] = $fieldDetail['positions']['scaleX'];
                            $pageData['objects'][$fieldName]['scaleY'] = $fieldDetail['positions']['scaleY'];
                            $pageData['objects'][$fieldName]['angle'] = $fieldDetail['positions']['angle'];

                            // Update configuration
                            $pageData['objects'][$fieldName]['fontSize'] = $fieldDetail['configuration']['fontSize'];
                            $pageData['objects'][$fieldName]['fontFamily'] = $fieldDetail['configuration']['fontFamily'];
                            $pageData['objects'][$fieldName]['fill'] = $fieldDetail['configuration']['fill'];
                            $pageData['objects'][$fieldName]['textAlign'] = $fieldDetail['configuration']['textAlign'];
                            $pageData['objects'][$fieldName]['fontWeight'] = $fieldDetail['configuration']['fontWeight'];
                            $pageData['objects'][$fieldName]['fontStyle'] = $fieldDetail['configuration']['fontStyle'];
                            $pageData['objects'][$fieldName]['underline'] = $fieldDetail['configuration']['underline'];
                            $pageData['objects'][$fieldName]['linethrough'] = $fieldDetail['configuration']['linethrough'];
                            $pageData['objects'][$fieldName]['textBackgroundColor'] = $fieldDetail['configuration']['textBackgroundColor'];
                        }
                    }
                    $design[$pageKey] = $pageData;
                }
            }
        }

        return view('landing.writing-desk.index',[
            'template' => $templates,
            'previousOrder' => $previousOrder ?? null,
            'order_details' => $orderDetails,
            'design' => $design ?? null
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
        $fieldDetails = [];

        // Get template layouts
        $template = Templetes::where('slug', $slug)->first();
        $layouts = $template->layouts;

        foreach ($pageDetails as $key => $item) {
            $decodedItem = json_decode($item, true);
            $arrayOutput[$key] = $decodedItem;

            // Extract field details from the decoded item
            if (isset($decodedItem['objects'])) {
                $formFields = [];
                foreach ($decodedItem['objects'] as $fieldKey => $fieldData) {
                    $formFields[] = [
                        'type' => $fieldData['type'] ?? 'text',
                        'required' => false,
                        'label' => $fieldData['label'] ?? 'Text Field',
                        'className' => 'form-control',
                        'name' => $fieldKey,
                        'access' => false,
                        'subtype' => 'text'
                    ];
                }

                // Get layout data for this page
                $layoutData = collect($layouts)->firstWhere('key', $key);
                
                dd($layouts);

                // Remove _page suffix from key
                $cleanKey = str_replace('_page', '', $key);

                $fieldDetails[$cleanKey] = [
                    'name' => $layoutData['name'] ?? 'Page ' . $cleanKey,
                    'image' => $layoutData['image'] ?? '',
                    'form_data' => json_encode($formFields),
                    'description' => $layoutData['description'] ?? ''
                ];
            }
        }

        $orderDesign = OrderedDesign::where('id', $order_id)->first();

        $orderDesign->design = $arrayOutput;
        $orderDesign->field_details = $fieldDetails;
        $orderDesign->user_id = auth()->user()->id ?? null;

        dd($fieldDetails);
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
