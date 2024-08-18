<!DOCTYPE html>
<html lang="en"><head>
    <!-- Site information -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="revisit-after" content="7 days"><title>Nhà hát tuồng Nguyễ Hiển Dĩnh </title><meta itemprop="name" 
    content="Nhà hát tuồng Nguyễ Hiển Dĩnh"><meta property="og:title" content="Nhà hát tuồng Nguyễ Hiển Dĩnh"> <meta name="twitter:title" content="Nhà hát tuồng Nguyễ Hiển Dĩnh"><meta name="twitter:card" content="summary"><meta name="description" content="Nhà hát tuồng Nguyễ Hiển Dĩnh"><meta name="twitter:description" 
    content="Nhà hát tuồng Nguyễ Hiển Dĩnh"><meta itemprop="description" content="Nhà hát tuồng Nguyễ Hiển Dĩnh"><meta property="og:description" content="Nhà hát tuồng Nguyễ Hiển Dĩnh"> <meta property="og:locale" content="vi_VN"><link rel="alternate" hreflang="vi_VN" href=""><meta property="og:type" content="website"><meta name="keywords" content="Nhà hát tuồng Nguyễ Hiển Dĩnh"><meta property="og:site_name" content="Nhà hát tuồng Nguyễ Hiển Dĩnh"><meta name="twitter:site" content="Nhà hát tuồng Nguyễ Hiển Dĩnh"><meta name="robots" content="index,follow"><meta property="fb:admins" content="">



    <!-- Google Fonts -->
    <!-- Favicon -->
    <link rel="icon" href="/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <!-- External CSS -->
    <link href="{{ asset('css/public/css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('css/public/css/boostrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/public/css/global.css') }}" rel="stylesheet">
    <link href="{{ asset('css/public/css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/public/css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/public/css/icofont.css') }}" rel="stylesheet">
    <link href="{{ asset('css/public/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/public/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('css/public/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/public/css/owl.css') }}" rel="stylesheet">
    <link href="{{ asset('css/public/css/linearicons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/public/css/custom-animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/public/css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/public/css/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/public/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/public/css/jquery.sweet-modal.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/public/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/public/css/boostrap.min.css') }}" rel="stylesheet">

    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>

    <link rel="shortcut icon" href="{{ asset('css/admin/images/logo-chuan-2-6393.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('css/admin/images/logo-chuan-2-6393.png') }}" type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    

<body>

    <!-- Preloader -->
    <div style="display:none" class="main-reloader">
        <div class="loader"></div>
    </div>
    <!-- Preloader End -->
    <!-- Main Header -->
    
    
   
    <div class="page-wrapper">

        <!-- Preloader -->
        <div class="preloader" style="display: none;">
            <span></span>
        </div>

        <!-- Main Header -->
        
<header class="main-header">

    <!-- Header Top -->
    <div class="header-top">
        <div class="auto-container clearfix">

            <div class="pull-left">
                
            </div>

            <div class="pull-right clearfix">
                
            </div>

        </div>
    </div>

    <!-- Header Lower -->
    <div class="header-lower">

        <div class="auto-container clearfix">
            <div class="inner-container clearfix">

                <div class="pull-left logo-box">
                    <div class="logo"><a href="/"><img style="width: 65px;height: 200px;" src="{{ asset('css/admin/images/logo-chuan-2-6393.png') }}" alt="" title=""></a></div>
                </div>
                <div class="nav-outer clearfix">

                    <!-- Mobile Navigation Toggler -->
                    <div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md">
                        <div class="navbar-header">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li class="">
                                    <a href="/">Trang chủ</a>
                                </li>
                                <li  class="dropdown">
                                    <a href="#">Tiết mục</a>
                                    <ul>
                                        @foreach ($listdanhmuc as $item)
                                            <li><a href="/theloai/{{ $item->id_DanhMuc }}">{{ $item->tenDanhMuc }}</a></li>
                                        @endforeach
                                        
                                    </ul>
                                <div class="dropdown-btn"><span class="fa fa-angle-down"></span></div></li>
                                <li >
                                    <a href="/lichchieunhahat">Lịch diễn</a>
                                </li>
                                
                                <li>
                                    <a href="/lienhe">Liên hệ</a>
                                </li>
                                <li>
                                    @if (!empty($itemLogin))
                                        @if($itemLogin->role == 1||$itemLogin->role == 2)
                                            <a href="/danhmuc" style="color: yellow">{{ $itemLogin->hoTen }}</a>
                                        @else
                                            <a href="/qlthanhtoan" style="color: yellow">{{ $itemLogin->hoTen }}</a>
                                        @endif
                                    @else
                                        <a href="/loginform">Đăng nhập/Đăng ký</a>
                                    @endif
                                    
                                </li>
                                @if (!empty($itemLogin))
                                    <li>
                                        <a href="/logoutpublic" style="color: rgb(48, 224, 221)">Đăng xuất</a>
                                    </li>
                                @endif
                            </ul>
                        </div>

                    </nav>
                    <!-- Main Menu End-->
                    <!-- Outer Box -->
                    <div class="outer-box clearfix">
                        
                        <!-- Cart Box -->
                        <div class="cart-box">
                            <div class="dropdown">
                                
                                <button class="cart-box-btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                <div class="dropdown-menu pull-right cart-panel" aria-labelledby="dropdownMenu1">
                                    

    <ul class="btns-boxed">
        <li><a href="/dang-ky.html">Đăng ký</a></li>
        <li><a href="/dang-nhap.html">Đăng nhập</a></li>
    </ul>


<script>
    function logOut() {
        $.ajax({
            url: "/MemberRegister/Logout",
            type: "POST",
            traditional: true,
            datatype: "json",
            contentType: 'application/json; charset=utf-8',
            success: function (result) {
                //alert(result);
                if (result === "true" || result === true) {
                    location.href = "/";
                } else {
                }
            },
            error: function () {
                return false;
            }
        });
    }
</script>
                                </div>
                            </div>
                        </div>
                        <!-- End Cart Box -->
                        <!-- Nav Btn -->

                    </div>
                    <!-- End Outer Box -->

                </div>
            </div>

        </div>
    </div>
    <!-- End Header Lower -->
    <!-- Sticky Header  -->
    

</header>
<script>
    function openNav() {
        document.getElementById("mobileMenu").style.width = "300px";
    }

    function closeNav() {
        document.getElementById("mobileMenu").style.width = "0";
    }
</script>

        <!-- End Main Header -->