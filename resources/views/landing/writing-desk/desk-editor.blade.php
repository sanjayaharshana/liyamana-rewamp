<style>
    .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active{
        background: #b4261c;
        color: white !important;
        border-style: none;
    }
    .form-control::placeholder {
        color: #cccccc;
        opacity: 1; /* Firefox */
    }

    .form-control::-ms-input-placeholder { /* Edge 12 -18 */
        color: #cbcbcb;
    }
</style>


<div class="container">
    <div class="row">

            <div class="col-md-4" style="background: #b5261c;color: white;padding-top: 20px;">
                @foreach(json_decode($layoutItem['form_data']) as $keyItem =>$fieldItem)

                    @if($fieldItem->type == 'textarea')
                        <div class="form-group">
                            <label for="textInput">{{$fieldItem->label}}:</label>
                            <textarea style="background-color: #8f0606;border-style: none;color: white;" rows="5" class="form-control" type="{{$fieldItem->type}}" id="{{$key}}{{ removeUnderscores($fieldItem->name) }}" name="{{ removeUnderscores($fieldItem->name) }}" placeholder="Enter text">{{$design[$key.'_page']['objects'][$keyItem]['text'] ?? null}}</textarea>
                        </div>
                    @else
                        <div class="form-group">
                            <label for="textInput">{{$fieldItem->label}}:</label>
                            <input style="background-color: #8f0606;border-style: none;color: white;" value="{{$design[$key.'_page']['objects'][$keyItem]['text'] ?? null}}" class="form-control" type="{{$fieldItem->type}}" id="{{$key}}{{ removeUnderscores($fieldItem->name) }}" name="{{ removeUnderscores($fieldItem->name) }}" placeholder="Enter text">
                        </div>
                    @endif
                @endforeach

                    <br>
            </div>


        <div class="col-md-8">
            <div style="background: url('{{url('grid.jpg')}}');padding-top: 20px;padding-bottom: 20px;background-size:281px;">
                <div style="width: 70%;margin-left: 21%;">
                    <canvas id="{{$key}}canvas" width="800" height="600" style=""></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Helper function to remove underscores from field names
    function removeUnderscores(str) {
        return str.replace(/_/g, '');
    }

    // Initialize Fabric.js Canvas
    const {{$key}}canvas = new fabric.Canvas('{{$key}}canvas');

    // Add a text element to the canvas for each fieldItem
    @foreach(json_decode($layoutItem['form_data']) as $keyField => $fieldItem)

    @if($design[$key.'_page'] ?? null)

        const {{$key}}{{ removeUnderscores($fieldItem->name) }} =  new fabric.{{$fieldItem->type  == 'text'? 'Text' : 'Textbox' }}(`{{$design[$key.'_page']['objects'][$keyField]['text'] ?? 'Default Text'}}`, {
            left: {{$design[$key.'_page']['objects'][$keyField]['left'] ?? 100}},
            top: {{$design[$key.'_page']['objects'][$keyField]['top'] ?? 100}},
            width: 800,
            height: 1000,
            scaleX: {{  $design[$key.'_page']['objects'][$keyField]['scaleX'] ?? 100}},
            scaleY: {{  $design[$key.'_page']['objects'][$keyField]['scaleY'] ?? 100}},
            fontSize: 30,
            fill: 'black',
            editable: false,
        });
    @else
        const {{$key}}{{ removeUnderscores($fieldItem->name) }} =  new fabric.{{$fieldItem->type  == 'text'? 'Text' : 'Textbox' }}(`{!! getTemplatePositions($template->id,$key,$fieldItem->name)['text'] ?? 'Default Text' !!}`, {
            left: {{getTemplatePositions($template->id,$key,$fieldItem->name)['left'] ?? 100}},
            top: {{getTemplatePositions($template->id,$key,$fieldItem->name)['top'] ?? 100}},
            width: 800,
            height: 1000,
            scaleX: {{getTemplatePositions($template->id,$key,$fieldItem->name)['scaleX'] ?? 100}},
            scaleY: {{getTemplatePositions($template->id,$key,$fieldItem->name)['scaleY'] ?? 100}},
            fontSize: 30,
            fill: 'black',
            editable: false,
        });
    @endif


    @if($template->sizes)
    {{$key}}canvas.setWidth({{$template->sizes()->first()->width}});
    {{$key}}canvas.setHeight({{$template->sizes()->first()->height}});

    @endif


    // Add the text element to the canvas
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
        // Scale the image to fit the canvas
        img.scaleToWidth({{$key}}canvas.width);
        img.scaleToHeight({{$key}}canvas.height);
        img.set({
            {{--left: {{$key}}canvas.width / 2 - img.getScaledWidth() / 2,--}}
            {{--top: {{$key}}canvas.height / 2 - img.getScaledHeight() / 2,--}}
            originX: 'left',
            originY: 'top',
            format: 'png',


        });

        // Set the background image of the canvas
        {{$key}}canvas.setBackgroundImage(img, {{$key}}canvas.renderAll.bind({{$key}}canvas));
    });


    saveDataButton.addEventListener("click", function() {
        const {{$key}}canvasJSON = JSON.stringify({{$key}}canvas.toJSON());
        const {{$key}}_page_data = document.getElementById('{{$key}}_page_data');
        {{$key}}_page_data.value = {{$key}}canvasJSON;
    });




</script>
