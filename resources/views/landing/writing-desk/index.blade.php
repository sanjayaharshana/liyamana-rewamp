@extends('landing.common.app')

@section('content')

    <div style="margin-top: 70px"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.5.0/fabric.min.js"></script>



    @include('landing.single-product.navigration_tab',[
    'activeTab'=>'writing-desk'])


    <div class="container">
        <nav>

            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                @foreach($template->layouts as $key => $layoutItem)
                    @if($loop->first)
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-{{$key}}" type="button" role="tab" aria-controls="nav-{{$key}}" aria-selected="true">{{$layoutItem['name']}}</button>

                    @else
                        <!-- Other items -->
                        <button class="nav-link" id="nav-{{$key}}-tab" data-bs-toggle="tab" data-bs-target="#nav-{{$key}}" type="button" role="tab" aria-controls="nav-{{$key}}" aria-selected="true">{{$layoutItem['name']}}</button>
                    @endif

                @endforeach
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            @foreach($template->layouts as $key => $layoutItem)
                @if($loop->first)
                    <div class="tab-pane fade show active" id="nav-{{$key}}" role="tabpanel" aria-labelledby="nav-{{$key}}-tab" tabindex="0">
                       @include('landing.writing-desk.desk-editor')
                    </div>
                @else
                    <div class="tab-pane fade" id="nav-{{$key}}" role="tabpanel" aria-labelledby="nav-{{$key}}-tab" tabindex="0">
                        @include('landing.writing-desk.desk-editor')

                    </div>
                @endif
            @endforeach
        </div>
    </div>










@endsection
