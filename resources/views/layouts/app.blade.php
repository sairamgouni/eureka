<!DOCTYPE html>
<html lang="en">
<head>

    <title>{{isset($title) ? $title : 'Home'}}</title>

    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Main Font -->
    <script src="{{asset('assets/js/webfontloader.min.js')}}"></script>
    <script>
        WebFont.load({
            google: {
                families: ['Roboto:300,400,500,700:latin']
            }
        });
    </script>

    <!-- Bootstrap CSS -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/Bootstrap/dist/css/bootstrap-reboot.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/Bootstrap/dist/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/Bootstrap/dist/css/bootstrap-grid.css')}}">

    <!-- Main Styles CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fonts.min.css')}}">

    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

        <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body class="body-bg-white">


<!-- Preloader -->

<div id="hellopreloader">
    <div class="preloader">
        <svg width="45" height="45" stroke="#fff">
            <g fill="none" fill-rule="evenodd" stroke-width="2" transform="translate(1 1)">
                <circle cx="22" cy="22" r="6" stroke="none">
                    <animate attributeName="r" begin="1.5s" calcMode="linear" dur="3s" repeatCount="indefinite" values="6;22"/>
                    <animate attributeName="stroke-opacity" begin="1.5s" calcMode="linear" dur="3s" repeatCount="indefinite" values="1;0"/>
                    <animate attributeName="stroke-width" begin="1.5s" calcMode="linear" dur="3s" repeatCount="indefinite" values="2;0"/>
                </circle>
                <circle cx="22" cy="22" r="6" stroke="none">
                    <animate attributeName="r" begin="3s" calcMode="linear" dur="3s" repeatCount="indefinite" values="6;22"/>
                    <animate attributeName="stroke-opacity" begin="3s" calcMode="linear" dur="3s" repeatCount="indefinite" values="1;0"/>
                    <animate attributeName="stroke-width" begin="3s" calcMode="linear" dur="3s" repeatCount="indefinite" values="2;0"/>
                </circle>
                <circle cx="22" cy="22" r="8">
                    <animate attributeName="r" begin="0s" calcMode="linear" dur="1.5s" repeatCount="indefinite" values="6;1;2;3;4;5;6"/>
                </circle>
            </g>
        </svg>

        <div class="text">Loading ...</div>
    </div>
</div>

<!-- ... end Preloader -->

<!-- Fixed Sidebar Left -->

{{-- @include('layouts.admin.partials.sidebar') --}}

<!-- ... end Fixed Sidebar Left -->


 


<!-- Stunning header -->

<div class="stunning-header bg-primary-opacity">

    
    <!-- Header Standard Landing  -->
    
    <div class="header--standard header--standard-landing" id="header--standard">
        <div class="container">
            <div class="header--standard-wrap">
    
                <a href="#" class="logo">
                    <div class="img-wrap">
                        <img src="{{ asset('assets/img/eureka/eureka-logo-horizontal.png')}}" alt="Eureka">
                    </div>
                </a>
    
                <a href="#" class="open-responsive-menu js-open-responsive-menu">
                    <svg class="olymp-menu-icon">
                        <use xlink:href="{{ asset('assets/svg-icons/sprites/icons.svg')}}#olymp-menu-icon"></use></svg>
                </a>
    
                <div class="nav nav-pills nav1 header-menu">
                    <div class="mCustomScrollbar">
                        <ul>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false" tabindex='1'>Profile</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Profile Page</a>
                                    <a class="dropdown-item" href="#">Newsfeed</a>
                                    <a class="dropdown-item" href="#">Post Versions</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown dropdown-has-megamenu">
                                <a href="#" class="nav-link dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false" tabindex='1'>Forums</a>
                                <div class="dropdown-menu megamenu">
                                    <div class="row">
                                        <div class="col col-sm-3">
                                            <h6 class="column-tittle">Main Links</h6>
                                            <a class="dropdown-item" href="#">Profile Page<span class="tag-label bg-blue-light">new</span></a>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                        </div>
                                        <div class="col col-sm-3">
                                            <h6 class="column-tittle">BuddyPress</h6>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                            <a class="dropdown-item" href="#">Profile Page<span class="tag-label bg-primary">HOT!</span></a>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                        </div>
                                        <div class="col col-sm-3">
                                            <h6 class="column-tittle">Corporate</h6>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                        </div>
                                        <div class="col col-sm-3">
                                            <h6 class="column-tittle">Forums</h6>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Terms & Conditions</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Events</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Privacy Policy</a>
                            </li>
                            <li class="close-responsive-menu js-close-responsive-menu">
                                <svg class="olymp-close-icon"><use xlink:href="{{ asset('assets/svg-icons/sprites/icons.svg')}}#olymp-close-icon"></use></svg>
                            </li>
                            <li class="nav-item js-expanded-menu">
                                <a href="#" class="nav-link">
                                    <svg class="olymp-menu-icon"><use xlink:href="{{ asset('assets/svg-icons/sprites/icons.svg')}}#olymp-menu-icon"></use></svg>
                                    <svg class="olymp-close-icon"><use xlink:href="{{ asset('assets/svg-icons/sprites/icons.svg')}}#olymp-close-icon"></use></svg>
                                </a>
                            </li>
                            <li class="shoping-cart more">
                                <a href="#" class="nav-link">
                                    <svg class="olymp-shopping-bag-icon"><use xlink:href="{{ asset('assets/svg-icons/sprites/icons.svg')}}#olymp-shopping-bag-icon"></use></svg>
                                    <span class="count-product">2</span>
                                </a>
                                <div class="more-dropdown shop-popup-cart">
                                    <ul>
                                        <li class="cart-product-item">
                                            <div class="product-thumb">
                                                <img src="{{ asset('assets/img/product1.png')}}" alt="product">
                                            </div>
                                            <div class="product-content">
                                                <h6 class="title">White Enamel Mug</h6>
                                                <ul class="rait-stars">
                                                    <li>
                                                        <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                    </li>
    
                                                    <li>
                                                        <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-star star-icon" aria-hidden="true"></i>
                                                    </li>
                                                </ul>
                                                <div class="counter">x2</div>
                                            </div>
                                            <div class="product-price">$20</div>
                                            <div class="more">
                                                <svg class="olymp-little-delete"><use xlink:href="{{ asset('assets/svg-icons/sprites/icons.svg')}}#olymp-little-delete"></use></svg>
                                            </div>
                                        </li>
                                        <li class="cart-product-item">
                                            <div class="product-thumb">
                                                <img src="{{ asset('assets/img/product2.png')}}" alt="product">
                                            </div>
                                            <div class="product-content">
                                                <h6 class="title">Olympus Orange Shirt</h6>
                                                <ul class="rait-stars">
                                                    <li>
                                                        <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                    </li>
    
                                                    <li>
                                                        <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-star star-icon" aria-hidden="true"></i>
                                                    </li>
                                                </ul>
                                                <div class="counter">x1</div>
                                            </div>
                                            <div class="product-price">$40</div>
                                            <div class="more">
                                                <svg class="olymp-little-delete"><use xlink:href="{{ asset('assets/svg-icons/sprites/icons.svg')}}#olymp-little-delete"></use></svg>
                                            </div>
                                        </li>
                                    </ul>
    
                                    <div class="cart-subtotal">Cart Subtotal:<span>$80</span></div>
    
                                    <div class="cart-btn-wrap">
                                        <a href="#" class="btn btn-primary btn-sm">Go to Your Cart</a>
                                        <a href="#" class="btn btn-purple btn-sm">Go to Checkout</a>
                                    </div>
                                </div>
                            </li>
    
                            <li class="menu-search-item">
                                <a href="#" class="nav-link" data-toggle="modal" data-target="#main-popup-search">
                                    <svg class="olymp-magnifying-glass-icon"><use xlink:href="{{ asset('assets/svg-icons/sprites/icons.svg')}}#olymp-magnifying-glass-icon"></use></svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- ... end Header Standard Landing  -->
    <div class="header-spacer--standard"></div>

    <div class="stunning-header-content">
        <h1 class="stunning-header-title">Euraka</h1>

{{--         <ul class="breadcrumbs">
            <li class="breadcrumbs-item">
                <a href="#">Home</a>
                <span class="icon breadcrumbs-custom">/</span>
            </li>
            <li class="breadcrumbs-item active">
                <span>Blog Grid</span>
            </li>
        </ul> --}}
    </div>

    <div class="content-bg-wrap stunning-header-bg1"></div>
</div>

<!-- ... end Stunning header -->


<div class="container">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ui-block responsive-flex1200">
                <div class="ui-block-title">
                    <ul class="filter-icons">
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets/img/icon-chat2.png')}}" alt="icon">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets/img/icon-chat15.png')}}" alt="icon">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets/img/icon-chat9.png')}}" alt="icon">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets/img/icon-chat4.png')}}" alt="icon">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets/img/icon-chat6.png')}}" alt="icon">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets/img/icon-chat26.png')}}" alt="icon">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets/img/icon-chat27.png')}}" alt="icon">
                            </a>
                        </li>
                    </ul>
                    <div class="w-select">
                        <div class="title">Filter By:</div>
                        <fieldset class="form-group">
                            <select class="selectpicker form-control">
                                <option value="NU">All Categories</option>
                                <option value="NU">Favourite</option>
                                <option value="NU">Likes</option>
                            </select>
                        </fieldset>
                    </div>

                    <div class="w-select">
                        <fieldset class="form-group">
                            <select class="selectpicker form-control">
                                <option value="NU">Date (Descending)</option>
                                <option value="NU">Date (Ascending)</option>
                            </select>
                        </fieldset>
                    </div>

                    <a href="#" data-toggle="modal" data-target="#create-photo-album" class="btn btn-primary btn-md-2">Filter</a>

                    <form class="w-search">
                        <div class="form-group with-button">
                            <input class="form-control" type="text" placeholder="Search Blog Posts......">
                            <button>
                                <svg class="olymp-magnifying-glass-icon"><use xlink:href="{{ asset('assets/svg-icons/sprites/icons.svg')}}#olymp-magnifying-glass-icon"></use></svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="blog-post-wrap medium-padding80">
    <div class="container">
        <div class="row">
            <div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="ui-block">

                    <!-- Post -->
                    
                    <article class="hentry blog-post">
                    
                        <div class="post-thumb">
                            <img src="{{ asset('assets/img/post1.jpg')}}" alt="photo">
                        </div>
                    
                        <div class="post-content">
                            <a href="#" class="post-category bg-blue-light">THE COMMUNITY</a>
                            <a href="#" class="h4 post-title">Here’s the Featured Urban photo of August! </a>
                            <p>Here’s a photo from last month’s photoshoot. We got really awesome shots for the new catalog.</p>
                    
                            <div class="author-date">
                                by
                                <a class="h6 post__author-name fn" href="#">Maddy Simmons</a>
                                <div class="post__date">
                                    <time class="published" datetime="2017-03-24T18:18">
                                        - 7 hours ago
                                    </time>
                                </div>
                            </div>
                    
                            <div class="post-additional-info inline-items">
                                <div class="friends-harmonic-wrap">
                                    <ul class="friends-harmonic">
                                        <li>
                                            <a href="#">
                                                <img src="{{ asset('assets/img/icon-chat27.png')}}" alt="icon">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="{{ asset('assets/img/icon-chat2.png')}}" alt="icon">
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="names-people-likes">
                                        26
                                    </div>
                                </div>
                    
                                <div class="comments-shared">
                                    <a href="#" class="post-add-icon inline-items">
                                        <svg class="olymp-speech-balloon-icon">
                                            <use xlink:href="{{ asset('assets/svg-icons/sprites/icons.svg')}}#olymp-speech-balloon-icon"></use>
                                        </svg>
                                        <span>0</span>
                                    </a>
                                </div>
                    
                            </div>
                        </div>
                    
                    </article>
                    
                    <!-- ... end Post -->
                </div>
            </div>
            <div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="ui-block">

                    <!-- Post -->
                    
                    <article class="hentry blog-post">
                    
                        <div class="post-thumb">
                            <img src="{{ asset('assets/img/post2.jpg')}}" alt="photo">
                        </div>
                    
                        <div class="post-content">
                            <a href="#" class="post-category bg-primary">OLYMPUS NEWS</a>
                            <a href="#" class="h4 post-title">Olympus Network added new photo filters!</a>
                            <p>Here’s a photo from last month’s photoshoot. We got really awesome shots for the new catalog.</p>
                    
                            <div class="author-date">
                                by
                                <a class="h6 post__author-name fn" href="#">JACK SCORPIO</a>
                                <div class="post__date">
                                    <time class="published" datetime="2017-03-24T18:18">
                                        - 12 hours ago
                                    </time>
                                </div>
                            </div>
                    
                            <div class="post-additional-info inline-items">
                    
                                <div class="friends-harmonic-wrap">
                                    <ul class="friends-harmonic">
                                        <li>
                                            <a href="#">
                                                <img src="{{ asset('assets/img/icon-chat4.png')}}" alt="icon">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="{{ asset('assets/img/icon-chat26.png')}}" alt="icon">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="{{ asset('assets/img/icon-chat16.png')}}" alt="icon">
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="names-people-likes">
                                        82
                                    </div>
                                </div>
                    
                                <div class="comments-shared">
                                    <a href="#" class="post-add-icon inline-items">
                                        <svg class="olymp-speech-balloon-icon">
                                            <use xlink:href="{{ asset('assets/svg-icons/sprites/icons.svg')}}#olymp-speech-balloon-icon"></use>
                                        </svg>
                                        <span>14</span>
                                    </a>
                                </div>
                    
                            </div>
                        </div>
                    
                    </article>
                    
                    <!-- ... end Post -->
                </div>
            </div>
            <div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="ui-block">

                    <!-- Post -->
                    
                    <article class="hentry blog-post">
                    
                        <div class="post-thumb">
                            <img src="{{ asset('assets/img/post3.jpg')}}" alt="photo">
                        </div>
                    
                        <div class="post-content">
                            <a href="#" class="post-category bg-purple">INSPIRATION</a>
                            <a href="#" class="h4 post-title">Take a look at these truly awesome worspaces</a>
                            <p>Here’s a photo from last month’s photoshoot. We got really awesome shots for the new catalog.</p>
                    
                            <div class="author-date">
                                by
                                <a class="h6 post__author-name fn" href="#">Maddy Simmons</a>
                                <div class="post__date">
                                    <time class="published" datetime="2017-03-24T18:18">
                                        - 2 days ago
                                    </time>
                                </div>
                            </div>
                    
                            <div class="post-additional-info inline-items">
                    
                                <div class="friends-harmonic-wrap">
                                    <ul class="friends-harmonic">
                                        <li>
                                            <a href="#">
                                                <img src="{{ asset('assets/img/icon-chat28.png')}}" alt="icon">
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="names-people-likes">
                                        0
                                    </div>
                                </div>
                    
                                <div class="comments-shared">
                                    <a href="#" class="post-add-icon inline-items">
                                        <svg class="olymp-speech-balloon-icon">
                                            <use xlink:href="{{ asset('assets/svg-icons/sprites/icons.svg')}}#olymp-speech-balloon-icon"></use>
                                        </svg>
                                        <span>22</span>
                                    </a>
                                </div>
                    
                            </div>
                        </div>
                    
                    </article>
                    
                    <!-- ... end Post -->
                </div>
            </div>
            <div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="ui-block">

                    <!-- Post -->
                    
                    <article class="hentry blog-post">
                    
                        <div class="post-thumb">
                            <img src="{{ asset('assets/img/post4.jpg')}}" alt="photo">
                        </div>
                    
                        <div class="post-content">
                            <a href="#" class="post-category bg-primary">OLYMPUS NEWS</a>
                            <a href="#" class="h4 post-title">Here’s the Featured Urban photo of July!</a>
                            <p>Here’s a photo from last month’s photoshoot. We got really awesome shots for the new catalog.</p>
                    
                            <div class="author-date">
                                by
                                <a class="h6 post__author-name fn" href="#">JACK SCORPIO</a>
                                <div class="post__date">
                                    <time class="published" datetime="2017-03-24T18:18">
                                        - 20 days ago
                                    </time>
                                </div>
                            </div>
                    
                            <div class="post-additional-info inline-items">
                    
                                <div class="friends-harmonic-wrap">
                                    <ul class="friends-harmonic">
                                        <li>
                                            <a href="#">
                                                <img src="{{ asset('assets/img/icon-chat3.png')}}" alt="icon">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="{{ asset('assets/img/icon-chat11.png')}}" alt="icon">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="{{ asset('assets/img/icon-chat20.png')}}" alt="icon">
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="names-people-likes">
                                        31
                                    </div>
                                </div>
                    
                                <div class="comments-shared">
                                    <a href="#" class="post-add-icon inline-items">
                                        <svg class="olymp-speech-balloon-icon">
                                            <use xlink:href="{{ asset('assets/svg-icons/sprites/icons.svg')}}#olymp-speech-balloon-icon"></use>
                                        </svg>
                                        <span>35</span>
                                    </a>
                                </div>
                    
                            </div>
                        </div>
                    
                    </article>
                    
                    <!-- ... end Post -->
                </div>
            </div>
            <div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="ui-block">

                    <!-- Post -->
                    
                    <article class="hentry blog-post">
                    
                        <div class="post-thumb">
                            <img src="{{ asset('assets/img/post5.jpg')}}" alt="photo">
                        </div>
                    
                        <div class="post-content">
                            <a href="#" class="post-category bg-blue-light">THE COMMUNITY</a>
                            <a href="#" class="h4 post-title">Olympus’s family picnic was a success!</a>
                            <p>Here’s a photo from last month’s photoshoot. We got really awesome shots for the new catalog.</p>
                    
                            <div class="author-date">
                                by
                                <a class="h6 post__author-name fn" href="#">Maddy Simmons</a>
                                <div class="post__date">
                                    <time class="published" datetime="2017-03-24T18:18">
                                        - 1 MONTH ago
                                    </time>
                                </div>
                            </div>
                    
                            <div class="post-additional-info inline-items">
                    
                                <div class="friends-harmonic-wrap">
                                    <ul class="friends-harmonic">
                                        <li>
                                            <a href="#">
                                                <img src="{{ asset('assets/img/icon-chat19.png')}}" alt="icon">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="{{ asset('assets/img/icon-chat13.png')}}" alt="icon">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="{{ asset('assets/img/icon-chat1.png')}}" alt="icon">
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="names-people-likes">
                                        67
                                    </div>
                                </div>
                    
                                <div class="comments-shared">
                                    <a href="#" class="post-add-icon inline-items">
                                        <svg class="olymp-speech-balloon-icon">
                                            <use xlink:href="{{ asset('assets/svg-icons/sprites/icons.svg')}}#olymp-speech-balloon-icon"></use>
                                        </svg>
                                        <span>62</span>
                                    </a>
                                </div>
                    
                            </div>
                        </div>
                    
                    </article>
                    
                    <!-- ... end Post -->
                </div>
            </div>
            <div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="ui-block">

                    <!-- Post -->
                    
                    <article class="hentry blog-post">
                    
                        <div class="post-thumb">
                            <img src="{{ asset('assets/img/post6.jpg')}}" alt="photo">
                        </div>
                    
                        <div class="post-content">
                            <a href="#" class="post-category bg-blue-light">THE COMMUNITY</a>
                            <a href="#" class="h4 post-title">Olympians: Journal of my backpacking days</a>
                            <p>Here’s a photo from last month’s photoshoot. We got really awesome shots for the new catalog.</p>
                    
                            <div class="author-date">
                                by
                                <a class="h6 post__author-name fn" href="#">JAMES SPIEGEL</a>
                                <div class="post__date">
                                    <time class="published" datetime="2017-03-24T18:18">
                                        - 1 MONTH ago
                                    </time>
                                </div>
                            </div>
                    
                            <div class="post-additional-info inline-items">
                    
                                <div class="friends-harmonic-wrap">
                                    <ul class="friends-harmonic">
                                        <li>
                                            <a href="#">
                                                <img src="{{ asset('assets/img/icon-chat20.png')}}" alt="icon">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="{{ asset('assets/img/icon-chat24.png')}}" alt="icon">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="{{ asset('assets/img/icon-chat10.png')}}" alt="icon">
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="names-people-likes">
                                        67
                                    </div>
                                </div>
                    
                                <div class="comments-shared">
                                    <a href="#" class="post-add-icon inline-items">
                                        <svg class="olymp-speech-balloon-icon">
                                            <use xlink:href="{{ asset('assets/svg-icons/sprites/icons.svg')}}#olymp-speech-balloon-icon"></use>
                                        </svg>
                                        <span>53</span>
                                    </a>
                                </div>
                    
                            </div>
                        </div>
                    
                    </article>
                    
                    <!-- ... end Post -->
                    

                </div>
            </div>
            <div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="ui-block">

                    <!-- Post -->
                    
                    <article class="hentry blog-post">
                    
                        <div class="post-thumb">
                            <img src="{{ asset('assets/img/post7.jpg')}}" alt="photo">
                        </div>
                    
                        <div class="post-content">
                            <a href="#" class="post-category bg-blue-light">THE COMMUNITY</a>
                            <a href="#" class="h4 post-title">Here are the best tattoos of our community</a>
                            <p>Here’s a photo from last month’s photoshoot. We got really awesome shots for the new catalog.</p>
                    
                            <div class="author-date">
                                by
                                <a class="h6 post__author-name fn" href="#">JACK SCORPIO</a>
                                <div class="post__date">
                                    <time class="published" datetime="2017-03-24T18:18">
                                        - 2 MONTHS ago
                                    </time>
                                </div>
                            </div>
                    
                            <div class="post-additional-info inline-items">
                    
                                <div class="friends-harmonic-wrap">
                                    <ul class="friends-harmonic">
                                        <li>
                                            <a href="#">
                                                <img src="{{ asset('assets/img/icon-chat2.png')}}" alt="icon">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="{{ asset('assets/img/icon-chat4.png')}}" alt="icon">
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="names-people-likes">
                                        37
                                    </div>
                                </div>
                    
                                <div class="comments-shared">
                                    <a href="#" class="post-add-icon inline-items">
                                        <svg class="olymp-speech-balloon-icon">
                                            <use xlink:href="{{ asset('assets/svg-icons/sprites/icons.svg')}}#olymp-speech-balloon-icon"></use>
                                        </svg>
                                        <span>62</span>
                                    </a>
                                </div>
                    
                            </div>
                        </div>
                    
                    </article>
                    
                    <!-- ... end Post -->
                </div>
            </div>
            <div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="ui-block">

                    <!-- Post -->
                    
                    <article class="hentry blog-post">
                    
                        <div class="post-thumb">
                            <img src="{{ asset('assets/img/post8.jpg')}}" alt="photo">
                        </div>
                    
                        <div class="post-content">
                            <a href="#" class="post-category bg-purple">INSPIRATION</a>
                            <a href="#" class="h4 post-title">Take a look to the coolest beaches of the world</a>
                            <p>Here’s a photo from last month’s photoshoot. We got really awesome shots for the new catalog.</p>
                    
                            <div class="author-date">
                                by
                                <a class="h6 post__author-name fn" href="#">MADDY SIMMONS</a>
                                <div class="post__date">
                                    <time class="published" datetime="2017-03-24T18:18">
                                        - 2 months ago
                                    </time>
                                </div>
                            </div>
                    
                            <div class="post-additional-info inline-items">
                    
                                <div class="friends-harmonic-wrap">
                                    <ul class="friends-harmonic">
                                        <li>
                                            <a href="#">
                                                <img src="{{ asset('assets/img/icon-chat26.png')}}" alt="icon">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="{{ asset('assets/img/icon-chat25.png')}}" alt="icon">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="{{ asset('assets/img/icon-chat21.png')}}" alt="icon">
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="names-people-likes">
                                        104
                                    </div>
                                </div>
                    
                                <div class="comments-shared">
                                    <a href="#" class="post-add-icon inline-items">
                                        <svg class="olymp-speech-balloon-icon">
                                            <use xlink:href="{{ asset('assets/svg-icons/sprites/icons.svg')}}#olymp-speech-balloon-icon"></use>
                                        </svg>
                                        <span>84</span>
                                    </a>
                                </div>
                    
                            </div>
                        </div>
                    
                    </article>
                    
                    <!-- ... end Post -->
                </div>
            </div>
            <div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="ui-block">

                    <!-- Post -->
                    
                    <article class="hentry blog-post">
                    
                        <div class="post-thumb">
                            <img src="{{ asset('assets/img/post9.jpg')}}" alt="photo">
                        </div>
                    
                        <div class="post-content">
                            <a href="#" class="post-category bg-purple">INSPIRATION</a>
                            <a href="#" class="h4 post-title">Check out this 10 yummy breakfast recipes</a>
                            <p>Here’s a photo from last month’s photoshoot. We got really awesome shots for the new catalog.</p>
                    
                            <div class="author-date">
                                by
                                <a class="h6 post__author-name fn" href="#">MADDY SIMMONS</a>
                                <div class="post__date">
                                    <time class="published" datetime="2017-03-24T18:18">
                                        - 3 months ago
                                    </time>
                                </div>
                            </div>
                    
                            <div class="post-additional-info inline-items">
                    
                                <div class="friends-harmonic-wrap">
                                    <ul class="friends-harmonic">
                                        <li>
                                            <a href="#">
                                                <img src="{{ asset('assets/img/icon-chat15.png')}}" alt="icon">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="{{ asset('assets/img/icon-chat16.png')}}" alt="icon">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="{{ asset('assets/img/icon-chat17.png')}}" alt="icon">
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="names-people-likes">
                                        88
                                    </div>
                                </div>
                    
                                <div class="comments-shared">
                                    <a href="#" class="post-add-icon inline-items">
                                        <svg class="olymp-speech-balloon-icon">
                                            <use xlink:href="{{ asset('assets/svg-icons/sprites/icons.svg')}}#olymp-speech-balloon-icon"></use>
                                        </svg>
                                        <span>39</span>
                                    </a>
                                </div>
                    
                            </div>
                        </div>
                    
                    </article>
                    
                    <!-- ... end Post -->
                </div>
            </div>
        </div>
    </div>

    
    <!-- Pagination -->
    
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: -10.3833px; top: -16.8333px; background-color: rgb(255, 255, 255); transform: scale(16.7857);"></div></div></a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="#">12</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
    
    <!-- ... end Pagination -->

</section>


<!-- Section Call To Action Animation -->

<section class="align-right pt160 pb80 section-move-bg call-to-action-animation scrollme">
    <div class="container">
        <div class="row">
            <div class="col col-xl-10 m-auto col-lg-10 col-md-12 col-sm-12 col-12">
                <a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#registration-login-form-popup">Start Making Friends Now!</a>
            </div>
        </div>
    </div>
    <img class="first-img" alt="guy" src="{{ asset('assets/img/guy.png')}}">
    <img class="second-img" alt="rocket" src="{{ asset('assets/img/rocket1.png')}}">
    <div class="content-bg-wrap bg-section1"></div>
</section>

<!-- ... end Section Call To Action Animation -->

<!-- Window-popup Restore Password -->

<div class="modal fade" id="restore-password" tabindex="-1" role="dialog" aria-labelledby="restore-password" aria-hidden="true">
    <div class="modal-dialog window-popup restore-password-popup" role="document">
        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                <svg class="olymp-close-icon"><use xlink:href="{{ asset('assets/svg-icons/sprites/icons.svg')}}#olymp-close-icon"></use></svg>
            </a>

            <div class="modal-header">
                <h6 class="title">Restore your Password</h6>
            </div>

            <div class="modal-body">
                <form  method="get">
                    <p>Enter your email and click the send code button. You’ll receive a code in your email. Please use that
                        code below to change the old password for a new one.
                    </p>
                    <div class="form-group label-floating">
                        <label class="control-label">Your Email</label>
                        <input class="form-control" placeholder="" type="email" value="james-spiegel@yourmail.com">
                    </div>
                    <button class="btn btn-purple btn-lg full-width">Send me the Code</button>
                    <div class="form-group label-floating">
                        <label class="control-label">Enter the Code</label>
                        <input class="form-control" placeholder="" type="text" value="">
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Your New Password</label>
                        <input class="form-control" placeholder="" type="password" value="olympus">
                    </div>
                    <button class="btn btn-primary btn-lg full-width">Change your Password!</button>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- ... end Window-popup Restore Password -->


<div class="modal fade" id="registration-login-form-popup" tabindex="-1" role="dialog" aria-labelledby="registration-login-form-popup" aria-hidden="true">
    <div class="modal-dialog window-popup registration-login-form-popup" role="document">
        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                <svg class="olymp-close-icon"><use xlink:href="{{ asset('assets/svg-icons/sprites/icons.svg')}}#olymp-close-icon"></use></svg>
            </a>
            <div class="modal-body">
                <div class="registration-login-form">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home1" role="tab">
                                <svg class="olymp-login-icon">
                                    <use xlink:href="{{ asset('assets/svg-icons/sprites/icons.svg')}}#olymp-login-icon"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#profile1" role="tab">
                                <svg class="olymp-register-icon">
                                    <use xlink:href="{{ asset('assets/svg-icons/sprites/icons.svg')}}#olymp-register-icon"></use>
                                </svg>
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="home1" role="tabpanel" data-mh="log-tab">
                            <div class="title h6">Register to Olympus</div>
                            <form class="content">
                                <div class="row">
                                    <div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">First Name</label>
                                            <input class="form-control" placeholder="" type="text">
                                        </div>
                                    </div>
                                    <div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Last Name</label>
                                            <input class="form-control" placeholder="" type="text">
                                        </div>
                                    </div>
                                    <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Your Email</label>
                                            <input class="form-control" placeholder="" type="email">
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Your Password</label>
                                            <input class="form-control" placeholder="" type="password">
                                        </div>

                                        <div class="form-group date-time-picker label-floating">
                                            <label class="control-label">Your Birthday</label>
                                            <input name="datetimepicker" value="10/24/1984" />
                                            <span class="input-group-addon">
                                            <svg class="olymp-calendar-icon"><use xlink:href="{{ asset('assets/svg-icons/sprites/icons.svg')}}#olymp-calendar-icon"></use></svg>
                                        </span>
                                        </div>

                                        <div class="form-group label-floating is-select">
                                            <label class="control-label">Your Gender</label>
                                            <select class="selectpicker form-control">
                                                <option value="MA">Male</option>
                                                <option value="FE">Female</option>
                                            </select>
                                        </div>

                                        <div class="remember">
                                            <div class="checkbox">
                                                <label>
                                                    <input name="optionsCheckboxes" type="checkbox">
                                                    I accept the <a href="#">Terms and Conditions</a> of the website
                                                </label>
                                            </div>
                                        </div>

                                        <a href="#" class="btn btn-purple btn-lg full-width">Complete Registration!</a>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane" id="profile1" role="tabpanel" data-mh="log-tab">
                            <div class="title h6">Login to your Account</div>
                            <form class="content">
                                <div class="row">
                                    <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Your Email</label>
                                            <input class="form-control" placeholder="" type="email">
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Your Password</label>
                                            <input class="form-control" placeholder="" type="password">
                                        </div>

                                        <div class="remember">

                                            <div class="checkbox">
                                                <label>
                                                    <input name="optionsCheckboxes" type="checkbox">
                                                    Remember Me
                                                </label>
                                            </div>
                                            <a href="#" class="forgot" data-toggle="modal" data-target="#restore-password">Forgot my Password</a>
                                        </div>

                                        <a href="#" class="btn btn-lg btn-primary full-width">Login</a>

                                        <div class="or"></div>

                                        <a href="#" class="btn btn-lg bg-facebook full-width btn-icon-left"><i class="fab fa-facebook-f" aria-hidden="true"></i>Login with Facebook</a>

                                        <a href="#" class="btn btn-lg bg-twitter full-width btn-icon-left"><i class="fab fa-twitter" aria-hidden="true"></i>Login with Twitter</a>


                                        <p>Don’t you have an account?
                                            <a href="#">Register Now!</a> it’s really simple and you can start enjoing all the benefits!
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Footer Full Width -->

<div class="footer footer-full-width" id="footer">
    <div class="container">
        <div class="row">
            <div class="col col-lg-4 col-md-4 col-sm-12 col-12">

                
                <!-- Widget About -->
                
                <div class="widget w-about">
                
                    <a href="02-ProfilePage.html" class="logo">
                        <div class="img-wrap">
                            <img src="{{ asset('assets/img/logo-colored')}}.png" alt="Olympus">
                        </div>
                        <div class="title-block">
                            <h6 class="logo-title">eureka</h6>
                            <div class="sub-title">SOCIAL NETWORK</div>
                        </div>
                    </a>
                    <p>Lorem ipsum dolor sit amet, consect adipisicing elit, sed do eiusmod por incidid ut labore et lorem.</p>
                    <ul class="socials">
                        <li>
                            <a href="#">
                                <i class="fab fa-facebook-square" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-twitter" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-youtube" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-google-plus-g" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-instagram" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                
                <!-- ... end Widget About -->

            </div>

            <div class="col col-lg-2 col-md-4 col-sm-12 col-12">

                
                <!-- Widget List -->
                
                <div class="widget w-list">
                    <h6 class="title">Main Links</h6>
                    <ul>
                        <li>
                            <a href="#">Landing</a>
                        </li>
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">About</a>
                        </li>
                        <li>
                            <a href="#">Events</a>
                        </li>
                    </ul>
                </div>
                
                <!-- ... end Widget List -->

            </div>
            <div class="col col-lg-2 col-md-4 col-sm-12 col-12">

                
                <div class="widget w-list">
                    <h6 class="title">Your Profile</h6>
                    <ul>
                        <li>
                            <a href="#">Main Page</a>
                        </li>
                        <li>
                            <a href="#">About</a>
                        </li>
                        <li>
                            <a href="#">Friends</a>
                        </li>
                        <li>
                            <a href="#">Photos</a>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="col col-lg-2 col-md-4 col-sm-12 col-12">

                
                <div class="widget w-list">
                    <h6 class="title">Features</h6>
                    <ul>
                        <li>
                            <a href="#">Newsfeed</a>
                        </li>
                        <li>
                            <a href="#">Post Versions</a>
                        </li>
                        <li>
                            <a href="#">Messages</a>
                        </li>
                        <li>
                            <a href="#">Friend Groups</a>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="col col-lg-2 col-md-4 col-sm-12 col-12">

                
                <div class="widget w-list">
                    <h6 class="title">eureka</h6>
                    <ul>
                        <li>
                            <a href="#">Privacy</a>
                        </li>
                        <li>
                            <a href="#">Terms & Conditions</a>
                        </li>
                        <li>
                            <a href="#">Forums</a>
                        </li>
                        <li>
                            <a href="#">Statistics</a>
                        </li>
                    </ul>
                </div>

            </div>

            <div class="col col-lg-12 col-md-12 col-sm-12 col-12">

                
                <!-- SUB Footer -->
                
                <div class="sub-footer-copyright">
                    <span>
                        Copyright <a href="index.html">Olympus Buddypress + WP</a> All Rights Reserved 2017
                    </span>
                </div>
                
                <!-- ... end SUB Footer -->

            </div>
        </div>
    </div>
</div>

<!-- ... end Footer Full Width -->



<!-- Window-popup-CHAT for responsive min-width: 768px -->

<div class="ui-block popup-chat popup-chat-responsive" tabindex="-1" role="dialog" aria-labelledby="popup-chat-responsive" aria-hidden="true">

    <div class="modal-content">
        <div class="modal-header">
            <span class="icon-status online"></span>
            <h6 class="title" >Chat</h6>
            <div class="more">
                <svg class="olymp-three-dots-icon"><use xlink:href="{{ asset('assets/svg-icons/sprites/icons.svg')}}#olymp-three-dots-icon"></use></svg>
                <svg class="olymp-little-delete js-chat-open"><use xlink:href="{{ asset('assets/svg-icons/sprites/icons.svg')}}#olymp-little-delete"></use></svg>
            </div>
        </div>
        <div class="modal-body">
            <div class="mCustomScrollbar">
                <ul class="notification-list chat-message chat-message-field">
                    <li>
                        <div class="author-thumb">
                            <img src="{{ asset('assets/img/avatar14-sm')}}.jpg" alt="author" class="mCS_img_loaded">
                        </div>
                        <div class="notification-event">
                            <span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
                        </div>
                    </li>

                    <li>
                        <div class="author-thumb">
                            <img src="{{ asset('assets/img/author-page')}}.jpg" alt="author" class="mCS_img_loaded">
                        </div>
                        <div class="notification-event">
                            <span class="chat-message-item">Don’t worry Mathilda!</span>
                            <span class="chat-message-item">I already bought everything</span>
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:29pm</time></span>
                        </div>
                    </li>

                    <li>
                        <div class="author-thumb">
                            <img src="{{ asset('assets/img/avatar14-sm')}}.jpg" alt="author" class="mCS_img_loaded">
                        </div>
                        <div class="notification-event">
                            <span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
                        </div>
                    </li>
                </ul>
            </div>

            <form class="need-validation">

        <div class="form-group label-floating is-empty">
            <label class="control-label">Press enter to post...</label>
            <textarea class="form-control" placeholder=""></textarea>
            <div class="add-options-message">
                <a href="#" class="options-message">
                    <svg class="olymp-computer-icon"><use xlink:href="{{ asset('assets/svg-icons/sprites/icons.svg')}}#olymp-computer-icon"></use></svg>
                </a>
                <div class="options-message smile-block">

                    <svg class="olymp-happy-sticker-icon"><use xlink:href="{{ asset('assets/svg-icons/sprites/icons.svg')}}#olymp-happy-sticker-icon"></use></svg>

                    <ul class="more-dropdown more-with-triangle triangle-bottom-right">
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets/img/icon-chat1.png')}}" alt="icon">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets/img/icon-chat2.png')}}" alt="icon">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets/img/icon-chat3.png')}}" alt="icon">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets/img/icon-chat4.png')}}" alt="icon">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets/img/icon-chat5.png')}}" alt="icon">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets/img/icon-chat6.png')}}" alt="icon">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets/img/icon-chat7.png')}}" alt="icon">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets/img/icon-chat8.png')}}" alt="icon">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets/img/icon-chat9.png')}}" alt="icon">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets/img/icon-chat10.png')}}" alt="icon">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets/img/icon-chat11.png')}}" alt="icon">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets/img/icon-chat12.png')}}" alt="icon">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets/img/icon-chat13.png')}}" alt="icon">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets/img/icon-chat14.png')}}" alt="icon">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets/img/icon-chat15.png')}}" alt="icon">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets/img/icon-chat16.png')}}" alt="icon">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets/img/icon-chat17.png')}}" alt="icon">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets/img/icon-chat18.png')}}" alt="icon">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets/img/icon-chat19.png')}}" alt="icon">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets/img/icon-chat20.png')}}" alt="icon">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets/img/icon-chat21.png')}}" alt="icon">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets/img/icon-chat22.png')}}" alt="icon">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets/img/icon-chat23.png')}}" alt="icon">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets/img/icon-chat24.png')}}" alt="icon">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets/img/icon-chat25.png')}}" alt="icon">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets/img/icon-chat26.png')}}" alt="icon">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets/img/icon-chat27.png')}}" alt="icon">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </form>
        </div>
    </div>

</div>

<!-- ... end Window-popup-CHAT for responsive min-width: 768px -->

<!-- ... end Responsive Header-BP -->
<div class="header-spacer"></div>



<a class="back-to-top" href="#">
    <img src="{{asset('assets/svg-icons/back-to-top.svg')}}" alt="arrow" class="back-icon">
</a>

<div id="content">
@yield('content')
</div>
 

</div>

<!-- ... end Window-popup-CHAT for responsive min-width: 768px -->


<!-- JS Scripts -->
<script src="{{ asset('assets/js/jquery-3.2.1.js')}}"></script>
<script src="{{ asset('assets/js/jquery.appear.js')}}"></script>
<script src="{{ asset('assets/js/jquery.mousewheel.js')}}"></script>
<script src="{{ asset('assets/js/perfect-scrollbar.js')}}"></script>
<script src="{{ asset('assets/js/jquery.matchHeight.js')}}"></script>
<script src="{{ asset('assets/js/svgxuse.js')}}"></script>
<script src="{{ asset('assets/js/imagesloaded.pkgd.js')}}"></script>
<script src="{{ asset('assets/js/Headroom.js')}}"></script>
<script src="{{ asset('assets/js/velocity.js')}}"></script>
<script src="{{ asset('assets/js/ScrollMagic.js')}}"></script>
<script src="{{ asset('assets/js/jquery.waypoints.js')}}"></script>
<script src="{{ asset('assets/js/jquery.countTo.js')}}"></script>
<script src="{{ asset('assets/js/popper.min.js')}}"></script>
<script src="{{ asset('assets/js/material.min.js')}}"></script>
<script src="{{ asset('assets/js/bootstrap-select.js')}}"></script>
<script src="{{ asset('assets/js/smooth-scroll.js')}}"></script>
<script src="{{ asset('assets/js/selectize.js')}}"></script>
<script src="{{ asset('assets/js/swiper.jquery.js')}}"></script>
<script src="{{ asset('assets/js/moment.js')}}"></script>
<script src="{{ asset('assets/js/daterangepicker.js')}}"></script>
<script src="{{ asset('assets/js/simplecalendar.js')}}"></script>
<script src="{{ asset('assets/js/fullcalendar.js')}}"></script>
<script src="{{ asset('assets/js/isotope.pkgd.js')}}"></script>
<script src="{{ asset('assets/js/ajax-pagination.js')}}"></script>
<script src="{{ asset('assets/js/Chart.js')}}"></script>
<script src="{{ asset('assets/js/chartjs-plugin-deferred.js')}}"></script>
<script src="{{ asset('assets/js/circle-progress.js')}}"></script>
<script src="{{ asset('assets/js/loader.js')}}"></script>
<script src="{{ asset('assets/js/run-chart.js')}}"></script>
<script src="{{ asset('assets/js/jquery.magnific-popup.js')}}"></script>
<script src="{{ asset('assets/js/jquery.gifplayer.js')}}"></script>
<script src="{{ asset('assets/js/mediaelement-and-player.js')}}"></script>
<script src="{{ asset('assets/js/mediaelement-playlist-plugin.min.js')}}"></script>
<script src="{{ asset('assets/js/ion.rangeSlider.js')}}"></script>

<script src="{{ asset('assets/js/base-init.js')}}"></script>
<script defer src="{{ asset('assets/fonts/fontawesome-all.js')}}"></script>
<script src="{{ asset('assets/Bootstrap/dist/js/bootstrap.bundle.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>