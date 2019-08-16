@extends('admin.template')

@section('content')
<div id="right-panel" class="right-panel">
    <!-- Header-->
    <div id="navbartemp">
        <navbartemp-component id="{{ Auth::user()->id }}" unreads="{{ auth()->user()->unreadNotifications }}">
        </navbartemp-component>
    </div>
    <!-- /#header -->
    <!-- Content -->
    @yield('content_navbar')
    <!-- /.content -->
    <div class="clearfix"></div>
    <!-- Footer -->
    <footer class="site-footer">
        <div class="footer-inner bg-white">
            <div class="row">
                <div class="col-sm-6">Copyright &copy; 2018 Ela Admin</div>
                <div class="col-sm-6 text-right">
                    Designed by
                    <a href="https://colorlib.com">Colorlib</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- /.site-footer -->
</div>
@endsection