<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body" style="background: #670000;">
                <div class="row">
                    <div class="col-md-6">
                        <div style="text-align: center;padding: 10px;background: #670000;color: white;padding-bottom: 60px;border-radius: 20px;padding-left: 40px;padding-right: 50px;">
                            @auth()
                                <div style="background:url('{{url('landing_pages/banding/liyamana_logo.png')}}');height: 100px;background-position: center;background-repeat: no-repeat;background-size: contain;filter: invert(1);margin-top: 10px;"></div>
                                <div style="text-align: left">
                                    <h2 style="padding-top: 20px;color: white">About Liyamana</h2>
                                    <p><strong>Liyamana</strong> is an innovative online platform designed to simplify letter creation and delivery. Whether for personal, professional, or business purposes, Liyamana offers:</p>
                                    <ul>
                                        <li><strong>Customizable Templates:</strong> Choose from a wide range of pre-designed letter formats.</li>
                                        <li><strong>Effortless Delivery:</strong> Send letters via email or printed courier services.</li>
                                        <li><strong>User-Friendly Interface:</strong> Easy-to-use tools for composing, editing, and tracking your letters.</li>
                                        <li><strong>Secure Transactions:</strong> Ensure safe and reliable delivery with transparent processes.</li>
                                    </ul>
                                    <p>Liyamana is your one-stop solution for modernizing traditional correspondence, blending convenience with professional quality.</p>

                                </div>

                            @else
                                <div style="text-align: center;margin-top: 50px;margin-bottom: 50px;">
                                    <h2 style="color: white;">Do you have existing Liyamana Account?</h2>
                                </div>
                                <p style="text-align: left;">Hmmm... What is your Email Address?</p>
                                <input type="text" class="form-control" style="background-color: #450404;border-style: unset;color: white;">
                                <p style="text-align: left;padding-top: 20px;"> And your Password &gt;</p>
                                <input type="text" class="form-control" style="background-color: #450404;border-style: unset;color: #ffffff;">
                                <a href="{{url('password/forget')}}">Forget Password? </a> <br>
                                <button class="btn btn-primary" style="background: #500101;border-style: none;margin-top: 20px;">Login as Liyamana Account</button>
                            @endauth

                        </div>
                    </div>
                    <div class="col-md-6" style="background: #490202;">
                        <div style="color: white;padding: 30px;">
                            <h2 style="color: white;margin-bottom: 30px;">Send as a guest account</h2>
                            <form action="{{route('landing.create-order',$template->slug)}}" method="post">
                                {{csrf_field()}}




                                @auth()


                                @else
                                    <div class="row">
                                        <didv class="col-md-6">
                                            <label style="padding-bottom: 10px;">First Name</label>
                                            <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control" style="margin-bottom: 20px;background: #670000;border-style: unset;border-radius: 10px;color: white;">
                                        </didv>
                                        <didv class="col-md-6">
                                            <label style="padding-bottom: 10px;">Last Name</label>
                                            <input type="text" name="last_name" value="{{old('last_name')}}" class="form-control" style="margin-bottom: 20px;background: #670000;border-style: unset;border-radius: 10px;color: white;">
                                        </didv>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label style="padding-bottom: 10px;">What is your Email Address</label>
                                            <input type="text" name="email" class="form-control" {{ old('email')}} style="margin-bottom: 20px;background: #670000;border-style: unset;border-radius: 10px;color: white;">
                                        </div>
                                        <div class="col-md-6">
                                            <label style="padding-bottom: 10px;">Phone Number</label>
                                            <input type="tel" name="phone" class="form-control" {{old('phone')}} style="margin-bottom: 20px;background: #670000;border-style: unset;border-radius: 10px;color: white;">
                                        </div>
                                    </div>

                                    <div style="background: #650303;border-radius: 10px;margin-top: 10px">
                                        <div class="form-check form-switch" style="padding-left: 50px;padding-top: 20px;padding-bottom: 20px;font-size: 13px;margin-bottom: -10px;">
                                            <input class="form-check-input" name="register_account" type="checkbox" id="flexSwitchCheckDefault" checked>
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Do you want to create liyamana account?</label> <br>
                                            <small>Why this people make details apis</small>
                                        </div>
                                        <div id="password_section" style="padding-left: 10px;padding-right: 10px;background: #970202;padding-top: 10px;padding-bottom: 1px;font-size: 14px; margin-bottom: 20px;border-radius: 0px 60px 10px 10px;">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label style="padding-bottom: 10px;">Password</label>
                                                    <input
                                                        type="password"
                                                        name="password"
                                                        id="password"
                                                        class="form-control"
                                                        style="margin-bottom:10px;background: #670000;border-style: unset;border-radius: 10px;color: white;">
                                                </div>
                                                <div class="col-md-6">
                                                    <label style="padding-bottom: 10px;">Confirmation Password</label>
                                                    <input
                                                        type="password"
                                                        name="password_confirmation"
                                                        class="form-control"
                                                        style="margin-bottom:10px;background: #670000;border-style: unset;border-radius: 10px;color: white;">
                                                </div>
                                                <div id="password-strength" style="display: none; margin-top: 5px;font-size: 14px;color: #f50000;background: #ec3131;padding-top: 6px;padding-bottom: 6px;border-radius: 0px 0px 10px 10px;background: #eaeaea;font-weight: 700;"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endauth()


                                @auth()

                                    <input type="hidden" class="form-control"name="from_adress" rows="2" style="margin-bottom: 10px; background: #670000;border-style: unset;border-radius: 10px;color: white;" spellcheck="false">{{old('from_adress')}}</input>
                                    <input type="hidden" class="form-control" name="to_adress" rows="2" style="margin-bottom: 10px; background: #670000;border-style: unset;border-radius: 10px;color: white;" spellcheck="false"></input>
                                @elseauth()
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div style="margin-top: 20px">
                                                <label style=";">From Address</label>
                                                <textarea class="form-control" name="from_adress" rows="2" style="margin-bottom: 10px; background: #670000;border-style: unset;border-radius: 10px;color: white;" spellcheck="false">{{old('to_adress')}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div style="margin-top: 20px">
                                                <label style=";">To Address</label>
                                                <textarea class="form-control" name="to_adress" rows="2" style="margin-bottom: 10px; background: #670000;border-style: unset;border-radius: 10px;color: white;" spellcheck="false"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                @endauth
                                <div style="margin-top: 30px">
                                    <button type="submit" class="btn btn-primary" style="background: #830505;border-style: none;">Create with this design</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background: #830505;border-style: none;">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
        const passwordInput = document.getElementById('password');
        const strengthIndicator = document.getElementById('password-strength');



        passwordInput.addEventListener('input', function () {
        const password = passwordInput.value;
        let strength = getPasswordStrength(password);

        // Update the UI based on strength
        strengthIndicator.textContent = strength.message;
        strengthIndicator.style.color = strength.color;
    });

        function getPasswordStrength(password) {
            let score = 0;
            strengthIndicator.style.display = 'block';

            // Criteria for strength
            if (password.length >= 8) score++;
            if (/[A-Z]/.test(password)) score++;
            if (/[a-z]/.test(password)) score++;
            if (/[0-9]/.test(password)) score++;
            if (/[\W_]/.test(password)) score++; // Special characters

            // Determine the message and color
            if (score <= 1) {
            return { message: 'Very Weak', color: 'red' };
        } else if (score === 2) {
            return { message: 'Weak', color: 'orange' };
        } else if (score === 3) {
            return { message: 'Medium', color: 'yellow' };
        } else if (score === 4) {
            return { message: 'Strong', color: 'green' };
        } else {
            return { message: 'Very Strong', color: 'darkgreen' };
        }
    }
</script>


