<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="active"><a href="index.html"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <?php $current_user = Session::get('user_session'); ?>
    @if($current_user->hasAnyRole(['admin', 'supper admin']) == 1)
    <li class="submenu"> <a href="{{ url('admin/user') }}"><i class="icon icon-th-list"></i> <span>Tài khoản</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{ url('admin/add-user') }}">Thêm mới</a></li>
        <li><a href="{{ url('admin/user') }}">Danh sách tài khoản</a></li>
      </ul>
    </li>
    @endif
    <li class="submenu"> <a href="{{ url('admin/category') }}"><i class="icon icon-th-list"></i> <span>Danh mục</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{ url('admin/add-category') }}">Thêm mới</a></li>
        <li><a href="{{ url('admin/category') }}">Danh sách danh mục</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="{{ url('admin/product') }}"><i class="icon icon-pencil"></i> <span>Sản phẩm</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{ url('admin/add-product') }}">Thêm mới</a></li>
        <li><a href="{{ url('admin/product') }}">Danh sách sản phẩm</a></li>
      </ul>
    </li>
  </ul>
</div>
<!--sidebar-menu-->