@extends('landing.common.app')

@section('content')
    <meta name="msapplication-TileColor">
    <meta name="theme-color">
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








        <section class="customizer" id="customizer">
            <a href="http://designtailor.veepixel.com/"><img src="images/logo.png" alt="" class="logo"></a>
            <div class="selector">
                <h2>Live Customizer</h2>
                <div class="color_section color_block">


                    <span class="customizer_headings">Color Changer</span>

                    <div class="col-lg-12 color-mixer">
                        <div class="col-lg-12">
                            <label class="customizer-label">Primary</label>
                            <div class="input-group colorPicker2 colorpicker-element">
                                <input ng-model="primaryColor" colorpicker type="text" value="" class="form-control"/>
                                <span class="input-group-addon"><i style="background: @{{primaryColor}};"></i></span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <label class="customizer-label">Secondary</label>
                            <div class="input-group colorPicker2 colorpicker-element">
                                <input ng-model="secondaryColor" colorpicker type="text" value="" class="form-control"/>
                                <span class="input-group-addon"><i style="background: @{{secondaryColor}};"></i></span>
                            </div>
                        </div>
                        <hr /><br /><br />
                        <div class="col-lg-12">
                            <center><input ng-model="colorResult" type="button" value="Apply Color Scheme" class="btn btn-info" ng-click="changeColorScheme()"/></center>
                        </div>

                    </div>

                    <span class="customizer_headings">Canvas Background</span>
                    <ul id="canvas_color_selector" class="color_selector canvas_selector">
                        <li data-attr="images/site_bg_01.jpg" class="canvas_1"></li>
                        <li data-attr="images/site_bg_02.jpg" class="canvas_2"></li>
                        <li data-attr="images/site_bg_03.jpg" class="canvas_3"></li>
                        <li data-attr="images/site_bg_04.jpg" class="canvas_4"></li>
                    </ul>
                    <span class="customizer_headings">Page Layout</span>
                    <ul class="layout_options">
                        <li><a href="index.html"><img src="images/layout_2.jpg" style="width: 60px;"></a></li>
                        <li><a href="index_01.html"><img src="images/layout_1.jpg" style="width: 60px;"></a></li>
                        <li><a href="index_02.html"><img src="images/layout_3.jpg" style="width: 60px;"></a></li>
                    </ul>
                </div>
            </div>
            <i class="bi bi-gear" id="selector_icon"></i>
        </section>
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
