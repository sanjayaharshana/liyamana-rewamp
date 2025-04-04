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
    .text-toolbar {
        margin-left: 10px;
    }
    .text-toolbar .btn-group {
        margin-right: 5px;
    }
    .text-toolbar select,
    .text-toolbar input {
        margin: 0 5px;
    }
    .text-toolbar .btn-light {
        background: #8f0606;
        color: white;
        border: none;
    }
    .text-toolbar .btn-light:hover {
        background: #a71d1d;
    }
    .text-toolbar .form-select option {
        background: #8f0606;
        color: white;
    }
    .text-formatting-options {
        margin-top: 5px;
        padding: 5px;
        border-radius: 4px;
    }
    .text-formatting-options .btn-group {
        margin-right: 5px;
    }
    .text-formatting-options select,
    .text-formatting-options input {
        margin: 0 5px;
    }
    .text-formatting-options .btn-light {
        background: #8f0606;
        color: white;
        border: none;
    }
    .text-formatting-options .btn-light:hover {
        background: #a71d1d;
    }
    .text-formatting-options .form-select option {
        background: #8f0606;
        color: white;
    }
</style>


<div class="container">
    <div class="row">
        <div class="col-md-4" style="background: #b5261c;color: white;padding-top: 20px;">
            <div class="d-flex align-items-center mb-3">
                <button type="button" class="btn btn-light me-2" id="addTextBtn_{{$key}}">Add Text</button>
                <!-- Text Formatting Toolbar -->
                <div id="textToolbar_{{$key}}" class="text-toolbar" style="display: none; background: transparent; box-shadow: none; padding: 0;">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light" id="deleteText_{{$key}}" title="Delete">
                            <i class="bi bi-trash"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-light" id="fontSize_{{$key}}" title="Font Size">
                            <i class="bi bi-text-paragraph"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-light" id="fontFamily_{{$key}}" title="Font Family">
                            <i class="bi bi-fonts"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-light" id="textColor_{{$key}}" title="Text Color">
                            <i class="bi bi-palette"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-light" id="textAlign_{{$key}}" title="Text Alignment">
                            <i class="bi bi-text-left"></i>
                        </button>
                    </div>
                    <!-- Font Size Dropdown -->
                    <select id="fontSizeSelect_{{$key}}" class="form-select form-select-sm d-none" style="width: auto; display: inline-block; background: #8f0606; color: white; border: none;">
                        <option value="12">12px</option>
                        <option value="14">14px</option>
                        <option value="16">16px</option>
                        <option value="18">18px</option>
                        <option value="20">20px</option>
                        <option value="24">24px</option>
                        <option value="28">28px</option>
                        <option value="32">32px</option>
                        <option value="36">36px</option>
                        <option value="48">48px</option>
                        <option value="64">64px</option>
                        <option value="72">72px</option>
                        <option value="96">96px</option>
                    </select>
                    <!-- Font Family Dropdown -->
                    <select id="fontFamilySelect_{{$key}}" class="form-select form-select-sm d-none" style="width: auto; display: inline-block; background: #8f0606; color: white; border: none;">
                        <option value="Arial">Arial</option>
                        <option value="Times New Roman">Times New Roman</option>
                        <option value="Courier New">Courier New</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Verdana">Verdana</option>
                        <option value="Helvetica">Helvetica</option>
                    </select>
                    <!-- Text Color Input -->
                    <input type="color" id="textColorPicker_{{$key}}" class="form-control form-control-sm d-none" style="width: auto; display: inline-block; background: #8f0606; border: none;">
                    <!-- Text Alignment Buttons -->
                    <div id="textAlignButtons_{{$key}}" class="btn-group d-none">
                        <button type="button" class="btn btn-sm btn-light" data-align="left" title="Align Left">
                            <i class="bi bi-text-left"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-light" data-align="center" title="Align Center">
                            <i class="bi bi-text-center"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-light" data-align="right" title="Align Right">
                            <i class="bi bi-text-right"></i>
                        </button>
                    </div>
                </div>
            </div>
            @foreach(json_decode($layoutItem['form_data']) as $keyItem =>$fieldItem)
                @if($fieldItem->type == 'textarea')
                    <div class="form-group">
                        <label for="textInput">{{$fieldItem->label}}:</label>
                        <textarea style="background-color: #8f0606;border-style: none;color: white;" rows="5" class="form-control" type="{{$fieldItem->type}}" id="{{$key}}{{ removeUnderscores($fieldItem->name) }}" name="{{ removeUnderscores($fieldItem->name) }}" placeholder="Enter text">{{$design[$key.'_page']['objects'][$keyItem]['text'] ?? null}}</textarea>
                        <!-- Text Formatting Options -->
                        <div class="text-formatting-options mt-2">
                            <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-light" onclick="toggleFontSizeSelect_{{$key}}_{{ removeUnderscores($fieldItem->name) }}()" title="Font Size">
                                    <i class="bi bi-text-paragraph"></i>
                                </button>
                                <button type="button" class="btn btn-light" onclick="toggleFontFamilySelect_{{$key}}_{{ removeUnderscores($fieldItem->name) }}()" title="Font Family">
                                    <i class="bi bi-fonts"></i>
                                </button>
                                <button type="button" class="btn btn-light" onclick="toggleTextColorPicker_{{$key}}_{{ removeUnderscores($fieldItem->name) }}()" title="Text Color">
                                    <i class="bi bi-palette"></i>
                                </button>
                                <button type="button" class="btn btn-light" onclick="toggleTextAlignButtons_{{$key}}_{{ removeUnderscores($fieldItem->name) }}()" title="Text Alignment">
                                    <i class="bi bi-text-left"></i>
                                </button>
                            </div>
                            <!-- Font Size Dropdown -->
                            <select id="fontSizeSelect_{{$key}}_{{ removeUnderscores($fieldItem->name) }}" class="form-select form-select-sm d-none" style="width: auto; display: inline-block; background: #8f0606; color: white; border: none;">
                                <option value="12">12px</option>
                                <option value="14">14px</option>
                                <option value="16">16px</option>
                                <option value="18">18px</option>
                                <option value="20">20px</option>
                                <option value="24">24px</option>
                                <option value="28">28px</option>
                                <option value="32">32px</option>
                                <option value="36">36px</option>
                                <option value="48">48px</option>
                                <option value="64">64px</option>
                                <option value="72">72px</option>
                                <option value="96">96px</option>
                            </select>
                            <!-- Font Family Dropdown -->
                            <select id="fontFamilySelect_{{$key}}_{{ removeUnderscores($fieldItem->name) }}" class="form-select form-select-sm d-none" style="width: auto; display: inline-block; background: #8f0606; color: white; border: none;">
                                <option value="Arial">Arial</option>
                                <option value="Times New Roman">Times New Roman</option>
                                <option value="Courier New">Courier New</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Verdana">Verdana</option>
                                <option value="Helvetica">Helvetica</option>
                            </select>
                            <!-- Text Color Input -->
                            <input type="color" id="textColorPicker_{{$key}}_{{ removeUnderscores($fieldItem->name) }}" class="form-control form-control-sm d-none" style="width: auto; display: inline-block; background: #8f0606; border: none;">
                            <!-- Text Alignment Buttons -->
                            <div id="textAlignButtons_{{$key}}_{{ removeUnderscores($fieldItem->name) }}" class="btn-group d-none">
                                <button type="button" class="btn btn-sm btn-light" onclick="setTextAlign_{{$key}}_{{ removeUnderscores($fieldItem->name) }}('left')" title="Align Left">
                                    <i class="bi bi-text-left"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-light" onclick="setTextAlign_{{$key}}_{{ removeUnderscores($fieldItem->name) }}('center')" title="Align Center">
                                    <i class="bi bi-text-center"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-light" onclick="setTextAlign_{{$key}}_{{ removeUnderscores($fieldItem->name) }}('right')" title="Align Right">
                                    <i class="bi bi-text-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="form-group">
                        <label for="textInput">{{$fieldItem->label}}:</label>
                        <input style="background-color: #8f0606;border-style: none;color: white;" value="{{$design[$key.'_page']['objects'][$keyItem]['text'] ?? null}}" class="form-control" type="{{$fieldItem->type}}" id="{{$key}}{{ removeUnderscores($fieldItem->name) }}" name="{{ removeUnderscores($fieldItem->name) }}" placeholder="Enter text">
                        <!-- Text Formatting Options -->
                        <div class="text-formatting-options mt-2">
                            <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-light" onclick="toggleFontSizeSelect_{{$key}}_{{ removeUnderscores($fieldItem->name) }}()" title="Font Size">
                                    <i class="bi bi-text-paragraph"></i>
                                </button>
                                <button type="button" class="btn btn-light" onclick="toggleFontFamilySelect_{{$key}}_{{ removeUnderscores($fieldItem->name) }}()" title="Font Family">
                                    <i class="bi bi-fonts"></i>
                                </button>
                                <button type="button" class="btn btn-light" onclick="toggleTextColorPicker_{{$key}}_{{ removeUnderscores($fieldItem->name) }}()" title="Text Color">
                                    <i class="bi bi-palette"></i>
                                </button>
                                <button type="button" class="btn btn-light" onclick="toggleTextAlignButtons_{{$key}}_{{ removeUnderscores($fieldItem->name) }}()" title="Text Alignment">
                                    <i class="bi bi-text-left"></i>
                                </button>
                            </div>
                            <!-- Font Size Dropdown -->
                            <select id="fontSizeSelect_{{$key}}_{{ removeUnderscores($fieldItem->name) }}" class="form-select form-select-sm d-none" style="width: auto; display: inline-block; background: #8f0606; color: white; border: none;">
                                <option value="12">12px</option>
                                <option value="14">14px</option>
                                <option value="16">16px</option>
                                <option value="18">18px</option>
                                <option value="20">20px</option>
                                <option value="24">24px</option>
                                <option value="28">28px</option>
                                <option value="32">32px</option>
                                <option value="36">36px</option>
                                <option value="48">48px</option>
                                <option value="64">64px</option>
                                <option value="72">72px</option>
                                <option value="96">96px</option>
                            </select>
                            <!-- Font Family Dropdown -->
                            <select id="fontFamilySelect_{{$key}}_{{ removeUnderscores($fieldItem->name) }}" class="form-select form-select-sm d-none" style="width: auto; display: inline-block; background: #8f0606; color: white; border: none;">
                                <option value="Arial">Arial</option>
                                <option value="Times New Roman">Times New Roman</option>
                                <option value="Courier New">Courier New</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Verdana">Verdana</option>
                                <option value="Helvetica">Helvetica</option>
                            </select>
                            <!-- Text Color Input -->
                            <input type="color" id="textColorPicker_{{$key}}_{{ removeUnderscores($fieldItem->name) }}" class="form-control form-control-sm d-none" style="width: auto; display: inline-block; background: #8f0606; border: none;">
                            <!-- Text Alignment Buttons -->
                            <div id="textAlignButtons_{{$key}}_{{ removeUnderscores($fieldItem->name) }}" class="btn-group d-none">
                                <button type="button" class="btn btn-sm btn-light" onclick="setTextAlign_{{$key}}_{{ removeUnderscores($fieldItem->name) }}('left')" title="Align Left">
                                    <i class="bi bi-text-left"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-light" onclick="setTextAlign_{{$key}}_{{ removeUnderscores($fieldItem->name) }}('center')" title="Align Center">
                                    <i class="bi bi-text-center"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-light" onclick="setTextAlign_{{$key}}_{{ removeUnderscores($fieldItem->name) }}('right')" title="Align Right">
                                    <i class="bi bi-text-right"></i>
                                </button>
                            </div>
                        </div>
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

    // Initialize Fabric.js Canvas for this specific tab
    const {{$key}}canvas = new fabric.Canvas('{{$key}}canvas', {
        preserveObjectStacking: true
    });

    // Add text button functionality for this specific tab
    document.getElementById('addTextBtn_{{$key}}').addEventListener('click', function() {
        const text = new fabric.IText('Double click to edit', {
            left: 100,
            top: 100,
            fontSize: 20,
            fill: 'black',
            editable: true,
            fontFamily: 'Arial'
        });

        {{$key}}canvas.add(text);
        {{$key}}canvas.setActiveObject(text);
        text.enterEditing();
        {{$key}}canvas.renderAll();
    });

    // Add a text element to the canvas for each fieldItem
    @foreach(json_decode($layoutItem['form_data']) as $keyField => $fieldItem)

    @if($design[$key.'_page'] ?? null)
        const {{$key}}{{ removeUnderscores($fieldItem->name) }} = new fabric.{{$fieldItem->type == 'text'? 'Text' : 'Textbox' }}(`{{$design[$key.'_page']['objects'][$keyField]['text'] ?? 'Default Text'}}`, {
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
        const {{$key}}{{ removeUnderscores($fieldItem->name) }} = new fabric.{{$fieldItem->type == 'text'? 'Text' : 'Textbox' }}(`{!! getTemplatePositions($template->id,$key,$fieldItem->name)['text'] ?? 'Default Text' !!}`, {
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

    // Handle text input change for this specific tab
    document.getElementById('{{$key}}{{ removeUnderscores($fieldItem->name) }}').addEventListener('input', function() {
        {{$key}}{{ removeUnderscores($fieldItem->name) }}.set('text', this.value);
        {{$key}}canvas.renderAll();
    });

    @endforeach

    // Set the background image from the URL for this specific tab
    const {{$key}}imageUrl = '{{ url('storage/'.$layoutItem['image']) }}';
    fabric.Image.fromURL({{$key}}imageUrl, function(img) {
        img.scaleToWidth({{$key}}canvas.width);
        img.scaleToHeight({{$key}}canvas.height);
        img.set({
            originX: 'left',
            originY: 'top',
            format: 'png',
        });

        {{$key}}canvas.setBackgroundImage(img, {{$key}}canvas.renderAll.bind({{$key}}canvas));
    });

    // Handle tab change to ensure canvas is properly rendered
    document.querySelector('button[data-bs-target="#nav-{{$key}}"]').addEventListener('shown.bs.tab', function (e) {
        {{$key}}canvas.renderAll();
    });

    // Save data for this specific tab
    saveDataButton.addEventListener("click", function() {
        const {{$key}}canvasJSON = JSON.stringify({{$key}}canvas.toJSON());
        const {{$key}}_page_data = document.getElementById('{{$key}}_page_data');
        {{$key}}_page_data.value = {{$key}}canvasJSON;
    });

    // Text formatting toolbar functionality
    const textToolbar_{{$key}} = document.getElementById('textToolbar_{{$key}}');
    const fontSizeSelect_{{$key}} = document.getElementById('fontSizeSelect_{{$key}}');
    const fontFamilySelect_{{$key}} = document.getElementById('fontFamilySelect_{{$key}}');
    const textColorPicker_{{$key}} = document.getElementById('textColorPicker_{{$key}}');
    const textAlignButtons_{{$key}} = document.getElementById('textAlignButtons_{{$key}}');

    // Show/hide toolbar based on selection
    {{$key}}canvas.on('selection:created', function(e) {
        if (e.selected[0] && e.selected[0].type === 'i-text') {
            textToolbar_{{$key}}.style.display = 'block';
            updateToolbarValues_{{$key}}(e.selected[0]);
        }
    });

    {{$key}}canvas.on('selection:updated', function(e) {
        if (e.selected[0] && e.selected[0].type === 'i-text') {
            textToolbar_{{$key}}.style.display = 'block';
            updateToolbarValues_{{$key}}(e.selected[0]);
        }
    });

    {{$key}}canvas.on('selection:cleared', function() {
        textToolbar_{{$key}}.style.display = 'none';
    });

    // Update toolbar values based on selected text
    function updateToolbarValues_{{$key}}(textObject) {
        fontSizeSelect_{{$key}}.value = textObject.fontSize;
        fontFamilySelect_{{$key}}.value = textObject.fontFamily;
        textColorPicker_{{$key}}.value = textObject.fill;
    }

    // Delete text button
    document.getElementById('deleteText_{{$key}}').addEventListener('click', function() {
        const activeObject = {{$key}}canvas.getActiveObject();
        if (activeObject && activeObject.type === 'i-text') {
            {{$key}}canvas.remove(activeObject);
            {{$key}}canvas.renderAll();
            textToolbar_{{$key}}.style.display = 'none';
        }
    });

    // Font size button
    document.getElementById('fontSize_{{$key}}').addEventListener('click', function() {
        fontSizeSelect_{{$key}}.classList.toggle('d-none');
    });

    // Font family button
    document.getElementById('fontFamily_{{$key}}').addEventListener('click', function() {
        fontFamilySelect_{{$key}}.classList.toggle('d-none');
    });

    // Text color button
    document.getElementById('textColor_{{$key}}').addEventListener('click', function() {
        textColorPicker_{{$key}}.classList.toggle('d-none');
    });

    // Text align button
    document.getElementById('textAlign_{{$key}}').addEventListener('click', function() {
        textAlignButtons_{{$key}}.classList.toggle('d-none');
    });

    // Font size change handler
    fontSizeSelect_{{$key}}.addEventListener('change', function() {
        const activeObject = {{$key}}canvas.getActiveObject();
        if (activeObject && activeObject.type === 'i-text') {
            activeObject.set('fontSize', parseInt(this.value));
            {{$key}}canvas.renderAll();
        }
    });

    // Font family change handler
    fontFamilySelect_{{$key}}.addEventListener('change', function() {
        const activeObject = {{$key}}canvas.getActiveObject();
        if (activeObject && activeObject.type === 'i-text') {
            activeObject.set('fontFamily', this.value);
            {{$key}}canvas.renderAll();
        }
    });

    // Text color change handler
    textColorPicker_{{$key}}.addEventListener('input', function() {
        const activeObject = {{$key}}canvas.getActiveObject();
        if (activeObject && activeObject.type === 'i-text') {
            activeObject.set('fill', this.value);
            {{$key}}canvas.renderAll();
        }
    });

    // Text alignment handlers
    textAlignButtons_{{$key}}.querySelectorAll('button').forEach(button => {
        button.addEventListener('click', function() {
            const activeObject = {{$key}}canvas.getActiveObject();
            if (activeObject && activeObject.type === 'i-text') {
                activeObject.set('textAlign', this.dataset.align);
                {{$key}}canvas.renderAll();
            }
        });
    });

    // Add text formatting functions for each field
    @foreach(json_decode($layoutItem['form_data']) as $keyItem => $fieldItem)
        // Toggle functions for each field
        function toggleFontSizeSelect_{{$key}}_{{ removeUnderscores($fieldItem->name) }}() {
            document.getElementById('fontSizeSelect_{{$key}}_{{ removeUnderscores($fieldItem->name) }}').classList.toggle('d-none');
        }

        function toggleFontFamilySelect_{{$key}}_{{ removeUnderscores($fieldItem->name) }}() {
            document.getElementById('fontFamilySelect_{{$key}}_{{ removeUnderscores($fieldItem->name) }}').classList.toggle('d-none');
        }

        function toggleTextColorPicker_{{$key}}_{{ removeUnderscores($fieldItem->name) }}() {
            document.getElementById('textColorPicker_{{$key}}_{{ removeUnderscores($fieldItem->name) }}').classList.toggle('d-none');
        }

        function toggleTextAlignButtons_{{$key}}_{{ removeUnderscores($fieldItem->name) }}() {
            document.getElementById('textAlignButtons_{{$key}}_{{ removeUnderscores($fieldItem->name) }}').classList.toggle('d-none');
        }

        function setTextAlign_{{$key}}_{{ removeUnderscores($fieldItem->name) }}(align) {
            const textObject = {{$key}}{{ removeUnderscores($fieldItem->name) }};
            textObject.set('textAlign', align);
            {{$key}}canvas.renderAll();
        }

        // Font size change handler
        document.getElementById('fontSizeSelect_{{$key}}_{{ removeUnderscores($fieldItem->name) }}').addEventListener('change', function() {
            const textObject = {{$key}}{{ removeUnderscores($fieldItem->name) }};
            textObject.set('fontSize', parseInt(this.value));
            {{$key}}canvas.renderAll();
        });

        // Font family change handler
        document.getElementById('fontFamilySelect_{{$key}}_{{ removeUnderscores($fieldItem->name) }}').addEventListener('change', function() {
            const textObject = {{$key}}{{ removeUnderscores($fieldItem->name) }};
            textObject.set('fontFamily', this.value);
            {{$key}}canvas.renderAll();
        });

        // Text color change handler
        document.getElementById('textColorPicker_{{$key}}_{{ removeUnderscores($fieldItem->name) }}').addEventListener('input', function() {
            const textObject = {{$key}}{{ removeUnderscores($fieldItem->name) }};
            textObject.set('fill', this.value);
            {{$key}}canvas.renderAll();
        });
    @endforeach
</script>
