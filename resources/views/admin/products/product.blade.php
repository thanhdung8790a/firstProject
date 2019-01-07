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
        <div id="chkDeleteProducts"></div>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Danh sách sản phẩm</h5>
          </div>
          <div class="widget-content nopadding">
            <table id="tblProduct" class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Chọn</th>
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
                  <td><input type="checkbox" class="call-checkbox" name="product_id[]" value="{{ $pro->id }}"></td>
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
                  <td class="center" style="width: 130px;">
                    <a href="#myModal{{ $pro->id }}" data-toggle="modal" class="btn btn-mini btn-success">Xem</a>
                     |
                    <a href="{{ url('/admin/edit-product/'.$pro->id) }}" class="btn btn-mini btn-primary btn">Sửa</a>
                     | 
                    <a rel1="{{ $pro->id }}" rel2="delete-product" href="javascript:" class="btn btn-mini btn-danger deleteRecord">Xóa</a>
                  </td>
                </tr>
                <div id="myModal{{ $pro->id }}" class="modal hide">
                  <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <h3>Chi tiết sản phẩm: {{ $pro->product_name }}</h3>
                  </div>
                  <div class="modal-body">
                    <p>Danh mục:{{ $pro->category_name }}</p>
                    <p>Mã code:{{ $pro->product_code }} </p>
                    <p>Mô tả:{{ str_limit(strip_tags($pro->product_desc), 200) }} </p>
                    <p>Màu sắc:{{ $pro->product_color }}</p>
                    <p>Giá:{{ $pro->product_price }} </p>
                    <p>Ảnh:<img src="/uploads/small/{{ $pro->product_image }}"> </p>
                  </div>
                </div>
                @endforeach
              </tbody>
              @else
              <tbody>
                <h3>Không có dữ liệu</h3>
              </tbody>
              @endif
            </table>
            <div class="control-group" style="margin: 10px 10px;">
              <div class="controls">
                <a class="btn btn-danger deleteChoceProduct" href="javascript:">Xóa sản phẩm được chọn</a>
                |
                <a class="btn btn-danger deleteChoceProduct" href="javascript:">Xóa tất cả sản phẩm</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--end-main-container-part-->

@endsection