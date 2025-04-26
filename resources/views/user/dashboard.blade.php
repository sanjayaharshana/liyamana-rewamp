@extends('landing.common.app')

@section('title', 'Liyamana Online Platform - Dashboard')

@section('content')
<div class="dashboard-container">
    <div class="row">
        <!-- Sidebar remains unchanged -->
        <div class="col-md-3">
            <div class="sidebar" data-background-color="white">
                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a href="{{ url('/dashboard') }}" class="simple-text">
                            My Panel
                        </a>
                    </div>

                    <ul class="nav" id="dashboardNav">
                        <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                            <a href="{{ url('/dashboard') }}">
                                <i class="bi bi-grid-1x2"></i>
                                <p>Overview</p>
                            </a>
                        </li>
                        <!-- Corporate Mode Navigation Items -->
                        <div id="corporateNavItems" style="display: none;">
                            <li class="{{ Request::is('dashboard/printed-documents') ? 'active' : '' }}">
                                <a href="{{ url('/dashboard/printed-documents') }}">
                                    <i class="bi bi-printer"></i>
                                    <p>Printed Documents</p>
                                </a>
                            </li>
                            <li class="{{ Request::is('dashboard/leaflet') ? 'active' : '' }}">
                                <a href="{{ url('/dashboard/leaflet') }}">
                                    <i class="bi bi-file-earmark-richtext"></i>
                                    <p>Leaflet</p>
                                </a>
                            </li>
                            <li class="{{ Request::is('dashboard/marketing') ? 'active' : '' }}">
                                <a href="{{ url('/dashboard/marketing') }}">
                                    <i class="bi bi-megaphone"></i>
                                    <p>Marketing Tool</p>
                                </a>
                            </li>
                            <li class="{{ Request::is('dashboard/invitation-tool') ? 'active' : '' }}">
                                <a href="{{ url('/dashboard/invitation-tool') }}">
                                    <i class="bi bi-envelope-paper"></i>
                                    <p>Invitation Tool</p>
                                </a>
                            </li>
                            <li class="{{ Request::is('dashboard/designs') ? 'active' : '' }}">
                                <a href="{{ url('/dashboard/designs') }}">
                                    <i class="bi bi-palette"></i>
                                    <p>Your Designs</p>
                                </a>
                            </li>
                        </div>
                        <!-- Regular Navigation Items -->
                        <li class="{{ Request::is('dashboard/payment-history') ? 'active' : '' }}">
                            <a href="{{ url('/dashboard/payment-history') }}">
                                <i class="bi bi-credit-card"></i>
                                <p>Payment History</p>
                            </a>
                        </li>
                        <li class="{{ Request::is('dashboard/schedule') ? 'active' : '' }}">
                            <a href="{{ url('/dashboard/schedule') }}">
                                <i class="bi bi-calendar-check"></i>
                                <p>Schedule (10)</p>
                            </a>
                        </li>
                        <li class="{{ Request::is('dashboard/address-book') ? 'active' : '' }}">
                            <a href="{{ url('/dashboard/address-book') }}">
                                <i class="bi bi-journal-text"></i>
                                <p>Address Book (0)</p>
                            </a>
                        </li>
                        <li class="{{ Request::is('dashboard/sent') ? 'active' : '' }}">
                            <a href="{{ url('/dashboard/sent') }}">
                                <i class="bi bi-send"></i>
                                <p>Sent (03)</p>
                            </a>
                        </li>
                        <li class="{{ Request::is('dashboard/draft') ? 'active' : '' }}">
                            <a href="{{ url('/dashboard/draft') }}">
                                <i class="bi bi-file-earmark-text"></i>
                                <p>Draft (03)</p>
                            </a>
                        </li>
                        <li class="{{ Request::is('dashboard/favorites') ? 'active' : '' }}">
                            <a href="{{ url('/dashboard/favorites') }}">
                                <i class="bi bi-star"></i>
                                <p>My Favorites (03)</p>
                            </a>
                        </li>
                        <li class="{{ Request::is('dashboard/logout') ? 'active' : '' }}">
                            <form method="POST" action="{{ route('landing.logout') }}" id="logout-form">
                                @csrf
                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <p>Logout</p>
                                </a>
                            </form>
                        </li>

                    </ul>


                </div>
            </div>
        </div>

        <!-- Updated Content Area -->
        <div class="col-md-9">
            <div class="dashboard-header">
                <h2 class="welcome-heading">
                    Welcome &nbsp;
                    <span class="user-name">{{ ucwords(auth()->user()->name) }}</span>
                    <span class="greeting-emoji"> &nbsp;👋</span>
                </h2>
                    <div class="corporate-mode-toggle">
                        <label class="switch">
                            <input type="checkbox" id="corporateMode">
                            <span class="slider round"></span>
                        </label>
                        <span class="toggle-label">Corporate Mode</span>
                    </div>
                </div>

                <div class="quick-actions">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <a href="{{ url('/dashboard/new-letter') }}" class="action-card">
                                <i class="bi bi-envelope-plus"></i>
                                <h3>Send New Letter</h3>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ url('/dashboard/invitation') }}" class="action-card">
                                <i class="bi bi-envelope-paper"></i>
                                <h3>Invitation</h3>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ url('/dashboard/schedule') }}" class="action-card">
                                <i class="bi bi-calendar-check"></i>
                                <h3>Schedule Mail</h3>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ url('/dashboard/settings') }}" class="action-card">
                                <i class="bi bi-gear"></i>
                                <h3>Settings</h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
        /* Dashboard Styles */
    .dashboard-container {
        padding: 20px;
        margin-top: 60px;
    }

    .sidebar {
        background: #ffffff;
        border-radius: 8px;
        height: 100%;
        min-height: calc(100vh - 100px);
        position: sticky;
        top: 100px;
        margin-left: 80px;
        margin-bottom: 30px;
        transition: all 0.3s ease-in-out;
    }

    .sidebar .logo {
        padding: 15px 20px;
        border-bottom: 1px solid #eee;
    }

    .sidebar .logo a {
        color: #333;
        font-size: 20px;
        text-decoration: none;
        font-weight: 600;
    }

    .sidebar .nav {
        padding: 0;
        list-style: none;
    }

    .sidebar .nav li {
        margin: 2px 0;
    }

    .sidebar .nav li a {
        padding: 7px 20px;
        display: flex;
        align-items: center;
        color: #555;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .sidebar .nav li a i {
        margin-right: 10px;
        font-size: 18px;
    }

    .sidebar .nav li.active a,
    .sidebar .nav li a:hover {
        background: #f8f9fa;
        color: #8b262f;
    }

    .content-wrapper {
        background: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        min-height: calc(100vh - 100px);
        height: 100%;
        transition: all 0.3s ease-in-out;
        position: relative;
    }
    .nav {
        display: flex;
        flex-direction: column;
        gap: 8px;
        padding: 20px 0;
    }

    .nav li {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .nav li a {
        display: flex;
        align-items: center;
        padding: 12px 24px;
        color: #555;
        text-decoration: none;
        transition: all 0.3s ease;
        border-radius: 6px;
        margin: 0 12px;
    }

    .nav li a i {
        font-size: 20px;
        width: 24px;
        margin-right: 12px;
        text-align: center;
    }

    .nav li a p {
        margin: 0;
        font-size: 14px;
        font-weight: 500;
        line-height: 1.4;
    }

    .nav li.active a {
        background: #f8f9fa;
        color: #8b262f;
        font-weight: 600;
    }

    .nav li:not(.active) a:hover {
        background: rgba(248, 249, 250, 0.7);
        transform: translateX(5px);
    }

    /* Ensure consistent spacing */
    .sidebar-wrapper {
        height: auto;
        display: flex;
        flex-direction: column;
        padding: 15px 0;
    }
    .content-wrapper.corporate-active {
        min-height: calc(100vh - 50px);
        height: 100%;
    }
    .logo {
        margin-bottom: 20px;
        padding: 0 24px;
    }
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .sidebar {
            height: auto;
            margin-bottom: 20px;
        }

        .content-wrapper {
            min-height: auto;
        }
    }
    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .corporate-mode-toggle {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        transition: .4s;
    }

    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    input:checked + .slider {
        background-color: #8b262f;
    }

    input:checked + .slider:before {
        transform: translateX(26px);
    }

    .toggle-label {
        font-weight: 500;
        color: #333;
    }

    .quick-actions {
        margin-top: 20px;
    }

    .action-card {
        display: flex;
        align-items: center;
        padding: 20px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        text-decoration: none;
        color: #333;
        gap: 15px;
    }

    .action-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    }

    .action-card i {
        font-size: 24px;
        color: #8b262f;
    }

    .action-card h3 {
        margin: 0;
        font-size: 18px;
        font-weight: 500;
    }
    /* Add to your existing styles */
    #corporateNavItems {
        transition: opacity 0.3s ease-in-out;
        overflow: hidden;
    }
    #corporateNavItems.show {
        height: auto;
        opacity: 1;
        margin: 10px 0;
    }
    .fade-in {
        animation: fadeIn 0.3s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    #corporateNavItems li {
        opacity: 1;
        transform: translateY(0);
        transition: all 0.3s ease-in-out;
    }

    #corporateNavItems.fade-in li {
        animation: slideIn 0.3s ease-in-out forwards;
    }

    /* Optional: Add separator for corporate section */
    #corporateNavItems::before {
        content: '';
        display: block;
        height: 1px;
        background: rgba(0,0,0,0.1);
        margin: 10px 0;
    }

    /* Large devices (desktops, less than 1200px) */
    @media (max-width: 1199.98px) {
        .sidebar {
            margin-left: 40px;
        }

        .action-card h3 {
            font-size: 16px;
        }
    }

    /* Medium devices (tablets, less than 992px) */
    @media (max-width: 991.98px) {
        .dashboard-container {
            padding: 15px;
        }

        .sidebar {
            margin-left: 20px;
        }

        .content-wrapper {
            padding: 15px;
        }

        .dashboard-header h2 {
            font-size: 24px;
        }
    }

    /* Small devices (landscape phones, less than 768px) */
    @media (max-width: 767.98px) {
        .dashboard-container {
            margin-top: 40px;
        }

        .sidebar {
            margin-left: 0;
            margin-bottom: 20px;
            position: static;
            min-height: auto;
        }

        .col-md-3, .col-md-9 {
            padding: 0 10px;
        }

        .dashboard-header {
            flex-direction: column;
            gap: 15px;
            align-items: flex-start;
        }

        .action-card {
            padding: 15px;
        }
    }

    /* Extra small devices (phones, less than 576px) */
    @media (max-width: 575.98px) {
        .dashboard-container {
            padding: 10px;
            margin-top: 30px;
        }

        .nav li a {
            padding: 10px 15px;
            margin: 0 8px;
        }

        .quick-actions .col-md-6 {
            padding: 0 8px;
        }

        .action-card {
            margin-bottom: 15px;
        }

        .dashboard-header h2 {
            font-size: 20px;
        }

        .toggle-label {
            font-size: 14px;
        }
    }

    /* Handle height on smaller devices */
    @media (max-height: 700px) {
        .sidebar {
            position: static;
            min-height: auto;
        }

        .content-wrapper {
            min-height: auto;
        }
    }
    .welcome-heading {
        font-size: 1.8rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        flex-wrap: wrap;
    }

    .user-name {
        color: #8b262f;
        font-weight: 700;
        position: relative;
        padding-bottom: 2px;
    }

    .greeting-emoji {
        font-size: 1.5rem;
        animation: wave 2s infinite;
        transform-origin: 70% 70%;
        display: inline-block;
    }

    .last-login {
        font-size: 0.9rem;
        color: #666;
        margin-left: auto;
    }

    @keyframes wave {
        0% { transform: rotate(0deg); }
        10% { transform: rotate(14deg); }
        20% { transform: rotate(-8deg); }
        30% { transform: rotate(14deg); }
        40% { transform: rotate(-4deg); }
        50% { transform: rotate(10deg); }
        60% { transform: rotate(0deg); }
        100% { transform: rotate(0deg); }
    }

</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const corporateToggle = document.getElementById('corporateMode');
        const corporateNavItems = document.getElementById('corporateNavItems');

        // Set initial state
        corporateNavItems.style.display = 'none';

        corporateToggle.addEventListener('change', function() {
            if (this.checked) {
                // Show corporate items
                corporateNavItems.style.display = 'block';
                corporateNavItems.style.opacity = '0';

                // Trigger reflow for animation
                void corporateNavItems.offsetWidth;

                // Add animation
                corporateNavItems.style.opacity = '1';
                corporateNavItems.style.height = 'auto';

                // Add fade-in class for smooth transition
                corporateNavItems.classList.add('fade-in');
            } else {
                // Hide corporate items
                corporateNavItems.style.opacity = '0';
                corporateNavItems.classList.remove('fade-in');

                // Wait for animation to complete before hiding
                setTimeout(() => {
                    corporateNavItems.style.display = 'none';
                }, 300);
            }
        });
    });
</script>

@endsection
