<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg" style="width: fit-content;max-width: fit-content;">
        <div class="modal-content">
            <div class="modal-body" style="background: #670000;">
                <div class="row">
                    <div class="col-md-6">
                        <div style="text-align: center;padding: 10px;background: #670000;color: white;padding-bottom: 60px;border-radius: 20px;padding-left: 40px;padding-right: 50px;">
                            <div style="text-align: center;margin-top: 50px;margin-bottom: 50px;">
                                <h2 style="color: white;">Do you have existing Liyamana Account?</h2>
                            </div>
                            <p style="text-align: left;">Hmmm... What is your Email Address?</p>
                            <input type="text" class="form-control" style="background-color: #450404;border-style: unset;color: white;">
                            <p style="text-align: left;padding-top: 20px;"> And your Password &gt;</p>
                            <input type="text" class="form-control" style="background-color: #450404;border-style: unset;color: #ffffff;">
                            <a href="http://localhost:8000/password/forget">Forget Password? </a> <br>
                            <button class="btn btn-primary" style="background: #500101;border-style: none;margin-top: 20px;">Login as Liyamana Account</button>

                        </div>
                    </div>
                    <div class="col-md-6" style="background: #490202;">
                        <div style="color: white;padding: 30px;">
                            <h2 style="color: white;margin-bottom: 30px;">Send as a guest account</h2>
                            <form action="{{url('create-order/clock_base')}}" method="post">
                                {{csrf_field()}}

                                <div class="row">
                                    <didv class="col-md-6">
                                        <label style="padding-bottom: 10px;">First Name</label>
                                        <input type="text" name="first_name" value="" class="form-control" style="margin-bottom: 20px;background: #670000;border-style: unset;border-radius: 10px;color: white;">
                                    </didv>
                                    <didv class="col-md-6">
                                        <label style="padding-bottom: 10px;">Last Name</label>
                                        <input type="text" name="last_name" value="" class="form-control" style="margin-bottom: 20px;background: #670000;border-style: unset;border-radius: 10px;color: white;">
                                    </didv>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label style="padding-bottom: 10px;">What is your Email Address</label>
                                        <input type="text" name="email" class="form-control" style="margin-bottom: 20px;background: #670000;border-style: unset;border-radius: 10px;color: white;">
                                    </div>
                                    <div class="col-md-6">
                                        <label style="padding-bottom: 10px;">Phone Number</label>
                                        <input type="tel" name="phone" class="form-control" style="margin-bottom: 20px;background: #670000;border-style: unset;border-radius: 10px;color: white;">
                                    </div>
                                </div>

                                <div style="background: #650303;border-radius: 10px;margin-top: 10px">
                                    <div class="form-check form-switch" style="padding-left: 50px;padding-top: 20px;padding-bottom: 20px;font-size: 13px;margin-bottom: -10px;">
                                        <input class="form-check-input" name="register_account" type="checkbox" id="flexSwitchCheckDefault" checked="">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Do you want to create liyamana account?</label> <br>
                                        <small>Why this people make details apis</small>
                                    </div>
                                    <div id="password_section" style="padding-left: 10px;padding-right: 10px;background: #970202;padding-top: 10px;padding-bottom: 1px;font-size: 14px; margin-bottom: 20px;border-radius: 0px 60px 10px 10px;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label style="padding-bottom: 10px;">Password</label>
                                                <input type="password" name="password" id="password" class="form-control" style="margin-bottom:10px;background: #670000;border-style: unset;border-radius: 10px;color: white;">
                                            </div>
                                            <div class="col-md-6">
                                                <label style="padding-bottom: 10px;">Confirmation Password</label>
                                                <input type="password" name="password_confirmation" class="form-control" style="margin-bottom:10px;background: #670000;border-style: unset;border-radius: 10px;color: white;">
                                            </div>
                                            <div id="password-strength" style="display: none; margin-top: 5px;font-size: 14px;color: #f50000;background: #ec3131;padding-top: 6px;padding-bottom: 6px;border-radius: 0px 0px 10px 10px;background: #eaeaea;font-weight: 700;"></div>
                                        </div>
                                    </div>
                                </div>


                                <div style="margin-top: 30px">
                                    <button type="submit" class="btn btn-primary" style="background: #830505;border-style: none;">Create with this design</button>
                                    <a href="#" class="btn btn-secondary" data-bs-dismiss="modal" style="background: #830505;border-style: none;">Close</a>
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
    document.addEventListener("DOMContentLoaded", function () {
        // Automatically show the modal on page load
        const myModal = new bootstrap.Modal(document.getElementById('myModal'));
        myModal.show();

        // Add blur effect when the modal is shown
        const modalElement = document.getElementById('myModal');
        modalElement.addEventListener('show.bs.modal', function () {
            document.body.classList.add('modal-open');
        });

        // Remove blur effect when the modal is hidden
        modalElement.addEventListener('hidden.bs.modal', function () {
            document.body.classList.remove('modal-open');
        });
    });
</script>

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

@push('footer-js')
    <script>
        const flexSwitchCheckDefault = document.getElementById('flexSwitchCheckDefault');
        flexSwitchCheckDefault.addEventListener('change',function () {
            if (flexSwitchCheckDefault.checked){
                document.getElementById('password_section').style.display = 'block';
            }else{
                document.getElementById('password_section').style.display = 'none';
            }
        })
    </script>
@endpush
