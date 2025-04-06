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
        background: #8f0606;
        padding: 5px;
        border-radius: 4px;
    }
    .text-toolbar .btn-group {
        margin-right: 5px;
    }
    .text-toolbar select,
    .text-toolbar input {
        margin: 0 5px;
    }
    .text-toolbar .btn-light {
        background: #b5261c;
        color: white;
        border: none;
        padding: 5px 10px;
    }
    .text-toolbar .btn-light:hover {
        background: #d32f2f;
    }
    .text-toolbar .form-select option {
        background: #8f0606;
        color: white;
    }
    .text-formatting-options {
        margin-top: 5px;
        padding: 5px;
        border-radius: 4px;
        background: #8f0606;
    }
    .text-formatting-options .btn-group {
        margin-right: 5px;
    }
    .text-formatting-options select,
    .text-formatting-options input {
        margin: 0 5px;
    }
    .text-formatting-options .btn-light {
        background: #b5261c;
        color: white;
        border: none;
        padding: 5px 10px;
    }
    .text-formatting-options .btn-light:hover {
        background: #d32f2f;
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
                <div id="textToolbar_{{$key}}" class="text-toolbar" style="display: none; background: #8f0606; box-shadow: none; padding: 5px;">
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
            @foreach(json_decode($layoutItem['form_data']) as $keyField => $fieldItem)
                <div class="form-group" id="field_group_{{$key}}_{{ removeUnderscores($fieldItem->name) }}">
                    <div class="d-flex justify-content-between align-items-center">
                        <label for="textInput">{{$fieldItem->label}}:</label>
                        <button type="button" class="btn btn-sm btn-danger" onclick="removeTextField_{{$key}}_{{ removeUnderscores($fieldItem->name) }}()">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
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
                    <textarea style="background-color: #8f0606;border-style: none;color: white;" rows="5" class="form-control" type="{{$fieldItem->type}}" id="{{$key}}{{ removeUnderscores($fieldItem->name) }}" name="{{ removeUnderscores($fieldItem->name) }}" placeholder="Enter text">{{isset($design[$key.'_page']) ? ($design[$key.'_page']['objects'][$keyField]['text'] ?? '') : (getTemplatePositions($template->id,$key,$fieldItem->name)['text'] ?? '')}}</textarea>
                </div>
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

    // Track deleted fields in an object - moved outside the loop
    const {{$key}}_deletedFields = {};

    // Add Text button functionality
    document.getElementById('addTextBtn_{{$key}}').addEventListener('click', function() {
        // Create a unique ID for the new text field
        const timestamp = new Date().getTime();
        const newFieldId = `custom_${timestamp}`;
        
        // Create the fabric text object
        const text = new fabric.IText('Double click to edit', {
            id: newFieldId,
            left: 100,
            top: 100,
            fontSize: 20,
            fill: 'black',
            editable: true,
            fontFamily: 'Arial',
            textAlign: 'left',
            width: 200,
            height: 50,
            scaleX: 1,
            scaleY: 1,
            angle: 0
        });

        // Add the text object to canvas
        {{$key}}canvas.add(text);
        {{$key}}canvas.setActiveObject(text);
        text.enterEditing();
        {{$key}}canvas.renderAll();

        // Show the text toolbar
        const textToolbar = document.getElementById('textToolbar_{{$key}}');
        if (textToolbar) {
            textToolbar.style.display = 'block';
            updateToolbarValues_{{$key}}(text);
        }
    });

    // Add right-click context menu functionality
    {{$key}}canvas.on('mouse:down', function(options) {
        if (options.e.button === 2) { // Right click
            const target = options.target;
            if (target && target.type === 'i-text') {
                // Show the text toolbar
                const textToolbar = document.getElementById('textToolbar_{{$key}}');
                textToolbar.style.display = 'block';
                
                // Update toolbar values
                updateToolbarValues_{{$key}}(target);
                
                // Prevent default context menu
                options.e.preventDefault();
            }
        }
    });

    // Hide toolbar when clicking outside
    {{$key}}canvas.on('mouse:down', function(options) {
        if (options.e.button === 0) { // Left click
            const target = options.target;
            if (!target || target.type !== 'i-text') {
                const textToolbar = document.getElementById('textToolbar_{{$key}}');
                textToolbar.style.display = 'none';
            }
        }
    });

    // Prevent default context menu on canvas
    document.getElementById('{{$key}}canvas').addEventListener('contextmenu', function(e) {
        e.preventDefault();
    });

    // Add a text element to the canvas for each fieldItem
    @foreach(json_decode($layoutItem['form_data']) as $keyField => $fieldItem)
        function removeTextField_{{$key}}_{{ removeUnderscores($fieldItem->name) }}() {
            // Remove the field group from DOM
            const fieldGroup = document.getElementById('field_group_{{$key}}_{{ removeUnderscores($fieldItem->name) }}');
            if (fieldGroup) {
                fieldGroup.style.display = 'none';
            }

            // Remove the text object from canvas
            const textObj = {{$key}}canvas.getObjects().find(obj => obj.id === '{{$key}}_{{ removeUnderscores($fieldItem->name) }}');
            if (textObj) {
                {{$key}}canvas.remove(textObj);
                {{$key}}canvas.renderAll();
            }

            // Mark field as deleted
            {{$key}}_deletedFields['{{ removeUnderscores($fieldItem->name) }}'] = true;
        }

        let {{$key}}{{ removeUnderscores($fieldItem->name) }} = null;

    @if($design[$key.'_page'] ?? null)
        // Check if this field was previously deleted
        @if(!isset($design[$key.'_page']['deletedFields']) || !in_array(removeUnderscores($fieldItem->name), $design[$key.'_page']['deletedFields']))
            @php
                // Find the matching object in saved design data
                $savedObject = null;
                if (isset($design[$key.'_page']['objects'])) {
                    foreach ($design[$key.'_page']['objects'] as $obj) {
                        if (isset($obj['id']) && $obj['id'] === $key.'_'.removeUnderscores($fieldItem->name)) {
                            $savedObject = $obj;
                            break;
                        }
                    }
                }
                $savedText = $savedObject['text'] ?? $design[$key.'_page']['objects'][$keyField]['text'] ?? '';
            @endphp
            {{$key}}{{ removeUnderscores($fieldItem->name) }} = new fabric.{{$fieldItem->type == 'text'? 'Text' : 'Textbox' }}(`{!! $savedText !!}`, {
                id: '{{$key}}_{{ removeUnderscores($fieldItem->name) }}',
                left: {{$savedObject['left'] ?? $design[$key.'_page']['objects'][$keyField]['left'] ?? 100}},
                top: {{$savedObject['top'] ?? $design[$key.'_page']['objects'][$keyField]['top'] ?? 100}},
                width: {{$savedObject['width'] ?? 800}},
                height: {{$savedObject['height'] ?? 1000}},
                scaleX: {{$savedObject['scaleX'] ?? $design[$key.'_page']['objects'][$keyField]['scaleX'] ?? 1}},
                scaleY: {{$savedObject['scaleY'] ?? $design[$key.'_page']['objects'][$keyField]['scaleY'] ?? 1}},
                fontSize: {{$savedObject['fontSize'] ?? $design[$key.'_page']['objects'][$keyField]['fontSize'] ?? 30}},
                fill: '{{$savedObject['fill'] ?? $design[$key.'_page']['objects'][$keyField]['fill'] ?? 'black'}}',
                fontFamily: '{{$savedObject['fontFamily'] ?? $design[$key.'_page']['objects'][$keyField]['fontFamily'] ?? 'Arial'}}',
                textAlign: '{{$savedObject['textAlign'] ?? $design[$key.'_page']['objects'][$keyField]['textAlign'] ?? 'left'}}',
                angle: {{$savedObject['angle'] ?? $design[$key.'_page']['objects'][$keyField]['angle'] ?? 0}},
                editable: false,
            });

            // Set the text field value from saved data
            document.addEventListener('DOMContentLoaded', function() {
                const inputField = document.getElementById('{{$key}}{{ removeUnderscores($fieldItem->name) }}');
                if (inputField) {
                    inputField.value = `{!! $savedText !!}`;
                }
            });
        @endif
    @else
        @php
            $templatePosition = getTemplatePositions($template->id,$key,$fieldItem->name);
            $templateText = $templatePosition['text'] ?? 'Default Text';
        @endphp
        {{$key}}{{ removeUnderscores($fieldItem->name) }} = new fabric.{{$fieldItem->type == 'text'? 'Text' : 'Textbox' }}(`{!! $templateText !!}`, {
            id: '{{$key}}_{{ removeUnderscores($fieldItem->name) }}',
            left: {{$templatePosition['left'] ?? 100}},
            top: {{$templatePosition['top'] ?? 100}},
            width: 800,
            height: 1000,
            scaleX: {{$templatePosition['scaleX'] ?? 1}},
            scaleY: {{$templatePosition['scaleY'] ?? 1}},
            fontSize: {{$templatePosition['fontSize'] ?? 30}},
            fill: '{{$templatePosition['fill'] ?? 'black'}}',
            fontFamily: '{{$templatePosition['fontFamily'] ?? 'Arial'}}',
            textAlign: '{{$templatePosition['textAlign'] ?? 'left'}}',
            editable: false,
        });

        // Set the text field value from template
        document.addEventListener('DOMContentLoaded', function() {
            const inputField = document.getElementById('{{$key}}{{ removeUnderscores($fieldItem->name) }}');
            if (inputField) {
                inputField.value = `{!! $templateText !!}`;
            }
        });
    @endif

    @if($template->sizes)
        {{$key}}canvas.setWidth({{$template->sizes()->first()->width}});
        {{$key}}canvas.setHeight({{$template->sizes()->first()->height}});
    @endif

    // Add the text element to the canvas if it exists
    if ({{$key}}{{ removeUnderscores($fieldItem->name) }}) {
        {{$key}}canvas.add({{$key}}{{ removeUnderscores($fieldItem->name) }});
    }

    // Handle text input change for this specific tab
    const inputElement_{{$key}}_{{ removeUnderscores($fieldItem->name) }} = document.getElementById('{{$key}}{{ removeUnderscores($fieldItem->name) }}');
    if (inputElement_{{$key}}_{{ removeUnderscores($fieldItem->name) }}) {
        inputElement_{{$key}}_{{ removeUnderscores($fieldItem->name) }}.addEventListener('input', function() {
            if ({{$key}}{{ removeUnderscores($fieldItem->name) }}) {
                {{$key}}{{ removeUnderscores($fieldItem->name) }}.set('text', this.value);
                {{$key}}canvas.renderAll();
            }
        });
    }

    // If field was previously deleted, hide it
    @if(isset($design[$key.'_page']['deletedFields']) && in_array(removeUnderscores($fieldItem->name), $design[$key.'_page']['deletedFields']))
        document.addEventListener('DOMContentLoaded', function() {
            removeTextField_{{$key}}_{{ removeUnderscores($fieldItem->name) }}();
        });
    @endif

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
        const {{$key}}canvasObjects = {{$key}}canvas.getObjects();
        const {{$key}}pageData = {
            objects: {},
            deletedFields: Object.keys({{$key}}_deletedFields)
        };

        {{$key}}canvasObjects.forEach((obj) => {
            if (obj.type === 'text' || obj.type === 'textbox' || obj.type === 'i-text') {
                {{$key}}pageData.objects[obj.id] = {
                    id: obj.id,
                    top: obj.top,
                    left: obj.left,
                    text: obj.text,
                    angle: obj.angle,
                    width: obj.width,
                    height: obj.height,
                    scaleX: obj.scaleX,
                    scaleY: obj.scaleY,
                    stroke: obj.stroke,
                    fontSize: obj.fontSize,
                    fontFamily: obj.fontFamily,
                    fill: obj.fill,
                    textAlign: obj.textAlign,
                    type: obj.type
                };
            }
        });

        const {{$key}}_page_data = document.getElementById('{{$key}}_page_data');
        {{$key}}_page_data.value = JSON.stringify({{$key}}pageData);
    });

    // Text formatting toolbar functionality
    const textToolbar_{{$key}} = document.getElementById('textToolbar_{{$key}}');
    const fontSizeSelect_{{$key}} = document.getElementById('fontSizeSelect_{{$key}}');
    const fontFamilySelect_{{$key}} = document.getElementById('fontFamilySelect_{{$key}}');
    const textColorPicker_{{$key}} = document.getElementById('textColorPicker_{{$key}}');
    const textAlignButtons_{{$key}} = document.getElementById('textAlignButtons_{{$key}}');
    const deleteTextBtn_{{$key}} = document.getElementById('deleteText_{{$key}}');
    const fontSizeBtn_{{$key}} = document.getElementById('fontSize_{{$key}}');
    const fontFamilyBtn_{{$key}} = document.getElementById('fontFamily_{{$key}}');
    const textColorBtn_{{$key}} = document.getElementById('textColor_{{$key}}');
    const textAlignBtn_{{$key}} = document.getElementById('textAlign_{{$key}}');

    // Show/hide toolbar based on selection
    {{$key}}canvas.on('selection:created', function(e) {
        if (e.selected[0] && e.selected[0].type === 'i-text') {
            if (textToolbar_{{$key}}) {
                textToolbar_{{$key}}.style.display = 'block';
                updateToolbarValues_{{$key}}(e.selected[0]);
            }
        }
    });

    {{$key}}canvas.on('selection:updated', function(e) {
        if (e.selected[0] && e.selected[0].type === 'i-text') {
            if (textToolbar_{{$key}}) {
                textToolbar_{{$key}}.style.display = 'block';
                updateToolbarValues_{{$key}}(e.selected[0]);
            }
        }
    });

    {{$key}}canvas.on('selection:cleared', function() {
        if (textToolbar_{{$key}}) {
            textToolbar_{{$key}}.style.display = 'none';
        }
    });

    // Update toolbar values based on selected text
    function updateToolbarValues_{{$key}}(textObject) {
        if (fontSizeSelect_{{$key}}) fontSizeSelect_{{$key}}.value = textObject.fontSize;
        if (fontFamilySelect_{{$key}}) fontFamilySelect_{{$key}}.value = textObject.fontFamily;
        if (textColorPicker_{{$key}}) textColorPicker_{{$key}}.value = textObject.fill;
    }

    // Delete text button
    if (deleteTextBtn_{{$key}}) {
        deleteTextBtn_{{$key}}.addEventListener('click', function() {
            const activeObject = {{$key}}canvas.getActiveObject();
            if (activeObject && activeObject.type === 'i-text') {
                {{$key}}canvas.remove(activeObject);
                {{$key}}canvas.renderAll();
                if (textToolbar_{{$key}}) {
                    textToolbar_{{$key}}.style.display = 'none';
                }
            }
        });
    }

    // Font size button
    if (fontSizeBtn_{{$key}}) {
        fontSizeBtn_{{$key}}.addEventListener('click', function() {
            if (fontSizeSelect_{{$key}}) {
                fontSizeSelect_{{$key}}.classList.toggle('d-none');
            }
        });
    }

    // Font family button
    if (fontFamilyBtn_{{$key}}) {
        fontFamilyBtn_{{$key}}.addEventListener('click', function() {
            if (fontFamilySelect_{{$key}}) {
                fontFamilySelect_{{$key}}.classList.toggle('d-none');
            }
        });
    }

    // Text color button
    if (textColorBtn_{{$key}}) {
        textColorBtn_{{$key}}.addEventListener('click', function() {
            if (textColorPicker_{{$key}}) {
                textColorPicker_{{$key}}.classList.toggle('d-none');
            }
        });
    }

    // Text align button
    if (textAlignBtn_{{$key}}) {
        textAlignBtn_{{$key}}.addEventListener('click', function() {
            if (textAlignButtons_{{$key}}) {
                textAlignButtons_{{$key}}.classList.toggle('d-none');
            }
        });
    }

    // Font size change handler
    if (fontSizeSelect_{{$key}}) {
        fontSizeSelect_{{$key}}.addEventListener('change', function() {
            const activeObject = {{$key}}canvas.getActiveObject();
            if (activeObject && activeObject.type === 'i-text') {
                activeObject.set('fontSize', parseInt(this.value));
                {{$key}}canvas.renderAll();
            }
        });
    }

    // Font family change handler
    if (fontFamilySelect_{{$key}}) {
        fontFamilySelect_{{$key}}.addEventListener('change', function() {
            const activeObject = {{$key}}canvas.getActiveObject();
            if (activeObject && activeObject.type === 'i-text') {
                activeObject.set('fontFamily', this.value);
                {{$key}}canvas.renderAll();
            }
        });
    }

    // Text color change handler
    if (textColorPicker_{{$key}}) {
        textColorPicker_{{$key}}.addEventListener('input', function() {
            const activeObject = {{$key}}canvas.getActiveObject();
            if (activeObject && activeObject.type === 'i-text') {
                activeObject.set('fill', this.value);
                {{$key}}canvas.renderAll();
            }
        });
    }

    // Text alignment handlers
    if (textAlignButtons_{{$key}}) {
        textAlignButtons_{{$key}}.querySelectorAll('button').forEach(button => {
            button.addEventListener('click', function() {
                const activeObject = {{$key}}canvas.getActiveObject();
                if (activeObject && activeObject.type === 'i-text') {
                    activeObject.set('textAlign', this.dataset.align);
                    {{$key}}canvas.renderAll();
                }
            });
        });
    }

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
