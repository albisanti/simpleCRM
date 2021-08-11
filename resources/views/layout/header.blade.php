@section('header_section')
<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Your personal dashboard.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Dashboard</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{asset('css/dashlite.css?ver=2.6.0')}}">
    <link id="skin-default" rel="stylesheet" href="{{asset('css/theme.css?ver=2.6.0')}}">
</head>

<body class="nk-body npc-invest bg-lighter ">
<div class="nk-app-root">
    <!-- wrap @s -->
    <div class="nk-wrap ">
        <!-- main header @s -->
        <div class="nk-header nk-header-fluid nk-header-fixed is-theme">
            <div class="container-xl wide-lg">
                <div class="nk-header-wrap">
                    <div class="nk-menu-trigger mr-sm-2 d-lg-none">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav"><em class="icon ni ni-menu"></em></a>
                    </div>
                    <div class="nk-header-brand">
                        <a href="/" class="logo-link">
                            <!--<span class="nio-version">Dashboard</span>-->

                            <img class="logo-light logo-img" src="{{asset('images/logo.png')}}" alt="logo" style="filter: invert(1)">
                            <!--<img class="logo-dark logo-img" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                            <span class="nio-version">Invest</span>-->
                        </a>
                    </div><!-- .nk-header-brand -->
                    <div class="nk-header-menu" data-content="headerNav">
                        <div class="nk-header-mobile">
                            <div class="nk-header-brand">
                                <a href="/" class="logo-link">
                                    <span class="nio-version">Dashboard</span>
                                    <!--
                                    <img class="logo-light logo-img" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="logo">
                                    <img class="logo-dark logo-img" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                                    <span class="nio-version">Invest</span>-->
                                </a>
                            </div>
                            <div class="nk-menu-trigger mr-n2">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav"><em class="icon ni ni-arrow-left"></em></a>
                            </div>
                        </div>
                        <!-- Menu -->
                        <ul class="nk-menu nk-menu-main">
                            <li class="nk-menu-item">
                                <a href="/suppliers" class="nk-menu-link">
                                    <span class="nk-menu-text">Suppliers</span>
                                </a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="/customers" class="nk-menu-link">
                                    <span class="nk-menu-text">Customers</span>
                                </a>
                            </li>
                            @can('create')
                            <li class="nk-menu-item">
                                <a href="/add" class="nk-menu-link">
                                    <span class="nk-menu-text">Add <i class="icon ni ni-plus"></i> </span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div><!-- .nk-header-menu -->
                    <div class="nk-header-tools">
                        <ul class="nk-quick-nav">

                            <li class="hide-mb-sm"><a href="/logout" class="nk-quick-nav-icon"><em class="icon ni ni-signout"></em></a></li>
                            <li class="dropdown user-dropdown order-sm-first">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <div class="user-toggle">
                                        <div class="user-avatar sm" style="color: #333;">
                                            @php
                                                $exp = explode(' ',Auth::user()->name);
                                                $initials = array(
                                                    substr($exp[0],0,1),
                                                    !empty($exp[1]) ? substr($exp[1],0,1) : substr($exp[0],1,1)
                                                );
                                                echo $initials[0].$initials[1]
                                            @endphp
                                        </div>
                                        <div class="user-info d-none d-xl-block">
                                            <div class="user-name dropdown-indicator" style="color: #cecece">{{Auth::user()->name}}</div>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1 is-dark">
                                    <div class="dropdown-inner user-card-wrap d-none d-md-block" style="background: #555;">
                                        <div class="user-card">
                                            <div class="user-avatar" style="color: #333">
                                                <span style="color: #333">
                                                    @php
                                                    $exp = explode(' ',Auth::user()->name);
                                                    $initials = array(
                                                        substr($exp[0],0,1),
                                                        !empty($exp[1]) ? substr($exp[1],0,1) : substr($exp[0],1,1)
                                                    );
                                                    echo $initials[0].$initials[1]
                                                    @endphp
                                                </span>
                                            </div>
                                            <div class="user-info">
                                                <span class="lead-text" style="color: #fff;">{{Auth::user()->name}}</span>
                                                <span class="sub-text" style="color: #ccc;">{{Auth::user()->email}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown-inner">
                                        <ul class="link-list">
                                            <li><a href="/settings"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                                            @can('manage_users')
                                            <li><a href="/manage-account"><em class="icon ni ni-users"></em><span>Manage Accounts</span></a></li>
                                            @endcan
                                        </ul>
                                    </div>
                                    <div class="dropdown-inner">
                                        <ul class="link-list">
                                            <li><a href="/logout"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li><!-- .dropdown -->
                        </ul><!-- .nk-quick-nav -->
                    </div><!-- .nk-header-tools -->
                </div><!-- .nk-header-wrap -->
            </div><!-- .container-fliud -->
        </div>
        <!-- main header @e -->
@endsection
