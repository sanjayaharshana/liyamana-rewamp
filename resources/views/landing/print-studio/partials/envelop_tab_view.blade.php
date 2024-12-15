<div style="padding-top: 30px;" class="tab-pane fade " id="envolop_page" role="tabpanel" aria-labelledby="envolop-tab">
    <div class="row">
        <div class="col-md-6">
            <div class="" style="padding-bottom: 20px;">
                <div style="background: #575757; color: white; padding: 10px; font-size: 14px;">
                    Address Details
                </div>

                <div style="background: #818181; color: white; padding: 18px;">
                    <div class="form-group">
                        <label for="billing_address" style="font-size: 12px;">From Address:</label>
                       <textarea style="font-size:15px;background: #696969; color: white; margin-top: 5px;" name="from_address" class="form-control"  rows="5" required>{{$order_details->address['from_address']}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="billing_address" style="font-size: 12px;">To Address:</label>
                        <textarea style="font-size:15px;background: #696969; color: white; margin-top: 5px;" name="to_address" class="form-control"  rows="5" required>{{$order_details->address['to_address']}}</textarea>
                    </div>



                    {{csrf_field()}}
                    <button type="submit" class="btn btn-primary btn-sm" style="margin-top: 10px;">Save and Checkout</button>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="" style="padding-bottom: 20px;">
                <div style="background: #575757; color: white; padding: 10px; font-size: 14px;">
                    Customer Details
                </div>

                <div style="background: #818181; color: white; padding: 18px;">
                    <div class="form-group">
                        <label for="billing_address" style="font-size: 12px;">First Name:</label>
                        <input type="text" style="font-size:15px;background: #696969; color: white; margin-top: 5px;" name="first_name" class="form-control"  value="{{$order_details->order_details['first_name']}}" required></input>
                    </div>

                    <div class="form-group">
                        <label for="billing_address" style="font-size: 12px;">Last Name:</label>
                        <input type="text" style="font-size:15px;background: #696969; color: white; margin-top: 5px;" name="last_name" value="{{$order_details->order_details['last_name']}}" class="form-control"  required></input>
                    </div>
                    <div class="form-group">
                        <label for="billing_address" style="font-size: 12px;">Email:</label>
                        <input type="text" style="font-size:15px;background: #696969; color: white; margin-top: 5px;" name="email" class="form-control" value="{{$order_details->order_details['email']}}"  required></input>
                    </div>

                    <div class="form-group">
                        <label for="billing_address" style="font-size: 12px;">Phone number:</label>
                        <input type="text" style="font-size:15px;background: #696969; color: white; margin-top: 5px;" name="to_address" value="{{$order_details->order_details['phone_number']}}" class="form-control" required></input>
                    </div>



                </div>
            </div>

        </div>
    </div>
</div>
