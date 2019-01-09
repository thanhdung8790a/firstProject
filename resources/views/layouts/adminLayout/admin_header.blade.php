<!--Header-part-->
<div id="header">
  <h1><a href="{{ url('admin/dashboard') }}">Hệ quản trị</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" >
      <a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle">
        <i class="icon icon-user"></i>  
        <span class="text">
          User
        </span><b class="caret"></b>
      </a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i>Hồ sơ</a></li>
        <li class="divider"></li>
        <li><a href="{{ url('logout') }}"><i class="icon-key"></i>Đăng xuất</a></li>
      </ul>
    </li>
    <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Tin nhắn</span> <span class="label label-important">5</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> Tin nhắn mới</a></li>
        <li class="divider"></li>
        <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> Hòm thư</a></li>
      </ul>
    </li>
    <li class=""><a title="" href="{{ url('admin/settings') }}"><i class="icon icon-cog"></i> <span class="text">Cài đặt</span></a></li>
    <li class=""><a title="" href="{{ url('logout') }}"><i class="icon icon-share-alt"></i> <span class="text">Đăng xuất</span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Tìm kiếm..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->