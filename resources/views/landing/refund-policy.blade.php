@extends('landing.common.app')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background" style="background: url('{{url('landing_pages/banding/banner_theme.png')}}');background-position: right;background-size: contain;background-repeat: no-repeat;background-color: #55060e;">
        <div class="container">
            <h1 style="color: white;">Refund Policy</h1>
            <small style="color: white;">refund policy</small>
        </div>
    </section>
    <!-- /Hero Section -->

    <!-- Content -->
     <section class="section light-background">
     <div class="container">
        <p>At Liyamana, we are committed to providing the best service experience to our users. This Refund Policy outlines the terms and conditions under which refunds are processed. By using our services, you agree to this policy.</p>

        <h2>1. Eligibility for Refunds</h2>
        <p>Refunds may be granted under the following circumstances:</p>
        <ul>
            <li><strong>Non-Delivery of Service:</strong> If your letter or correspondence is not delivered due to an error on our part.</li>
            <li><strong>Service Disruption:</strong> If there is a significant failure in delivering the promised service quality.</li>
            <li><strong>Duplicate Payments:</strong> If multiple payments are mistakenly processed for the same service.</li>
        </ul>

        <h2>2. Non-Refundable Conditions</h2>
        <p>Refunds will not be provided in the following cases:</p>
        <ul>
            <li><strong>Change of Mind:</strong> Refunds are not granted for personal decisions to cancel after the service has been initiated or completed.</li>
            <li><strong>User Error:</strong> Incorrect delivery details or user-provided inaccuracies that result in failed service delivery.</li>
            <li><strong>Delayed Delivery:</strong> Delays caused by factors beyond our control, such as courier issues, holidays, or natural disasters.</li>
        </ul>

        <h2>3. Refund Request Process</h2>
        <p>If you believe you are eligible for a refund, follow these steps:</p>
        <ol>
            <li>Contact our support team at <a href="mailto:support@liyamana.com">support@liyamana.com</a> within 7 days of the issue occurring.</li>
            <li>Provide your order details, including the order ID, date of purchase, and a clear description of the issue.</li>
            <li>Our team will review your request and respond within 3-5 business days.</li>
        </ol>

        <h2>4. Refund Approval and Processing</h2>
        <p>Once your refund request is approved:</p>
        <ul>
            <li>We will notify you via email of the approval and the amount to be refunded.</li>
            <li>The refund will be processed to the original payment method used during the purchase.</li>
            <li>It may take 5-10 business days for the refund to reflect in your account, depending on your payment provider.</li>
        </ul>

        <h2>5. Cancellation Policy</h2>
        <p>Orders can be canceled under the following conditions:</p>
        <ul>
            <li>The request is made before the service has been initiated (e.g., before the letter is dispatched).</li>
            <li>Cancellation requests can be sent to <a href="mailto:support@liyamana.com">support@liyamana.com</a> with your order details.</li>
        </ul>
        <p>If the cancellation is successful, a full refund will be processed.</p>

        <h2>6. Exceptional Cases</h2>
        <p>For unique or unforeseen situations, refunds may be considered on a case-by-case basis at Liyamana’s sole discretion. Please contact our support team for further assistance.</p>

        <h2>7. Changes to this Refund Policy</h2>
        <p>We reserve the right to modify this Refund Policy at any time. Any changes will be posted on this page, and continued use of our platform constitutes acceptance of the updated policy.</p>

        <h2>8. Contact Information</h2>
        <p>If you have any questions or concerns regarding this Refund Policy, please contact us:</p>
        <p>Email: <a href="mailto:support@liyamana.com">support@liyamana.com</a></p>
        <p>Phone: +94761306338</p>
        <p>Address: Wellawaya, Sri Lanka</p>
    </div>
     </section>
     <!-- /Content -->
@endsection

@section('footer')
@endsection
