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
                    <button style="" class="nav-link" id="{{$page_id}}-tab" data-bs-toggle="tab" data-bs-target="#{{$page_id}}" type="button" role="tab" aria-controls="{{$page_id}}" aria-selected="true">{{ $page_id }}</button>
                </li>
            @endforeach
        </ul>


        <div class="tab-content" id="myTabContent">
            <div style="padding-top: 30px;" class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">


                <div class="row">
                    <div class="col-md-4">
                        <div class="" style="padding-bottom: 20px">
                            <div style="background: #575757;color: white;padding-left: 14px;padding-right: 14px;padding-top: 9px;padding-bottom: 9px;font-size: 14px;">
                                Page Sizes
                            </div>
                            <div style="background: #818181;color: white;padding: 18px;padding-bottom: 10px;padding-top: 0px">
                                <div class="form-group">
                                    <label style="font-size: 12px;">Page Size:</label>
                                    <select type="text" class="form-select" name="page_size" style="background: #696969;border-style: initial;margin-top: 3px;font-size: 12px;color: white;">
                                        <option value="a4" selected="">A4</option>
                                        <option value="a3">A3</option>
                                    </select>
                                </div>
                            </div>

                            <div style="background: #818181;color: white;padding: 18px;padding-bottom: 20px;padding-top: 0px">
                                <div class="form-group">
                                    <label style="font-size: 12px;">Output Quality:</label>
                                    <select type="text" class="form-select" name="page_size" style="background: #696969;border-style: initial;margin-top: 3px;font-size: 12px;color: white;">
                                        <option value="high" selected="">High</option>
                                        <option value="normal">Normal</option>
                                        <option value="low">Low</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="" style="padding-bottom: 20px">
                            <div style="background: #575757;color: white;padding-left: 14px;padding-right: 14px;padding-top: 9px;padding-bottom: 9px;font-size: 14px;">
                                Page Sizes
                            </div>
                            <div style="background: #818181;color: white;padding: 18px;padding-bottom: 10px;padding-top: 0px">
                                <div class="form-group">
                                    <label style="font-size: 12px;">Page Size:</label>
                                    <select type="text" class="form-select" name="page_size" style="background: #696969;border-style: initial;margin-top: 3px;font-size: 12px;color: white;">
                                        <option value="a4" selected="">A4</option>
                                        <option value="a3">A3</option>
                                    </select>
                                </div>
                            </div>

                            <div style="background: #818181;color: white;padding: 18px;padding-bottom: 20px;padding-top: 0px">
                                <div class="form-group">
                                    <label style="font-size: 12px;">Output Quality:</label>
                                    <select type="text" class="form-select" name="page_size" style="background: #696969;border-style: initial;margin-top: 3px;font-size: 12px;color: white;">
                                        <option value="high" selected="">High</option>
                                        <option value="normal">Normal</option>
                                        <option value="low">Low</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <input type="hidden" id="canvas_data" value="{{ json_encode($object_data) }}">
                        <canvas id="fabricCanvas" width="450" height="600"></canvas>
                    </div>
                </div>




            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

            </div>
        </div>




    </div>

</div>



<button id="generatePDF">Generate PDF</button>

<script>
    // Reference to the canvas element
    const canvas = new fabric.Canvas('fabricCanvas');

    // JSON data
    const jsonData = document.getElementById('canvas_data');

    // Load the JSON data into the canvas
    canvas.loadFromJSON(jsonData.value, () => {
        canvas.renderAll(); // Render the canvas after loading
        console.log('Canvas loaded successfully');
    });

    document.getElementById('generatePDF').addEventListener('click', async () => {
        // Export canvas content to an image
        const dataURL = canvas.toDataURL({
            format: 'png',
            multiplier: 3 // Export at the same resolution as the canvas
        });

        console.log(dataURL);
        const { jsPDF } = window.jspdf; // Access jsPDF
        const pdf = new jsPDF('p', 'pt', 'a4'); // Create A4-sized PDF

        // Use exact canvas dimensions for PDF to avoid resizing
        // const canvasWidth = canvas.getWidth();
        // const canvasHeight = canvas.getHeight();

        pdf.addImage(dataURL, 'PNG', 0, 0, 1240, 900);

        pdf.save('fabricjs-full-a4.pdf'); // Save PDF
    });
</script>

</div>


@endsection
