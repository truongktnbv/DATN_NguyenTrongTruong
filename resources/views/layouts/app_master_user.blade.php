<!DOCTYPE html>
<html lang="vi">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title>{{ strtolower($title_page ?? "Đồ án tốt nghiệp")   }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" sizes="32x32" type="image/png" href="{{ asset('ico.png') }}" />
    @yield('css')

    {{-- Thông báo --}}
    @if(session('toastr'))
        <script>
			var TYPE_MESSAGE = "{{session('toastr.type')}}";
			var MESSAGE = "{{session('toastr.message')}}";
        </script>
    @endif
</head>
<body>
@include('frontend.components.header')
<div class="container user">
    <div class="left">
        <div class="header">
            <img src="{{ pare_url_file(Auth::user()->avatar) }}" alt="">
            <p>
                <span>Tài khoản của</span>
                <span>{{ Auth::user()->name }}</span>
            </p>
        </div>
{{--        <p>Đăng nhập lần cuối <b>{{ get_time_login(Auth::user()->log_login)['time'] ?? "" }}</b></p>--}}
        <p class="user-info-item"><span>Mã TK</span> <span><b>#{{ Auth::user()->id }}</b></span></p>
        {{-- <p class="user-info-item"><span>Số dư TK</span> <span><b>{{ number_format(Auth::user()->balance,0,',','.') }} đ</b></span></p> --}}
        <div class="content">
            <ul class="left-nav">
               
                        <li class="nav-item">
                            <a class="nav-link" href="/account">Tài khoản</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{  route('get.user.update_info') }}">Cập nhật thông tin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('get.user.transaction') }}">Quản lý đơn hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('get.user.favourite') }}">Sản phẩm yêu thích</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('get.user.log_login') }}">log_login</a>
                        </li>
            </ul>
        </div>
    </div>
    <div class="right">
        @yield('content')
    </div>
    <div class="" style="clear: both"></div>
</div>
@include('frontend.components.footer')
<script>
	var DEVICE = '{{  device_agent() }}'
</script>
<script src="{{ asset('js/cart.js') }}" type="text/javascript"></script>

@yield('script')
</body>
</html>
