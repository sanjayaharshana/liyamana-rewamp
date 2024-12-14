
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.5.0/fabric.min.js"></script>

<!-- Include jsPDF and html2canvas -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

<div class="container mt-4">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            @foreach($template->layouts as $key => $layoutItem)
                <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="nav-{{$key}}-tab" data-bs-toggle="tab" data-bs-target="#nav-{{$key}}" type="button" role="tab" aria-controls="nav-{{$key}}" aria-selected="{{$loop->first ? 'true' : 'false'}}">{{$layoutItem['name']}}</button>
            @endforeach
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        @foreach($template->layouts as $key => $layoutItem)
            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="nav-{{$key}}" role="tabpanel" aria-labelledby="nav-{{$key}}-tab" tabindex="0">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            @foreach(json_decode($layoutItem['form_data']) as $fieldItem)
                                <div class="form-group">
                                    <label for="{{$key}}{{ removeUnderscores($fieldItem->name) }}">{{$fieldItem->label}}:</label>
                                    @if($fieldItem->type == 'textarea')
                                        <textarea class="form-control" id="{{$key}}{{ removeUnderscores($fieldItem->name) }}" name="{{ removeUnderscores($fieldItem->name) }}" placeholder="Enter text"></textarea>
                                    @else
                                        <input class="form-control" type="{{$fieldItem->type}}" id="{{$key}}{{ removeUnderscores($fieldItem->name) }}" name="{{ removeUnderscores($fieldItem->name) }}" placeholder="Enter text">
                                    @endif
                                </div>
                            @endforeach
                            <button class="btn btn-primary mt-3" onclick="exportCanvas({{$key}}canvas, '{{$key}}')">Export Canvas Objects</button>
                        </div>

                        <div class="col-md-8">
                            <div style="width: 70%;">
                                <canvas id="{{$key}}canvas" width="800" height="600"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    // Initialize Fabric.js Canvas
                    const {{$key}}canvas = new fabric.Canvas('{{$key}}canvas');

                    // Add a text element to the canvas for each fieldItem
                    @foreach(json_decode($layoutItem['form_data']) as $fieldItem)
                    const {{$key}}{{ removeUnderscores($fieldItem->name) }} =  new fabric.Text(`{!! getTemplatePositions($template->id,$key,$fieldItem->name)['text'] ?? 'Default Text' !!}`, {
                        left: {{getTemplatePositions($template->id,$key,$fieldItem->name)['left'] ?? 100}},
                        top: {{getTemplatePositions($template->id,$key,$fieldItem->name)['top'] ?? 100}},
                        width: 400,
                        height: 1000,
                        scaleX: {{getTemplatePositions($template->id,$key,$fieldItem->name)['scaleX'] ?? 100}},
                        scaleY: {{getTemplatePositions($template->id,$key,$fieldItem->name)['scaleY'] ?? 100}},
                        fontSize: 30,
                        fill: 'black',
                    });
                    {{$key}}canvas.add({{$key}}{{ removeUnderscores($fieldItem->name) }});

                    // Handle text input change
                    document.getElementById('{{$key}}{{ removeUnderscores($fieldItem->name) }}').addEventListener('input', function() {
                        {{$key}}{{ removeUnderscores($fieldItem->name) }}.set('text', this.value);
                        {{$key}}canvas.renderAll(); // Re-render the canvas to apply changes
                    });
                    @endforeach

                    // Set the background image from the URL
                    const {{$key}}imageUrl = '{{ url('storage/'.$layoutItem['image']) }}';
                    fabric.Image.fromURL({{$key}}imageUrl, function(img) {
                        img.scaleToWidth({{$key}}canvas.width);
                        img.scaleToHeight({{$key}}canvas.height);
                        img.set({
                            {{--left: {{$key}}canvas.width / 2 - img.getScaledWidth() / 2,--}}
                            {{--top: {{$key}}canvas.height / 2 - img.getScaledHeight() / 2,--}}
                            originX: 'left',
                            originY: 'top'
                        });
                        {{$key}}canvas.setBackgroundImage(img, {{$key}}canvas.renderAll.bind({{$key}}canvas));
                    });

                    // Export canvas objects as JSON
                    function exportCanvas(canvas, layoutkey) {
                        const objectsData = canvas.getObjects().map(obj => {
                            return {
                                type: obj.type,
                                left: obj.left,
                                top: obj.top,
                                width: obj.width,
                                height: obj.height,
                                scaleX: obj.scaleX,
                                scaleY: obj.scaleY,
                                angle: obj.angle,
                                fill: obj.fill,
                                stroke: obj.stroke,
                                text: obj.text ? obj.text : undefined, // Include text only if it is a text object
                                imageUrl: obj._element ? obj._element.src : undefined // Include image URL if it's an image
                            };
                        });

                        $.ajax({
                            url: '{{url('api/save-position_item')}}', // Replace with your Laravel route
                            type: 'POST',
                            data: {
                                canvasData: objectsData, // Data to be sent
                                canvasLayout: layoutkey,
                                templateId: '{{$template->id}}',
                                _token: '{{ csrf_token() }}' // CSRF token for security
                            },
                            success: function(response) {
                                // Handle success response
                                alert('Canvas data sent successfully!');
                                console.log(response);
                            },
                            error: function(xhr, status, error) {
                                // Handle error response
                                alert('An error occurred: ' + error);
                                console.error(xhr.responseText);
                            }
                        });

                        console.log(JSON.stringify(objectsData, null, 2)); // Display Fabric.js objects in alert
                    }
                </script>
            </div>
        @endforeach
    </div>

    <!-- Button to export all canvases as PDF -->
    <button class="btn btn-secondary mt-3" onclick="exportPDF()">Export All Canvases as PDF</button>
</div>

<script>
    // Function to export all canvases as PDF
    function exportPDF() {
        const { jsPDF } = window.jspdf; // Access jsPDF from the global window object
        const pdf = new jsPDF('portrait', 'px', 'a4'); // Create a new PDF document
        let pageWidth = pdf.internal.pageSize.getWidth();
        let pageHeight = pdf.internal.pageSize.getHeight();
        let isFirstPage = true;

        @foreach($template->layouts as $key => $layoutItem)
        let currentCanvasElement = document.getElementById('{{$key}}canvas'); // Use 'let' to avoid redeclaring
        if (currentCanvasElement) {
            // Use html2canvas to capture the canvas as an image
            html2canvas(currentCanvasElement, { scale: 2 }).then(function(canvas) {
                const imageData = canvas.toDataURL('image/png'); // Convert canvas to image (png format)
                const imageWidth = pageWidth; // Make the image width the same as the page width
                const imageHeight = (canvas.height * pageWidth) / canvas.width; // Scale the image height proportionally

                if (!isFirstPage) {
                    pdf.addPage(); // Add a new page if it's not the first one
                }

                pdf.addImage(imageData, 'PNG', 0, 0, imageWidth, imageHeight); // Add the image to the PDF
                isFirstPage = false;

                // Save the PDF once the last canvas is processed
                @if($loop->last)
                pdf.save('canvas-export.pdf'); // Save the PDF with a file name
                @endif
            });
        }
        @endforeach
    }
</script>


