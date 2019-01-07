<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="active"><a href="index.html"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
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
    <li><a href="interface.html"><i class="icon icon-pencil"></i> <span>Eelements</span></a></li>
    <li class="content"> <span>Monthly Bandwidth Transfer</span>
      <div class="progress progress-mini progress-danger active progress-striped">
        <div style="width: 77%;" class="bar"></div>
      </div>
      <span class="percent">77%</span>
      <div class="stat">21419.94 / 14000 MB</div>
    </li>
    <li class="content"> <span>Disk Space Usage</span>
      <div class="progress progress-mini active progress-striped">
        <div style="width: 87%;" class="bar"></div>
      </div>
      <span class="percent">87%</span>
      <div class="stat">604.44 / 4000 MB</div>
    </li>
  </ul>
</div>
<!--sidebar-menu-->