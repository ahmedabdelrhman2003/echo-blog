<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="{{ url('assets/images/favicon.ico') }}">
    <link href="{{ url('assets/css/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/bootstrap-material.min.css') }}" rel="stylesheet" type="text/css"
        id="bs-default-stylesheet" />
    <link href="{{ url('assets/css/app-material.min.css') }}" rel="stylesheet" type="text/css"
        id="app-default-stylesheet" />
    <link href="{{ url('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .jvectormap-label {
            display: none;
        }
    </style>
    @yield('css')
</head>

<body>
    <div id="wrapper">
        <div class="navbar-custom">
            <div class="container-fluid">

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="fe-menu"></i>
                        </button>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="left-side-menu">
            <div class="h-100 menuitem-active" data-simplebar="init">
                <div class="simplebar-wrapper" style="margin: 0px;">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask">
                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                            <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden;">
                                <div class="simplebar-content" style="padding: 0px;">
                                    <div id="sidebar-menu">
                                        <ul id="side-menu">
                                            <li class="menu-title">Navigation</li>
                                            <li class="menuitem-active">
                                                <a href="#sidebarEcommerce" data-toggle="collapse">
                                                    <i class="mdi mdi-cart-outline"></i>
                                                    <span> Echo Blog </span>
                                                    <span class="menu-arrow"></span>
                                                </a>
                                                <div class="collapse show" id="sidebarEcommerce">
                                                    <ul class="nav-second-level">
                                                        <li class="">
                                                            <a href="{{ route('article.all') }}"
                                                                class="active">Articles</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('articles.pending') }}">Pending
                                                                Articles</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('category.index') }}">Category</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('manageAuthor.getAuthors') }}">Authors</a>
                                                        </li>

                                                        <li>
                                                            <a href="{{ route('auth.logout') }}">Logout</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="simplebar-placeholder" style="width: auto; height: 1366px;"></div>
                </div>
                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                    <div class="simplebar-scrollbar"
                        style="width: 0px; display: none; transform: translate3d(0px, 0px, 0px);"></div>
                </div>
                <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                    <div class="simplebar-scrollbar"
                        style="height: 0px; transform: translate3d(0px, 0px, 0px); display: none;"></div>
                </div>
            </div>
        </div>

        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <div class="rightbar-overlay"></div>
</body>
<script src="{{ url('assets/js/vendor.min.js') }}"></script>
<script src="{{ url('assets/js/jquery.sparkline.min.js') }}"></script>
<script src="{{ url('assets/js/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ url('assets/js/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ url('assets/js/dashboard-2.init.js') }}"></script>
<script src="{{ url('assets/js/app.min.js') }}"></script>
@yield('js')

</html>
