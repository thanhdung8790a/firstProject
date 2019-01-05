@extends('layouts.adminLayout.admin_design')
@section('content')

<!--main-container-part-->

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Sản phẩm</a> </div>
    <h1>Danh sách sản phẩm</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Danh sách sản phẩm</h5>
          </div>
          <div class="widget-content nopadding">
            @if ($message = Session::get('flash_message_error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong>
            </div>
            @endif
            @if ($message = Session::get('flash_message_success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong>
            </div>
            @endif

            @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Danh mục</th>
                  <th>Tên</th>
                  <th>Mã sản phẩm</th>
                  <th>Màu sắc</th>
                  <th>Giá</th>
                  <th>Hình ảnh đại diện</th>
                  <th>Hành động</th>
                </tr>
              </thead>
              @if(count($products) > 0)
              <tbody>
                @foreach($products as $pro)
                <tr class="gradeX">
                  <td>{{ $pro->id }}</td>
                  <td>{{ $pro->category_name }}</td>
                  <td>{{ $pro->product_name }}</td>
                  <td>{{ $pro->product_code }}</td>
                  <td>{{ $pro->product_color }}</td>
                  <td>{{ $pro->product_price }}</td>                
                  @if(empty($pro->product_image))
                  <td class="center">Chưa có ảnh</td>
                  @else  
                  <td class="center"><img src="/uploads/small/{{ $pro->product_image }}"></td>
                  @endif
                  <td class="center">
                    <div class="fr">
                    <a href="{{ url('/admin/edit-product/'.$pro->id) }}" class="btn btn-primary btn-mini">Sửa</a>
                     | 
                    <a href="{{ url('/admin/delete-product/'.$pro->id) }}" class="btn btn-danger btn-mini" onclick="return confirm('Bạn có muốn xóa sản phẩm này?')">Xóa</a>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
              @else
              <tbody>
                <h3>Không có dữ liệu</h3>
              </tbody>
              @endif
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--end-main-container-part-->

@endsection