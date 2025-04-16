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
