@extends('landing.common.app')

@section('content')

    <div style="margin-top: 70px"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.5.0/fabric.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

    <script src="https://unpkg.com/intro.js/intro.js"></script>
    <link href="https://unpkg.com/intro.js/introjs.css" rel="stylesheet">


    @include('landing.single-product.navigration_tab',[
    'activeTab'=>'writing-desk'])

    @include('landing.writing-desk.modals.letter-attachment')

    <div class="container">
        <form id="mainform" method="post" action="{{route('landing.writing-desk.store',[
        $template->slug,$order_details->id])}}">
            {{csrf_field()}}
            @include('landing.writing-desk.modals.summery-modal')
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
                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" id="expolore_poem_button" class="btn btn-primary btn-sm" style="background: #a71d1d;color: white;border-color: white;margin: 7px;">Explorer Poems</a>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" id="letter_attachment_button" class="btn btn-primary btn-sm" style="background: #a71d1d;color: white;border-color: white;margin: 7px;">Letter Attachment</a>
                    <a href="#"  data-bs-toggle="modal" data-bs-target="#finalizemodal" id="save-and-next-button" class="btn btn-primary float-right" style="background: #a71d1d;color: white;border-color: white;margin-bottom: 7px;display: block;margin-left: auto;margin-right: 0;"> Save and Next
                        <i class="bi bi-arrow-right" style="margin-right: 10px"></i>
                    </a>
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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            if (!localStorage.getItem('introShown')) {
                introJs().setOptions({
                    steps: [
                        {
                            element: document.querySelector('#expolore_poem_button'),
                            intro: "The Poem Explorer allows you to easily browse, discover, and add beautiful poems to your letters."
                        },
                        {
                            element: document.querySelector('#letter_attachment_button'),
                            intro: "Add a personal touch to your letter by attaching a thoughtful gift item."
                        },
                        {
                            element: document.querySelector('#save-and-next-button'),
                            intro: "Click Save and Next to securely save your current details and proceed to the next step of checkout."
                        }
                    ]
                }).start();
                localStorage.setItem('introShown', 'true'); // Set flag to indicate intro was shown
            }
        });
    </script>

@endsection
