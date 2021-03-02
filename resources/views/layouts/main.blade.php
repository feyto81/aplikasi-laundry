
<!doctype html>
<html lang="en">
<head>
        
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" />
        <meta name="author" />
        @include('partials.css')
        @yield('css')
    </head>
    <body data-sidebar="dark">
        <div id="layout-wrapper">
            @include('partials.header')
            <div class="vertical-menu">
                <div data-simplebar class="h-100">
                    <div id="sidebar-menu">
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title" key="t-menu">Navigation</li>
                            <li>
                                <a href="{{route('admin.home')}}" class="waves-effect">
                                    <i class="bx bx-home-circle"></i>
                                    <span key="t-dashboards">Dashboard</span>
                                </a>
                            </li>
                            <li class="menu-title" key="t-menu">Administrator</li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-user"></i>
                                    <span key="t-crypto">Users Management</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="crypto-wallet.html" key="t-wallet">Add New User</a></li>
                                    <li><a href="{{route('admin.cms_users.index')}}" key="t-buy">List User</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="main-content">
                @yield('content')
                @include('partials.footer')
            </div>
        </div>
        <div class="rightbar-overlay"></div>
        @include('partials.script')
    </body>
    @stack('script')
</html>
