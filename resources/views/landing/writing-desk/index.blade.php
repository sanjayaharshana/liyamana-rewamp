@extends('landing.common.app')

@section('content')

    <div style="margin-top: 70px"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.5.0/fabric.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>




    @include('landing.single-product.navigration_tab',[
    'activeTab'=>'writing-desk'])


    <div class="container">
        <form method="post" action="{{route('landing.writing-desk.store',[
        $template->slug,$order_details->id])}}">

            {{csrf_field()}}
        <nav>

            <div class="nav nav-tabs" id="nav-tab" role="tablist">

                @foreach($template->layouts as $key => $layoutItem)
                    @if($loop->first)
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-{{$key}}" type="button" role="tab" aria-controls="nav-{{$key}}" aria-selected="true">{{$layoutItem['name']}}</button>

                    @else
                        <!-- Other items -->
                        <button class="nav-link" id="nav-{{$key}}-tab" data-bs-toggle="tab" data-bs-target="#nav-{{$key}}" type="button" role="tab" aria-controls="nav-{{$key}}" aria-selected="true">{{$layoutItem['name']}}</button>
                    @endif


                    <input type="hidden" name="{{$key}}_page" id="{{$key}}_page_data">

                @endforeach

                    <button class="btn btn-primary btn-sm" style="background: #a71d1d;color: white;border-color: white;margin: 7px;">Explorer Poems</button>
                    <button class="btn btn-primary btn-sm" style="background: #a71d1d;color: white;border-color: white;margin: 7px;">Letter Attachment</button>
                    <button id="save-and-next-button" class="btn btn-primary btn-sm float-right" style="background: #a71d1d;color: white;border-color: white;margin-bottom: 7px"> Save and Next
                        <i class="bi bi-arrow-right" style="margin-right: 10px"></i>
                    </button>

            </div>
        </nav>

        </form>

        <script>
            const saveDataButton = document.getElementById('save-and-next-button');
        </script>

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
