<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 canvas_section pull-right">
    <div class="row">
        <div class="canvas_image image-builder ng-isolate-scope">

            <div class='fabric-container'>
                <div class="canvas-container-outer">
                    <canvas fabric='fabric'></canvas>
                </div>
                <div class="btn-group-vertical btn-group-one">
                    <div class="icon-vertical m-b-sm pull-right">
                        <ul>
                            <li class="saveObject">
                                <span class="fa fa-save"></span>

                                <ul class="ulChildMenu">
                                    <li class="childLi">
                                        <a ng-click="saveObjectAsSvg()" href="javascript:void(0)" class="ng-scope">Save as SVG</a>
                                    </li>
                                    <li class="childLi">
                                        <a ng-click="saveObjectAsPng()" href="javascript:void(0)" class="ng-scope">Save as PNG</a>
                                    </li>
                                    <li class="childLi">
                                        <a ng-click="saveObjectAsJpg()" href="javascript:void(0)" class="ng-scope">Save as JPG</a>
                                    </li>
                                    <li class="childLi">
                                        <a ng-click="downloadObjectAsPdf()" href="javascript:void(0)"class="ng-scope">Download as PDF</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a ng-click="printObject()" href="javascript:void(0)" class="ng-scope"><span class="fa fa-print"></span></a>
                                <md-tooltip md-visible="print.showTooltip" md-direction="left">Print</md-tooltip>
                            </li>

                            <li>
                                <a ng-click="downloadObject()" href="javascript:void(0)" class="ng-scope"><span class="fa fa-cloud-download"></span></a>
                                <md-tooltip md-visible="download.showTooltip" md-direction="left">Download as PNG</md-tooltip>
                            </li>

                            <li class="">
                                <a class="fa fa-search-plus ng-scope ng-isolate-scope" translate="" ng-click="zoomObject('zoomin')" href="javascript:void(0)"><span class="ng-binding ng-scope"></span></a>
                                <md-tooltip md-visible="zoomin.showTooltip" md-direction="left">Select object and Zoom In</md-tooltip>
                            </li>
                            <li>
                                <a class="fa fa-search-minus ng-scope ng-isolate-scope" translate="" ng-click="zoomObject('zoomout')" href="javascript:void(0)"><span class="ng-binding ng-scope"></span></a>
                                <md-tooltip md-visible="zoomout.showTooltip" md-direction="left">Select object and  Zoom Out</md-tooltip>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <a class="fa fa-undo ng-scope ng-isolate-scope" translate="" ng-click="undo()" href="javascript:void(0)"><span class="ng-binding ng-scope"></span></a>
                                <md-tooltip md-visible="undo.showTooltip" md-direction="left">Undo</md-tooltip>
                            </li>
                            <li>
                                <a class="fa fa-repeat ng-scope ng-isolate-scope" translate="" ng-click="redo()" href="javascript:void(0)"><span class="ng-binding ng-scope"></span></a>
                                <md-tooltip md-visible="redo.showTooltip" md-direction="left">Redo</md-tooltip>
                            </li>
                        </ul>
                    </div>
                    <div class="social-share">
                        <a href="javascript:void(0);" id="f_share_button" class="bi bi-facebook" ng-click="shareOnFacebook($event);"></a> <a href="javascript:void(0)" class="bi bi-twitter" ng-click="shareOnTwitter($event);"></a>
                    </div>
                </div>

                <div class="btn-group-vertical btn-group-two">
                    <div class="icon-vertical m-b-sm pull-right" style="float: left ! important;">
                        <ul>
                            <li>
                                <a ng-click="layers()" href="javascript:void(0)" data-toggle="tab" class="bi bi-layers"></a>
                                <md-tooltip md-visible="layer.showTooltip" md-direction="right">Layers</md-tooltip>
                            </li>
                            <li>
                                <a ng-click="copyItem()" href="javascript:void(0)" class="bi bi-copy"></a>
                                <md-tooltip md-visible="copy.showTooltip" md-direction="right">Copy</md-tooltip>
                            </li>
                            <li>
                                <a ng-click="fabricload()" href="javascript:void(0)" class="bi bi-box"></a>
                                <md-tooltip md-visible="fabricload.showTooltip" md-direction="right">Load</md-tooltip>
                            </li>
                            <li>
                                <a ng-click="pasteItem()" href="javascript:void(0)" class="bi bi-clipboard"></a>
                                <md-tooltip md-visible="paste.showTooltip" md-direction="right">Paste</md-tooltip>
                            </li>
                            <li>
                                <a ng-click="forwardSwap()" href="javascript:void(0)" class="bi bi-arrow-left"></a>
                                <md-tooltip md-visible="forward.showTooltip" md-direction="right">Forward Swap</md-tooltip>
                            </li>
                            <li>
                                <a ng-click="backwordSwap()"  href="javascript:void(0)" class="bi bi-arrow-right"></a>
                                <md-tooltip md-visible="backward.showTooltip" md-direction="right">Backward Swap</md-tooltip>
                            </li>
                            <li>
                                <a ng-click="horizontalAlign()" href="javascript:void(0)" class="bi bi-arrows"></a>
                                <md-tooltip md-visible="horizontal.showTooltip" md-direction="right">Horizontal Align</md-tooltip>
                            </li>
                            <li>
                                <a ng-click="verticalAlign()" href="javascript:void(0)"  class="bi bi-arrows-vertical"></a>
                                <md-tooltip md-visible="vertical.showTooltip" md-direction="right">Vertical Align</md-tooltip>
                            </li>
                            <li>
                                <a ng-click="{ active: flipObject() }" href="javascript:void(0)" class="bi bi-phone-flip"></a>
                                <md-tooltip md-visible="flip.showTooltip" md-direction="right">Flip</md-tooltip>
                            </li>
                        </ul>
                        <ul class="but_dist">
                            <li>
                                <a ng-click="lockObject()" ng-class="isLocked() ? 'fa fa-lock' : 'bi bi-lock'" href="#"></a>
                                <md-tooltip md-visible="lock.showTooltip" md-direction="right">Lock Layer</md-tooltip>
                            </li>
                            <li>
                                <a ng-click="removeSelectedObject()" href="javascript:void(0)" class="bi bi-eraser"></a>
                                <md-tooltip md-visible="remove.showTooltip" md-direction="right">Remove Layer</md-tooltip>
                            </li>
                            <li>
                                <a ng-click="clearAll()" href="javascript:void(0)" class="bi bi-trash"></a>
                                <md-tooltip md-visible="clear.showTooltip" md-direction="right">Empty Canvas</md-tooltip>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>

        </div>
        <div class="canvas_sub_image">
            <ul>
                <li ng-repeat="prodImg in productImages">
                    <img ng-click='loadProduct(defaultProductTitle, prodImg, defaultProductId, defaultPrice, defaultCurrency, $index)' data-ng-src="@{{prodImg}}" alt="" width="120px;">
                </li>
            </ul>
        </div>
        <div class="canvas_details clearfix">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <span class="product_name">@{{defaultProductTitle}}</span>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 clearfix">
                <span class="pull-left">Qty:</span>
                <div class="m-prod_detail_attr">
                    <div class="pull-left m-prod_counter">
                        <span ng-click="increments()"><i class="bi bi-plus"></i></span>
                        <span ng-click="decrement()"><i class="bi bi-dash"></i></span>
                        <input type="text" value="@{{counter}}" id="m-prod_count" name="quantity" required>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-6 clearfix pricing">
                <span class="price_title">Price</span>
                <span class="price_amnt">@{{defaultPrice}} @{{defaultCurrency}}</span>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <a class="cart_icon" href="javascript:void(0)" ng-click="addToCart()">
                    <i class="bi bi-envelope"></i>
                    Send Post
                </a>
            </div>
        </div>
    </div>
</div>
