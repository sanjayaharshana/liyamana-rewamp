@extends('landing.common.app')

@section('content')

    <div style="margin-top: 70px"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.5.0/fabric.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>




    @include('landing.single-product.navigration_tab',[
    'activeTab'=>'checkout'])


    <div class="container">

    </div>
@endsection
