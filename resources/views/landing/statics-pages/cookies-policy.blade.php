@extends('landing.common.app')

@section('title', 'Cookie Policy | Liyamana - Secure & Transparent Letter Marketplace')

@section('meta_description', 'Read Liyamana Cookies Policy to learn how we handle your data securely and transparently. Protecting your privacy is our priority')
@section('meta_keywords', 'Liyamana Cookies Policy, data privacy, secure platform, privacy practices, user data protection, letter marketplace privacy, transparent policies')



@section('content')

    @include('landing.common.page-heading-hero', ['hero_title' => 'Cookie Policy', 'hero_sub_title' => 'We protecting your privacy'])


    <div class="container">
        <div class="row">
            <div class="col-md-4">

                @include('landing.statics-pages.sections.quick_links')

            </div>
            <div class="col-md-8">
                <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                    <div class="card-body">
                        <div class="container">
                            <h5>1. What Are Cookies?</h5>
                            <p>Cookies are small data files stored on your device by websites you visit. They are widely used to make websites work efficiently and provide a better browsing experience.</p>

                            <h5>2. Types of Cookies We Use</h5>
                            <p>We use the following types of cookies:</p>
                            <ul>
                                <li><strong>Essential Cookies:</strong> Necessary for the website to function properly.</li>
                                <li><strong>Performance Cookies:</strong> Help us analyze website usage and improve its performance.</li>
                                <li><strong>Functional Cookies:</strong> Enable website personalization and enhanced functionality.</li>
                                <li><strong>Targeting Cookies:</strong> Deliver tailored advertisements based on your interests.</li>
                            </ul>

                            <h5>3. Why We Use Cookies</h5>
                            <p>We use cookies to:</p>
                            <ul>
                                <li>Ensure the website functions as intended.</li>
                                <li>Analyze user interactions to improve services.</li>
                                <li>Remember your preferences and settings.</li>
                                <li>Provide personalized content and ads.</li>
                            </ul>

                            <h5>4. Managing Cookies</h5>
                            <p>You can control your cookie preferences through your browser settings. However, disabling cookies may affect website functionality. Visit these links for browser-specific instructions:</p>
                            <ul>
                                <li><a href="https://support.google.com/chrome/answer/95647" target="_blank">Google Chrome</a></li>
                                <li><a href="https://support.mozilla.org/en-US/kb/enable-and-disable-cookies-website-preferences" target="_blank">Mozilla Firefox</a></li>
                                <li><a href="https://support.apple.com/guide/safari/manage-cookies-and-website-data-sfri11471/mac" target="_blank">Safari</a></li>
                                <li><a href="https://support.microsoft.com/en-us/microsoft-edge/delete-cookies-in-microsoft-edge-63947406-40ac-c3b8-57b9-2a946a29ae09" target="_blank">Microsoft Edge</a></li>
                            </ul>

                            <h5>5. Third-Party Cookies</h5>
                            <p>We may use third-party cookies to enhance your experience, such as:</p>
                            <ul>
                                <li>Google Analytics</li>
                                <li>Facebook Pixel</li>
                                <li>Other marketing or analytics platforms</li>
                            </ul>

                            <h5>6. Changes to This Cookies Policy</h5>
                            <p>We may update this policy periodically. Please check this page for the latest version. The effective date will be noted at the top of the policy.</p>

                            <h5>7. Contact Us</h5>
                            <p>If you have any questions about our Cookies Policy, contact us at:</p>
                            <p>Email: <a href="mailto:support@liyamana.com">support@liyamana.com</a></p>
                            <p>Phone: +94761306338</p>
                            <p>Address: Wellawaya, Sri Lanka</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- Content -->
    <!-- /Content -->
@endsection

@section('footer')
@endsection
