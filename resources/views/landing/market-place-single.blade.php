@extends('landing.common.app')


@section('title', '[Template Name] - Professional [Template Type] Template | Liyamana')
@section('meta_description', 'Discover Liyamana, the premier letter marketplace for buying and selling personalized letter templates. Perfect for business, personal, and creative communication needs.')
@section('meta_keywords', 'Liyamana, letter marketplace, letter templates, buy letter templates, sell letter templates, personalized letters, business letter templates, creative letter designs, online letter platform')



@section('content')
    <!-- CSS Start -->
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300|Lobster|Architects+Daughter|Roboto|Oswald|Montserrat|Lora|PT+Sans|Ubuntu|Roboto+Slab|Fjalla+One|Indie+Flower|Playfair+Display|Poiret+One|Dosis|Oxygen|Lobster|Play|Shadows+Into+Light|Pacifico|Dancing+Script|Kaushan+Script|Gloria+Hallelujah|Black+Ops+One|Lobster+Two|Satisfy|Pontano+Sans|Domine|Russo+One|Handlee|Courgette|Special+Elite|Amaranth|Vidaloka' rel='stylesheet' type='text/css'>

    @push('head-css')
        <link rel="stylesheet" type="text/css" href="{{url('editor/normalize.css')}}" >
        <link rel="stylesheet" type="text/css" href="{{url('editor/font-awesome.min.css')}}" >
        <link rel="stylesheet" type="text/css" href="{{url('editor/boostrap.min.css')}}" >
        <link rel="stylesheet" type="text/css" href="{{url('editor/ng-scrollbar.min.css')}}" >
        <link rel="stylesheet" type="text/css" href="{{url('editor/style.css')}}" >
        <link rel="stylesheet" type="text/css" href="{{url('editor/custom.css')}}" >
        <link rel="stylesheet" type="text/css" href="{{url('editor/fonts.css')}}" >
        <link rel="stylesheet" type="text/css" href="{{url('editor/bootstrap-colorpicker.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('editor/angular-material.css')}}">
    @endpush
    <!-- CSS End -->
    @push('head-js')
        <script type="text/javascript" src="https://designtailor.veepixel.com/dt/js/jquery.js"></script>
        <script type="text/javascript" src="https://designtailor.veepixel.com/dt/js/bootstrap.min.js"></script>
    @endpush

<div style="margin-top: 100px" class="container ng-scope" ng-controller="ProductCtrl" ng-app="productApp" id="productApp">

    @include('landing.editor.preloader_tools_instalizing')
    <div class="row clearfix" ng-cloak>
        @include('landing.editor.side_pane')
        @include('landing.editor.design_panel')
    </div>
</div>

    @push('footer-js')

        <script src="{{url('editor/angular.js')}}"></script>

        <script src="{{url('editor/angular-animate.js')}}"></script>
        <script src="{{url('editor/angular-aria.js')}}"></script>

        <script src="{{url('editor/angular-material.js')}}"></script>

        <script src="{{url('editor/angular-file-upload.js')}}"></script>
        <script src="{{url('editor/angular-file-upload-shim.js')}}"></script>

        <script type="text/javascript" src="{{url('editor/raphael-2.1.0-min.js')}}"></script>
        <script type="text/javascript" src="{{url('editor/qrcodesvg.js')}}"></script>

        <script src='assets/word-cloud/d3.v3.min.js'></script>
        <script src='assets/word-cloud/d3.layout.cloud.js'></script>

        <script src="{{url('editor/angular-sanitize.min.js')}}"></script>
        <script src="{{url('editor/ng-scrollbar.min.js')}}"></script>

        <script src="{{url('editor/fabric.js')}}"></script>
        <script src="{{url('editor/fabric.min.js')}}"></script>
        <script src="{{url('editor/fabricCanvas.js')}}"></script>
        <script src="{{url('editor/fabricConstants.js')}}"></script>
        <script src="{{url('editor/fabricDirective.js')}}"></script>
        <script src="{{url('editor/fabricDirtyStatus.js')}}"></script>
        <script src="{{url('editor/fabricUtilities.js')}}"></script>
        <script src="{{url('editor/fabricWindow.js')}}"></script>
        <script src="{{url('editor/fabric.curvedText.js')}}"></script>
        <script src="{{url('editor/fabric.customiseControls.js')}}"></script>

        <script src="{{url('editor/bootstrap-colorpicker-module.js')}}"></script>
        <script src="{{url('editor/application.js')}}"></script>

        <script src="{{url('editor/fileSaver.js')}}"></script>
        <script src="{{url('editor/jspdf.debug.js')}}"></script>
    @endpush



<div id="qrcode"></div>
<div id="wordcloud"></div>
<div class="css_gen"></div>
<div class="svgElements"></div>


@endsection
