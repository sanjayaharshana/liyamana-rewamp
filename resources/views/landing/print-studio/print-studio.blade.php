@extends('landing.common.app')

@section('content')

<head>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.5.0/fabric.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <style>
        .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active{
            background-color: #777777;
            border-style: none;
            color: white;
        }
        .nav-tabs .nav-link{
            border-style: none;
            color: white;
        }
    </style>
</head>
<div style="background: #939393;">

<div class="container">








    <div class="row" style="margin-top: 59px;padding-top: 30px;padding-bottom: 30px;">


        <ul class="nav nav-tabs" id="myTab" role="tablist" style="">
            @foreach($object_data as $page_id => $object_data_value)
                <li class="nav-item  {{ $loop->first ? 'active' : '' }}" role="presentation">
                    <button style="" class="nav-link  {{ $loop->first ? 'active' : '' }}" id="{{$page_id}}-tab" data-bs-toggle="tab" data-bs-target="#{{$page_id}}" type="button" role="tab" aria-controls="{{$page_id}}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $page_id }}</button>
                </li>
            @endforeach

                <li class="nav-item" role="presentation">
                    <button style="" class="nav-link " id="envolop-tab" data-bs-toggle="tab" data-bs-target="#envolop_page" type="button" role="tab" aria-controls="envolop" aria-selected="false">Envelop Settings</button>
                </li>
        </ul>


        <form method="post" action="{{route('preview_design_store',[
    $template_details->slug, $order_details->id])}}">

            <div class="tab-content" id="myTabContent">

                @foreach($object_data as $page_id_tab_page => $object_data_value_tab_page)


                    @include('landing.print-studio.partials.page_tab_view')
                @endforeach

                @include('landing.print-studio.partials.envelop_tab_view')



            </div>

        </form>





    </div>

</div>




@endsection
