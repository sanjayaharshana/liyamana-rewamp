@extends('landing.common.app')

@section('title', 'Terms and Conditions | Liyamana - Online Letter Sending Platform')
@section('meta_description', 'Read the terms and conditions for using Liyamana, an online letter-sending platform. Learn about your rights, responsibilities, and the scope of our services.')
@section('meta_keywords', 'Liyamana Terms and Conditions, online letter service, user agreement, service policies')


@section('content')
    @include('landing.common.page-heading-hero', ['hero_title' => 'Terms and Conditions', 'hero_sub_title' => 'Terms and Conditions'])



    <div class="container">
        <div class="row">
            <div class="col-md-4">
                @include('landing.statics-pages.sections.quick_links')
            </div>
            <div class="col-md-8">
                    <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <div class="container">
                                <h5 id="introduction">1. Introduction</h5>
                                <p>Welcome to Liyamana, an online platform that facilitates sending physical letters via post. By using our services, you agree to comply with and be bound by these Terms and Conditions. Please read them carefully before accessing or using our platform.</p>

                                <h5 id="acceptance">2. Acceptance of Terms</h5>
                                <p>By registering, accessing, or using Liyamana, you accept these Terms and Conditions in full. If you disagree with any part of these terms, you must not use our services.</p>

                                <h5 id="scope-of-services">3. Scope of Services</h5>
                                <p>Liyamana provides a platform to create, manage, and send letters via postal services. While we ensure secure processing and timely dispatch, delivery times may vary based on the postal service provider. We are not responsible for delays or losses caused by third-party postal providers.</p>

                                <h5 id="user-responsibilities">4. User Responsibilities</h5>
                                <p>By using Liyamana, you agree to:</p>
                                <ul>
                                    <li>Provide accurate and complete information, including recipient addresses.</li>
                                    <li>Ensure that the content of your letters complies with applicable laws and does not contain any prohibited material, such as hate speech, fraudulent content, or offensive language.</li>
                                    <li>Maintain the confidentiality of your account credentials.</li>
                                </ul>

                                <h5 id="payments-and-fees">5. Payments and Fees</h5>
                                <p>All payments for services must be made in advance. Prices are displayed clearly on the platform and may vary based on the type of service selected. Users are responsible for ensuring sufficient funds in their account to cover service costs.</p>

                                <h5 id="cancellations">6. Cancellations and Refunds</h5>
                                <p>Cancellation requests can only be made before the letter is dispatched. Refunds will be processed according to our <a href="/refund-policy">Refund Policy</a>.</p>

                                <h5 id="limitations">7. Limitations of Liability</h5>
                                <p>While we take all reasonable measures to ensure the accuracy and security of our services, Liyamana shall not be held liable for:</p>
                                <ul>
                                    <li>Delays caused by third-party postal services.</li>
                                    <li>Loss or damage of letters after they have been dispatched.</li>
                                    <li>Incorrect delivery due to user-provided errors.</li>
                                </ul>
                                <p>Our liability is limited to the cost of the service provided.</p>

                                <h5 id="privacy">8. Privacy</h5>
                                <p>We value your privacy and handle your data in accordance with our <a href="/privacy-policy">Privacy Policy</a>. By using our platform, you consent to the collection and processing of your personal data as outlined in our privacy terms.</p>

                                <h5 id="modifications">9. Modifications to Terms</h5>
                                <p>Liyamana reserves the right to modify these Terms and Conditions at any time. Changes will be effective upon posting on this page. Continued use of the platform after changes signifies acceptance of the updated terms.</p>

                                <h5 id="contact-us">10. Contact Us</h5>
                                <p>If you have any questions or concerns about these Terms and Conditions, please contact us:</p>
                                <p>Email: <a href="mailto:support@liyamana.com">support@liyamana.com</a></p>
                                <p>Phone: +94761306338</p>
                                <p>Address: Wellawaya, Sri Lanka</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
@endsection
