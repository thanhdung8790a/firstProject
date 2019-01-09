@extends('layouts.adminLayout.admin_design')
@section('content')

<!--main-container-part-->

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="{{ url('admin/product') }}" class="current">Thuộc tính sản phẩm</a> </div>
    <h1>Thêm mới thuộc tính sản phẩm</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Sản phẩm</h5>
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
              <form class="form-horizontal" method="post" action="{{ url('admin/add-attributes/'.$product_detail->id) }}" name="add_category" id="add_category" novalidate="novalidate" enctype="multipart/form-data">{{ csrf_field() }}
                <input type="hidden" name="product_id" value="{{ $product_detail->id }}" />
              <div class="control-group">
                <label style="display: block;" class="control-label">Tên danh sản phẩm:</label>
                <div class="controls">
                  <p style="padding-top: 5px;"><strong>{{ $product_detail->product_name }}</strong></p>
                </div>
              </div>
              <div class="control-group">
                <label style="display: block;" class="control-label">Mã sản phẩm:</label>
                <div class="controls">
                  <p style="padding-top: 5px;"><strong>{{ $product_detail->product_code }}</strong></p>
                </div>
              </div>
              <div class="control-group">
                <label style="display: block;" class="control-label">Màu sắc:</label>
                <div class="controls">
                  <p style="padding-top: 5px;"><strong>{{ $product_detail->product_color }}</strong></p>
                </div>
              </div>
                <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                <h5>Thêm mới thuộc tính sản phẩm</h5>
              </div>
              <div class="control-group">
                <div class="field_wrapper">
                    <div>
                        <input type="text" name="sku[]" id="sku" placeholder="SKU" value="" style="width: 120px;" />
                        <select name="size[]" style="width: 120px;">
                          <option selected>Small</option>
                          <option>Medium</option>
                          <option>Large</option>
                        </select>
                        <input type="text" name="price[]" id="price" placeholder="Price" value="" style="width: 120px;" />
                        <input type="text" name="stock[]" id="stock" placeholder="Stock" value="" style="width: 120px;" />
                        <a href="javascript:void(0);" class="add_button btn btn-primary" title="Add field">Thêm</a>
                    </div>
                </div>
              </div>
              <div class="form-actions">
                <div class="control-label">
                  <input type="reset" value="làm mới" class="btn btn-primary">
                </div>
              	<div class="control-label">
                 <input type="submit" value="Thêm mới" class="btn btn-success"> 
                </div>       
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--end-main-container-part-->

@endsection