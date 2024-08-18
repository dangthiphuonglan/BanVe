<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<meta name="viewport"
	content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="SHORTCUT ICON" href="{{ asset('css/admin/images/logo-chuan-2-6393.png') }}">

<!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
<title>Nhà hát Tuồng Nguyễn Hiển Dĩnh</title>
<!-- BOOTSTRAP CORE STYLE  -->
<link href="{{ asset('css/admin/bootstrap.css') }}" rel="stylesheet">
<!-- FONT AWESOME STYLE  -->
<link href="{{ asset('css/admin/font-awesome.css') }}" rel="stylesheet">
<!-- CUSTOM STYLE  -->
<link href="{{ asset('css/admin/style.css') }}" rel="stylesheet">
<!-- GOOGLE FONT -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans"
	rel="stylesheet" type="text/css">
<!-- CUSTOM SCRIPTS  -->
<script src="https://code.jquery.com/jquery.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>




<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
{{-- 
<script type="text/javascript" src="${pageContext.request.contextPath}/libraries/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="${pageContext.request.contextPath}/libraries/ckfinder/ckfinder.js"></script> --}}


<style>
.cke {
	visibility: hidden;
}
</style>
<style>
table{
	border: #f9f9f9;
}
table th{
	background-color: #b2d879;
	font-size: 15px;
}
.tieude{
	text-align: center;
}
.dropdown {
	position: relative;
	display: inline-block;
}

.dropdown-content {
	display: none;
	position: absolute;
	background-color: #f9f9f9;
	min-width: 160px;
	box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
	padding: 12px 16px;
	z-index: 1;
}

.dropdown:hover .dropdown-content {
	display: block;
}

.read-more-state {
	display: none;
}

.read-more-target {
	opacity: 0;
	max-height: 0;
	font-size: 0;
	transition: .25s ease;
}

.read-more-state:checked ~ .read-more-wrap .read-more-target {
	opacity: 1;
	font-size: inherit;
	max-height: 999em;
}

.read-more-state ~ .read-more-trigger:before {
	content: 'Xem thêm';
}

.read-more-state:checked ~ .read-more-trigger:before {
	content: 'Đóng';
}

.read-more-trigger {
	cursor: pointer;
	display: inline-block;
	padding: 0 .5em;
	color: #666;
	font-size: .9em;
	line-height: 2;
	border: 1px solid #ddd;
	border-radius: .25em;
}
</style>
</head>
<body>
<body>
<div class="navbar navbar-inverse set-radius-zero">
	<div class="container">
		<div class="navbar-header" style="margin-top: -20px">
            <a href="nhahat">
                <img style="width: 120px;height: 140px;" src="{{ asset('css/admin/images/logo-chuan-2-6393.png') }}" alt="">
            </a>
            <div style="display: inline-table;margin-top: 37px">
                <div id="title1">NHÀ HÁT TUỒNG</div>
                <div id="title2">NGUYỄN HIỂN DĨNH</div>
                
            </div>
		</div>
		<div class="right-div" style="margin-top: 20px">
			<span class=""
				style="margin-right: 10px; text-transform: uppercase; font-weight: bold; padding-top: 2%">Chào
				{{ $itemLogin -> hoTen }}
			</span><a href="/logout"
				class="btn btn-danger pull-right">Đăng xuất</a>
		</div>
	</div>
</div>
<!-- LOGO HEADER END-->
<section class="menu-section">
	<div class="container">
		<div class="row ">
			<div class="col-md-12">
				<div class="navbar-collapse collapse ">

					<ul id="menu-top" class="nav navbar-nav" style="float: none;">
						@if($itemLogin->role == 1||$itemLogin->role==2)
							
							<li class="dropdown"><a href="/danhmuc" class=" menu-top-">Quản lý danh mục &nbsp;<span
									class="badge ac123"></span></a>
								</li>
							
							<li><a href="/tietmuc"
								class="menu-top-">Quản lý tiết mục</a></li>

							<li><a href="/lichchieu"
								class="menu-top-">Quản lý lịch chiếu</a></li>

							<li><a href="/ve"
								class="menu-top-">Quản lý vé</a></li>
							
							<li><a href="/qlthanhtoan"
								class="menu-top-">Quản lý thanh toán</a></li>

							<li><a href="/nguoidung"
								class="menu-top-">Quản lý người dùng</a></li>
						@else
							<li><a href="/qlthanhtoan"
								class="menu-top-">Lịch sử giao dịch</a></li>
							<li><a href="/nguoidung"
								class="menu-top-">Quản lý người dùng</a></li>	
						@endif
						

					</ul>
				</div>
			</div>
		</div>
	</div>
</section>