<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
  <div class="profile-sidebar">
    <div class="profile-userpic">
      <img src="{{ URL::asset('images/pic.jpg') }}" width="50" class="img-responsive" alt="">
    </div>
    <div class="profile-usertitle">
      <div class="profile-usertitle-name"><a href="#">ADMIN</a></div>
      <div class="profile-usertitle-status"></span>System</div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="divider"></div>
  <ul class="nav menu">
    <li class="@yield('dashboard')"><a href="{{route('dashboardPage')}}"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
    <li class="@yield('athlete')"><a href="{{route('athletePage')}}"><em class="fa fa-user">&nbsp;</em> Atlet</a></li>
    <li class="@yield('event')"><a href="{{route('eventPage')}}"><em class="fa fa-flag">&nbsp;</em> Acara</a></li>
    <li class="@yield('record')"><a href="{{route('recordPage')}}"><em class="fa fa-sitemap">&nbsp;</em> Rekor</a></li>
    {{-- <li class="@yield('report')"><a href="{{route('reportPage')}}"><em class="fa fa-sitemap">&nbsp;</em> Laporan</a></li> --}}
  </ul>
</div><!--/.sidebar-->
