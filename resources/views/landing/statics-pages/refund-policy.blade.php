@extends('landing.common.app')

@section('title', 'Refund Policy | Liyamana - Secure & Transparent Letter Marketplace')

@section('meta_description', 'Understand Liyamana\'s refund policy for online letter sending services. Learn the terms and conditions under which refunds are processed.')
@section('meta_keywords', 'Liyamana Refund Policy, letter refund, cancellation, online letter service, refund terms, transparent platform')

@section('content')

    @include('landing.common.page-heading-hero', ['hero_title' => 'Refund Policy', 'hero_sub_title' => 'Refund Policy'])

    <div class="container">
        <div class="row">
            <div class="col-md-4">
               @include('landing.statics-pages.sections.quick_links')
            </div>
            <div class="col-md-8">
                <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                    <div class="card-body">
                        <div class="container">
                            <h5 id="overview">1. Overview</h5>
                            <p>At Liyamana, we strive to provide the best service for sending letters online via post. However, we understand that unforeseen circumstances may arise where refunds may be necessary. This Refund Policy outlines the conditions under which refunds are applicable, ensuring transparency and fairness for all users.</p>

                            <h5 id="eligibility-for-refund">2. Eligibility for Refund</h5>
                            <p>Refunds may be requested under the following conditions:</p>
                            <ul>
                                <li>The letter was not successfully delivered due to an error on our part (e.g., incorrect address processing).</li>
                                <li>A duplicate payment was made for the same letter.</li>
                                <li>The letter was canceled before it was dispatched for postal delivery.</li>
                                <li>Technical issues on our platform prevented the successful sending of your letter.</li>
                            </ul>
                            <p>To request a refund, users must provide the transaction ID, letter reference number, and details of the issue within 7 days of the payment date.</p>

                            <h5 id="non-refundable-cases">3. Non-Refundable Cases</h5>
                            <p>Refunds will not be provided in the following scenarios:</p>
                            <ul>
                                <li>The letter was successfully dispatched via post but delayed due to postal service issues.</li>
                                <li>Errors caused by incorrect or incomplete address details provided by the user.</li>
                                <li>The cancellation request was made after the letter was dispatched.</li>
                                <li>Promotional or discounted orders unless otherwise stated.</li>
                                <li>Any failure resulting from force majeure events, including natural disasters, strikes, or other uncontrollable circumstances.</li>
                            </ul>

                            <h5 id="refund-process">4. Refund Process</h5>
                            <p>To request a refund, follow these steps:</p>
                            <ul>
                                <li>Contact us at <a href="mailto:refunds@liyamana.com">refunds@liyamana.com</a> with your transaction details and a description of the issue.</li>
                                <li>Our team will review your request within 3-5 business days.</li>
                                <li>If approved, the refund will be processed to your original payment method within 7-10 business days.</li>
                                <li>You will receive an email confirmation once the refund has been processed.</li>
                            </ul>

                            <h5 id="contact-us">5. Contact Us</h5>
                            <p>If you have any questions or concerns about our Refund Policy, feel free to reach out to us:</p>
                            <p>Email: <a href="mailto:support@liyamana.com">support@liyamana.com</a></p>
                            <p>Phone: +94761306338</p>
                            <p>Address: Wellawaya, Sri Lanka</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
@endsection
