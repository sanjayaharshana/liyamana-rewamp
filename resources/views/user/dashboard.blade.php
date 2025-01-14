@extends('landing.common.app')

@section('title', 'Liyamana Online Platform - World leading online platform for custom letters')

@section('meta_description', 'Liyamana - A unique platform to send heartfelt letters to friends, loved ones, and connect with pen pals worldwide. Personalize your communication and revive the magic of handwritten messages.')
@section('meta_keywords', 'Liyamana, send letters online, heartfelt letters, pen pals, personalized communication, write letters, commercial letters, connect with friends')

@section('content')

    <link href="{{url('css/paper-dashboard.css')}}" rel="stylesheet"/>

    <link href="{{url('css/main.css')}}" rel="stylesheet" />


    <div class="container">
        <div class="sidebar" data-background-color="white" data-active-color="danger">

            <!--
                Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
                Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
            -->

            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="https://www.creative-tim.com" class="simple-text">
                        Creative Tim
                    </a>
                </div>

                <ul class="nav">
                    <li class="active">
                        <a href="dashboard.html">
                            <i class="ti-panel"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="user.html">
                            <i class="ti-user"></i>
                            <p>User Profile</p>
                        </a>
                    </li>
                    <li>
                        <a href="table.html">
                            <i class="ti-view-list-alt"></i>
                            <p>Table List</p>
                        </a>
                    </li>
                    <li>
                        <a href="typography.html">
                            <i class="ti-text"></i>
                            <p>Typography</p>
                        </a>
                    </li>
                    <li>
                        <a href="icons.html">
                            <i class="ti-pencil-alt2"></i>
                            <p>Icons</p>
                        </a>
                    </li>
                    <li>
                        <a href="maps.html">
                            <i class="ti-map"></i>
                            <p>Maps</p>
                        </a>
                    </li>
                    <li>
                        <a href="notifications.html">
                            <i class="ti-bell"></i>
                            <p>Notifications</p>
                        </a>
                    </li>
                    <li class="active-pro">
                        <a href="upgrade.html">
                            <i class="ti-export"></i>
                            <p>Upgrade to PRO</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </div>

@endsection
