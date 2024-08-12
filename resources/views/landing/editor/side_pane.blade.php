<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 editor_section">
    <div id="content" class="tabing">
        @include('landing.editor.main_tabs')

        <div id="my-tab-content" class="tab-content action_tabs">
            <div class="tab-pane active clearfix" id="Products">
                <h1>Products</h1>
                <div class="col-lg-12">
                    <md-input-container>
                        <label>Sort by category</label>
                        <md-select ng-model="productCategory">
                            <md-option ng-repeat="productCategory in productCategories" value="@{{productCategory}}" ng-click="prodctByCat(productCategory);">@{{productCategory}}</md-option>
                        </md-select>
                    </md-input-container>
                </div>
                <div class="col-lg-12 thumb_listing">
                    <ul>
                        <li ng-repeat="prod in products | orderBy:predicate:reverse" ng-class="(defaultProductId == prod.id) ? 'selected' : ''" ng-if="hasCategory(prod)">
                            <a href="javascript:void(0);" ng-click="loadProduct(prod.name, prod.image, prod.id, prod.price, prod.currency);">
                                <img data-ng-src="@{{prod.image}}" alt=""></a>
                            <span class="product_cat">@{{prod.category}}</span>
                            <span class="product_title">@{{prod.name}}</span>
                            <span class="product_price">@{{prod.price}} @{{prod.currency}}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-pane clearfix" id="Graphics">

                <div class="graphic_options clearfix">
                    <ul>
                        <li class="col-lg-3 col-md-3 col-sm-6 col-xs-6 active">
                            <div>
                                <a class="" href="#clip_arts" aria-controls="clip_arts" role="tab" data-toggle="tab" ng-click="exitDrawing()">
                                    <i class="bi bi-image-alt"></i>
                                    <span>Artwork</span>
                                </a>
                            </div>
                        </li>
                        <li class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <div>
                                <a class="" href="#upload_own" aria-controls="upload_own" role="tab" data-toggle="tab" ng-click="exitDrawing()">
                                    <i class="bi bi-upload"></i>
                                    <span>Upload</span>
                                </a>
                            </div>
                        </li>
                        <li class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <div>
                                <a class="" href="#qr_code" aria-controls="qr_code" role="tab" data-toggle="tab" ng-click="exitDrawing()">
                                    <i class="bi bi-qr-code"></i>
                                    <span>Qr code</span>
                                </a>
                            </div>
                        </li>
                        <li class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <div>
                                <a class="" href="#hand_draw" aria-controls="hand_draw" role="tab" data-toggle="tab" ng-click="enterDrawing();">
                                    <i class="bi bi-easel"></i>
                                    <span>Hand draw</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="tab-content">

                    <div role="tabpanel" class="tab-pane fade in active" id="clip_arts">
                        <div class="graphic_types clearfix" ng-show="!graphic_icons">
                            <div ng-repeat="graphicsCategory in graphicsCategories" value="@{{graphicsCategory}}"  ng-click="loadByGraphicsCat(graphicsCategory)" ng-model="graphicsCategory" >
                                <div class="@{{graphicsCategory.split(' ').join('') | lowercase}}" ></div>
                                <span>
                                          @{{graphicsCategory}}
                                        </span>
                            </div>
                        </div>
                        <span ng-show="graphic_icons" class="back_to_graphic" ng-click="ShowGraphicIcons()">
                                    <i class="bi bi-arrow-90deg-down"></i> Back
                                </span>
                        <div class="graphic_icons" ng-show="graphic_icons">
                            <div class="cal-lg-12 filter_by_cat">
                                <md-input-container style="">
                                    <label>Sort by category</label>
                                    <md-select ng-model="graphicsCategory" ng-change="loadByGraphicsCategory();">
                                        <md-option ng-repeat="graphicsCategory in graphicsCategories" value="@{{graphicsCategory}}">@{{graphicsCategory}}</md-option>
                                    </md-select>
                                </md-input-container>
                            </div>
                            <div class="col-lg-12 thumb_listing scrollme" rebuild-on="rebuild:me" ng-scrollbar is-bar-shown="barShown" ng-class="fabric.selectedObject ? 'activeControls' : ''">
                                <ul>
                                    <li ng-repeat="graphic in graphics"><a href="javascript:void(0);" ng-click='addShape(graphic)'><img data-ng-src="@{{graphic}}" alt="" width="120px;"></a></li>
                                </ul>
                                <a ng-if="loadMore" class="loadMore" ng-click="graphics_load_more(graphicsPage)">Load More</a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="upload_own">
                        <div class="col-lg-12 thumb_listing">
                            <div class="well" >
                                <form name="myForm">
                                    <div class="fileUpload btn btn-primary">
                                        <span>Choose File</span>
                                        <input type="file" ngf-select="onFileSelect(picFile);" ng-model="picFile" name="file" accept="image/*" ngf-max-size="2MB" class="upload">
                                    </div>
                                    <input id="uploadFile" placeholdFile NameName disabled="disabled" />
                                    <span class="has-error" ng-show="myForm.file.$error.maxSize">File too large @{{picFile.size / 1000000|number:1}}MB: max 2M</span>
                                    <div class="clearfix"></div>
                                    <span class="has-error" ng-show="myForm.file.$error.maxWidth">File width too large : Max Width 300px</span>
                                    <div class="clearfix"></div>
                                    <span class="has-error" ng-show="myForm.file.$error.maxHeight">File height too large : Max Height 300px</span>
                                    <div class="clearfix"></div>
                                    <span class="has-error" ng-show="uploadErrorMsg">@{{uploadErrorMsg}}</span>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="qr_code">
                        <div class="col-lg-12 thumb_listing">
                            <div class="well" >
                                <div class="row form-group">
                                    <md-input-container flex>
                                        <label>Enter website link or text here</label>
                                        <textarea  columns="1" id="textarea-text-qr-code" ng-model="fabric.selectedObject.textQRCode"></textarea>
                                    </md-input-container>

                                    <div class="clearfix">
                                        <md-button class="md-raised md-cornered" ng-click="addQRCode(fabric.selectedObject.textQRCode);" aria-label="Add QR Code"><i class="bi bi-plus"></i>&nbsp;&nbsp;Add QR Code</md-button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="hand_draw">
                        <div class="col-lg-12 thumb_listing">
                            <div class="well" >
                                <div class="row form-group">
                                    <md-radio-group ng-model="drawing_mode_selector" ng-if="enter_drawing_mode == 'Cancel Drawing Mode'">
                                        <md-radio-button value="Pencil" class="md-primary" ng-click="changeDrawingMode('Pencil');">Pencil</md-radio-button>
                                        <md-radio-button value="Circle" class="md-primary" ng-click="changeDrawingMode('Circle');"> Circle </md-radio-button>
                                        <md-radio-button value="Spray" class="md-primary" ng-click="changeDrawingMode('Spray');">Spray</md-radio-button>
                                        <md-radio-button value="Pattern" class="md-primary" ng-click="changeDrawingMode('Pattern');">Pattern</md-radio-button>
                                        <md-radio-button value="hline" class="md-primary" ng-click="changeDrawingMode('hline');">H-line</md-radio-button>
                                        <md-radio-button value="vline" class="md-primary" ng-click="changeDrawingMode('vline');">V-line</md-radio-button>
                                        <md-radio-button value="square" class="md-primary" ng-click="changeDrawingMode('square');">Square</md-radio-button>
                                        <md-radio-button value="diamond" class="md-primary" ng-click="changeDrawingMode('diamond');">Diamond</md-radio-button>
                                    </md-radio-group>

                                </div>

                                <br /><br />
                                <div class="col-sm-12 input-group colorPicker2" ng-if="enter_drawing_mode == 'Cancel Drawing Mode'">
                                    <md-input-container flex>
                                        <label for="Line color">Line color:</label>
                                        <input type="text" value="" class="" colorpicker ng-model="drawing_color" ng-change="fillDrawing(drawing_color);"/>
                                    </md-input-container>
                                    <span class="input-group-addon" style="border: medium none #000000; background-color: @{{drawing_color}}"><i></i></span>
                                </div>

                                <br />
                                <div class="row form-group handtool">
                                    <md-input-container flex ng-if="enter_drawing_mode == 'Cancel Drawing Mode'">
                                        <label for="Line width">Line width:</label>
                                        <input class='col-sm-12' title="Line width" type='range' min="0" max="150" step=".01" ng-model="drawing_line_width" ng-change="changeDrawingWidth(drawing_line_width);"/>
                                    </md-input-container>
                                </div>
                                <div class="row form-group handtool">
                                    <md-input-container flex ng-if="enter_drawing_mode == 'Cancel Drawing Mode'">
                                        <label for="Line shadow">Line shadow:</label>
                                        <input class='col-sm-12' title="Line shadow" type='range' min="0" max="50" step=".01" ng-model="drawing_line_shadow" ng-change="changeDrawingShadow(drawing_line_shadow);"/>
                                    </md-input-container>
                                </div>
                                <div class="row form-group">
                                    <div class="clearfix">
                                        <center><md-button class="md-raised md-cornered" ng-click="enterDrawingMode();" aria-label="@{{enter_drawing_mode}}"><i class="bi bi-plus"></i>&nbsp;&nbsp;@{{enter_drawing_mode}}</md-button></center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane clearfix" id="Text">
                <div class="graphic_options clearfix">
                    <ul>
                        <li class="col-lg-6 col-md-6 col-sm-6 col-xs-6 active">
                            <div>
                                <a href="#text_design" aria-controls="text_design" role="tab" data-toggle="tab">
                                    <i class="bi bi-fonts"></i>
                                    <span>Text Design</span>
                                </a>
                            </div>
                        </li>
                        <li class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div>
                                <a href="#word_cloud" aria-controls="word_cloud" role="tab" data-toggle="tab">
                                    <i class="bi bi-cloud"></i>
                                    <span>Word Cloud</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">

                    <div role="tabpanel" class="tab-pane fade in active" id="text_design">

                        <div class="col-lg-12 thumb_listing">
                            <div class="well" >
                                <div class="row form-group">
                                    <md-input-container flex>
                                        <label>Enter text below</label>
                                        <textarea  columns="1" id="textarea-text" style="text-align: @{{ fabric.selectedObject.textAlign }}" ng-model="fabric.selectedObject.text"></textarea>
                                    </md-input-container>

                                    <div class="clearfix">
                                        <md-button class="md-raised md-cornered" ng-click="addText()" aria-label="Add Text"><i class="bi bi-plus"></i>&nbsp;&nbsp;Add Text</md-button>
                                    </div>
                                </div>

                            </div>
                            <div class="clearfix"></div>

                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="word_cloud">
                        <div class="col-lg-12 thumb_listing">
                            <div class="well" >
                                <div class="row form-group">
                                    <md-input-container flex>
                                        <label>Enter words below</label>
                                        <textarea  columns="1" id="textarea-text-word-cloud" style="text-align: @{{ fabric.selectedObject.textAlign }}" ng-model="fabric.selectedObject.textWordCloud"></textarea>
                                    </md-input-container>
                                    <div class="clearfix">
                                        <md-button class="md-raised md-cornered" ng-click="addWordCloud()" aria-label="Add Word Cloud"><i class="bi bi-plus"></i>&nbsp;&nbsp;Add Word Cloud</md-button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane clearfix" id="Layers">
                <h1>Layers</h1>
                <div class="col-lg-12 layer_listing scrollme" rebuild-on="rebuild:layer" ng-scrollbar is-bar-shown="barShown">

                    <ul class="ul_layer_canvas row">

                        <li ng-repeat="layer in objectLayers" class="ng-scope">
                            <span>@{{layer.id}}</span>
                            <img ng-src="@{{layer.src}}" alt=""/>

                            <div class="f-right inner">
                                <ul class="ulInner actions">
                                    <li class="liActions"><a href="javascript:void(0)" ng-click="deleteObject(layer.object);"><i class="bi bi-trash"></i></a></li>
                                    <li class="liActions"><a href="javascript:void(0)" ng-click="objectForwardSwap(layer.object);"><i class="bi bi-chevron-up"></i></a></li>
                                    <li class="liActions"><a href="javascript:void(0)" ng-click="objectBackwordSwap(layer.object);"><i class="bi bi-chevron-down"></i></a></li>
                                    <li class="liActions"><a href="javascript:void(0)" ng-click="lockLayerObject(layer.object);"><i class="bi bi-layers" ng-class="isObjectLocked(layer.object) ? 'fa-lock' : 'fa-unlock'"></i></a></li>
                                </ul>
                            </div>

                        </li>
                    </ul>

                </div>
            </div>

        </div>
    </div>
    <div class="col-lg-12" ng-class="fabric.selectedObject ? 'activeControlsElem' : ''" ng-if='fabric.selectedObject.type' ng-switch='fabric.selectedObject.type'>

        <div class="close-circle"><i class="bi bi-arrow-90deg-left" ng-click="deactivateAll();"><span>Back</span></i></div>

        <div class="well">

            <div class="row form-group" ng-show="fabric.selectedObject.type == 'text' || fabric.selectedObject.type == 'curvedText'">
                <md-input-container flex>
                    <label>Enter text below</label>
                    <textarea  columns="1" id="textarea-text" style="text-align: @{{ fabric.selectedObject.textAlign }}" ng-model="fabric.selectedObject.text"></textarea>
                </md-input-container>
            </div>

            <div class="row form-group" ng-show="fabric.selectedObject.type == 'text' || fabric.selectedObject.type == 'curvedText'" style="position: relative;margin-bottom: 50px;">
                <md-button class="md-raised md-cornered dropdown-toggle" data-toggle="dropdown" aria-label="Font Family"><span class='object-font-family-preview' style='font-family: "@{{ fabric.selectedObject.fontFamily }}";'> @{{ fabric.selectedObject.fontFamily }} </span> <span class="caret"></span></md-button>

                <ul class="dropdown-menu">
                    <li ng-repeat='font in FabricConstants.fonts' ng-click='toggleFont(font.name);' style='font-family: "@{{ font.name }}";'> <a>@{{ font.name }}</a> </li>
                </ul>
            </div>

            <div class="row row-margin">
                <div class="row col-lg-6" title="Font size" ng-show="fabric.selectedObject.type == 'text' || fabric.selectedObject.type == 'curvedText'">

                    <md-input-container flex>
                        <label><i class="bi bi-textarea-resize"></i> (Font size)</label>
                        <input type='number' class="" ng-model="fabric.selectedObject.fontSize" />
                    </md-input-container>

                </div>
                <div class="row col-lg-6" title="Line height" ng-show="fabric.selectedObject.type == 'text'">
                    <md-input-container flex>
                        <label><i class="bi bi-align-left"></i> (Line height)</label>
                        <input type='number' class="" ng-model="fabric.selectedObject.lineHeight" step=".1" />
                    </md-input-container>

                </div>
                <div class="row col-lg-6" title="Reverse" ng-show="fabric.selectedObject.type == 'curvedText'">
                    <md-checkbox ng-model="fabric.selectedObject.isReversed" aria-label="Reverse" ng-click="toggleReverse(fabric.selectedObject.isReversed);">Reverse </md-checkbox>
                </div>
            </div>
            <div class='row form-group' ng-show="fabric.selectedObject.type == 'text' || fabric.selectedObject.type == 'curvedText'">
                <div class="col-md-3">
                    <md-button class="md-raised md-cornered" ng-class="{ active: fabric.selectedObject.textAlign == 'left' }" ng-click="fabric.selectedObject.textAlign = 'left'" aria-label="Align Left"><i class='bi bi-align-start'></i></md-button>
                </div>
                <div class="col-md-3">
                    <md-button class="md-raised md-cornered" ng-class="{ active: fabric.selectedObject.textAlign == 'center' }" ng-click="fabric.selectedObject.textAlign = 'center'" aria-label="Align Center"><i class='bi bi-align-center'></i></md-button>
                </div>
                <div class="col-md-3">
                    <md-button class="md-raised md-cornered" ng-class="{ active: fabric.selectedObject.textAlign == 'right' }" ng-click="fabric.selectedObject.textAlign = 'right'" aria-label="Align Right"><i class='bi bi-align-end'></i></md-button>
                </div>
                <div class="col-md-3">
                    <md-button class="md-raised md-cornered" ng-class="{ active: fabric.isBold() }" ng-click="toggleBold()" aria-label="Bold"><i class='bi bi-type-bold'></i></md-button>
                </div>
                <div class="col-md-3">
                    <md-button class="md-raised md-cornered" ng-class="{ active: fabric.isItalic() }" ng-click="toggleItalic()" aria-label="Italic"><i class='bi bi-type-italic'></i></md-button>
                </div>
                <div class="col-md-3">
                    <md-button class="md-raised md-cornered" ng-class="{ active: fabric.isUnderline() }" ng-click="toggleUnderline()" aria-label="Underline"><i class='bi bi-type-underline'></i></md-button>
                </div>
                <div class="col-md-3">
                    <md-button class="md-raised md-cornered" ng-class="{ active: fabric.isLinethrough() }" ng-click="toggleLinethrough()" aria-label="Strike through"><i class='bi bi-type-strikethrough'></i></md-button>
                </div>
            </div>

            <div class='row form-group curved_text' ng-show="fabric.selectedObject.type == 'text' || fabric.selectedObject.type == 'curvedText'">
                <md-switch ng-model="fabric.selectedObject.isCurved" aria-label="Switch 1" ng-change="curveText();">Curved text </md-switch>
            </div>

            <div class="row form-group transparency" title="Radius" ng-show="fabric.selectedObject.type == 'curvedText'" style="margin-bottom: 0px;">
                <md-input-container flex>
                    <label for="Radius">Radius:</label>
                    <input class='col-sm-12' title="Radius" type='range' min="50" max="200" value="100" ng-model="fabric.selectedObject.radius" ng-change="radius(fabric.selectedObject.radius);"/>
                </md-input-container>
            </div>


            <div class="row form-group transparency" title="Spacing" ng-show="fabric.selectedObject.type == 'curvedText'" style="margin-bottom: 35px;">
                <md-input-container flex>
                    <label for="Spacing">Spacing:</label>
                    <input class='col-sm-12' title="Spacing" type='range' min="5" max="30" value="10" ng-model="fabric.selectedObject.spacing" ng-change="spacing(fabric.selectedObject.spacing);"/>
                </md-input-container>
            </div>

            <div class="row form-group input-group colorPicker2" ng-show="fabric.selectedObject.type != 'image' && fabric.selectedObject.type != 'path'">
                <md-input-container flex>
                    <label for="Color">Color:</label>
                    <input type="text" value="" class="" colorpicker ng-model="fabric.selectedObject.fill" ng-change="fillColor(fabric.selectedObject.fill);"/>
                </md-input-container>
                <span class="input-group-addon" style="border: medium none #000000; background-color: @{{fabric.selectedObject.fill}}"><i></i></span>
            </div>
            <div class="row form-group transparency" ng-show="fabric.selectedObject.type != 'curvedText'">
                <md-input-container flex>
                    <label for="Transparency">Transparency:</label>
                    <input class='col-sm-12' title="Transparency" type='range' min="0" max="1" step=".01" ng-model="fabric.selectedObject.opacity" ng-change="opacity(fabric.selectedObject.opacity);"/>
                </md-input-container>
            </div>

            <div class="col-sm-12 input-group cloud-options" ng-show="fabric.selectedObject.type == 'image'">
                <label class="custom-label">Filters:</label>
                <br>
                <md-checkbox ng-model="fabric.selectedObject.isGrayscale" aria-label="Grayscale" ng-click="setImageFilter(fabric.selectedObject.isGrayscale, 0);">Grayscale</md-checkbox>
                <md-checkbox ng-model="fabric.selectedObject.isSepia" aria-label="Sepia" ng-click="setImageFilter(fabric.selectedObject.isSepia, 1);">Sepia</md-checkbox>
                <md-checkbox ng-model="fabric.selectedObject.isInvert" aria-label="Invert" ng-click="setImageFilter(fabric.selectedObject.isInvert, 2);">Invert</md-checkbox>
                <md-checkbox ng-model="fabric.selectedObject.isEmboss" aria-label="Emboss" ng-click="setImageFilter(fabric.selectedObject.isEmboss, 3);">Emboss</md-checkbox>
                <md-checkbox ng-model="fabric.selectedObject.isSharpen" aria-label="Sharpen" ng-click="setImageFilter(fabric.selectedObject.isSharpen, 4);">Sharpen</md-checkbox>
            </div>

        </div>


    </div>

    <!---->


</div>
