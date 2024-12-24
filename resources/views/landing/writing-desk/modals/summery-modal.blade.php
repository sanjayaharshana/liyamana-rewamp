<div class="modal fade" id="finalizemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="">
        <div class="modal-content" style="">
            <div style="padding: 30px;background: radial-gradient(#c90909, #620202);color: white;">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true" style="
    background: #570707;
">Envelope</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false" style="
    color: white;
" tabindex="-1">Attachment</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false" tabindex="-1" style="
    color: white;
">Note</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div style="">
                            <div class="row">
                                <div class="col-md-6">
                                    <div style="background: #3e0303;padding: 30px;border-radius: 10px 170px 12px 20px;">
                                        <h3 style="color: white">Sender's Details</h3>
                                        <div style="font-size: 11px;margin-bottom: -4px;padding: 10px;">Enter your information as the sender of the letter. These details will appear on the envelope and be used to identify you in case of delivery issues. Make sure all fields are accurate</div>
                                        <div class="row" style="color: white;padding: 10px;">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input type="text" class="form-control" value="{{$order_details->order_details['first_name'] ?? auth()->user()->name}}" style="background: #6b0000;border-style: none;color: white;" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" class="form-control" value="{{$order_details->order_details['last_name']}}" style="background: #6b0000;border-style: none;color: white;" required>
                                                </div>
                                            </div>
                                            <div style="font-size: 11px;padding-top: 10px;margin-bottom: 0px;">Your full name as it should appear on the envelope</div>

                                        </div>
                                        <div class="row" style="padding: 10px;">
                                            <div class="col-md-12">
                                                <div class="form-group" style="margin-top: 0px;">
                                                    <label>Address</label>
                                                    <textarea type="text" class="form-control" style="background: #6b0000;border-style: none;color: white;" rows="3" required>{{$order_details->address['from_address'] ?? null}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="padding: 10px;">
                                            <div class="col-md-6">
                                                <div class="form-group" style="margin-top: 10px">
                                                    <label>Country</label>
                                                    <select class="form-select" style="background: #6b0000;border-style: none;" required>
                                                        <option value="Sri Lanka">Sri Lanka</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group" style="margin-top: 10px">
                                                    <label>City</label>
                                                    <input type="text" class="form-control" style="background: #6b0000;border-style: none;" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 style="color: white">Receipt's Details</h3>
                                    <div style="font-size: 11px;margin-bottom: -4px;padding: 10px;">Provide the information for the recipient of the letter. These details are crucial for successful delivery. Double-check for accuracy to avoid any issues during the process.</div>
                                    <div class="row" style="color: white;padding: 10px;">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" style="background: #6b0000;border-style: none;color: white;" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" style="background: #6b0000;border-style: none;color: white;" required>
                                            </div>
                                        </div>
                                        <div style="font-size: 11px;padding-top: 10px;margin-bottom: 0px;">Your full name as it should appear on the envelope</div>

                                    </div>
                                    <div class="row" style="padding: 10px;">
                                        <div class="col-md-12">
                                            <div class="form-group" style="margin-top: 0px;">
                                                <label>Address</label>
                                                <textarea type="text" class="form-control" style="background: #6b0000;border-style: none;color: white;" rows="3" required>{{$order_details->address['to_address'] ?? null}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="padding: 10px;">
                                        <div class="col-md-6">
                                            <div class="form-group" style="margin-top: 10px">
                                                <label>Country</label>
                                                <select class="form-select" style="background: #6b0000;border-style: none;" required>
                                                    <option value="Sri Lanka">Sri Lanka</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" style="margin-top: 10px">
                                                <label>City</label>
                                                <input type="text" class="form-control" style="background: #6b0000;border-style: none;" required>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
                </div>
                <button type="submit" class="btn btn-primary pull-right" style="background: #a90303;border-style: none;background: #a71d1d;color: white;border-color: white;margin-bottom: 7px;display: block;margin-left: auto;margin-right: 0;"> Save and Checkout</button>
            </div>
        </div>
    </div>
</div>
