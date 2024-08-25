@extends('landing.common.app')

@section('content')

    <div style="margin-top: 70px"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.5.0/fabric.min.js"></script>



    @include('landing.single-product.navigration_tab',[
    'activeTab'=>'writing-desk'])


    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="textInput">Text:</label>
                    <input class="form-control" type="text" id="textInput" name="textInput" placeholder="Enter text">
                </div>

                <div class="form-group">
                    <label for="selectInput">Options:</label>
                    <select class="form-select" id="selectInput" name="selectInput">
                        <option value="option1">Option 1</option>
                        <option value="option2">Option 2</option>
                    </select>
                </div>


            </div>
            <div class="col-md-8">
                <div style="width: 70%;">
                    <canvas id="canvas" width="800" height="600"></canvas>
                </div>
            </div>
        </div>
    </div>




    <script>
        // Initialize Fabric.js Canvas
        const canvas = new fabric.Canvas('canvas');

        // Add a text element to the canvas
        const textElement = new fabric.Text('Default Text', {
            left: 100,
            top: 100,
            fontSize: 30,
            fill: 'black',
        });


        const imageUrl = '{{url('storage/'.$template->feature_image)}}';

        // Set the background image from the URL
        fabric.Image.fromURL(imageUrl, function(img) {
            // Scale the image to fit the canvas
            img.scaleToWidth(canvas.width);
            img.scaleToHeight(canvas.height);

            // Set the background image of the canvas
            canvas.setBackgroundImage(img, canvas.renderAll.bind(canvas));
        });



        canvas.add(textElement);

        // Handle text input change
        document.getElementById('textInput').addEventListener('input', function() {
            textElement.set('text', this.value);
            canvas.renderAll(); // Re-render the canvas to apply changes
        });

        // Handle select input change
        document.getElementById('selectInput').addEventListener('change', function() {
            if (this.value === 'option1') {
                textElement.set('fill', 'blue'); // Change text color to blue for option1
            } else if (this.value === 'option2') {
                textElement.set('fill', 'red'); // Change text color to red for option2
            }
            canvas.renderAll(); // Re-render the canvas to apply changes
        });
    </script>



@endsection
