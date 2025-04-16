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
    <textarea style="background-color: #8f0606;border-style: none;color: white;" rows="5" class="form-control" type="{{$fieldItem->type}}" id="{{$key}}{{ removeUnderscores($fieldItem->name) }}" name="{{ removeUnderscores($fieldItem->name) }}" placeholder="Enter text">
                        @if(isset($design[$key.'_page']) && isset($design[$key.'_page']['objects'][$keyField]))
            {{ $design[$key.'_page']['objects'][$keyField]['text'] ?? '' }}
        @else
            {{ getTemplatePositions($template->id,$key,$fieldItem->name)['text'] ?? '' }}
        @endif
                    </textarea>
</div>
