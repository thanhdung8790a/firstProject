@extends('layouts.adminLayout.admin_design')
@section('content')

<!--main-container-part-->

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="{{ url('admin/product') }}" class="current">Sản phẩm</a> </div>
    <h1>Thêm mới sản phẩm</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Thêm mới sản phẩm</h5>
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
              <form class="form-horizontal" method="post" action="{{ url('admin/edit-product/'.$product_detail->id) }}" name="add_category" id="add_category" novalidate="novalidate" enctype="multipart/form-data">{{ csrf_field() }}
              <div class="control-group">
              <label class="control-label">Chọn danh mục</label>
              <div class="controls">
                <select name="category_id" style="width: 220px;">
                  <?php echo $categories_dropdow; ?>
                </select>
              </div>
              </div>
              <div class="control-group">
                <label class="control-label">Tên danh sản phẩm</label>
                <div class="controls">
                  <input type="text" name="product_name" id="product_name" placeholder="Tên danh mục" value="{{ $product_detail->product_name }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Mã sản phẩm</label>
                <div class="controls">
                  <input type="text" name="product_code" id="product_code" placeholder="Mã sản phẩm" value="{{ $product_detail->product_code }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Màu sắc</label>
                <div class="controls">
                  <input type="text" name="product_color" id="product_color" placeholder="Màu sắc của sản phẩm" value="{{ $product_detail->product_color }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Mô tả</label>
              <div class="controls">
                <textarea class="textarea_editor span12" rows="6" name="product_desc" id="product_desc" placeholder="Enter text ...">{{ $product_detail->product_desc }}</textarea>
              </div>
              </div>
              <div class="control-group">
                <label class="control-label">Giá sản phẩm</label>
                <div class="controls">
                  <input type="text" name="product_price" id="product_price" placeholder="Giá sản phẩm: 900" value="{{ $product_detail->product_price }}">
                </div>
              </div>
              <div class="control-group">
              <label class="control-label">Chọn ảnh đại diện</label>
              <div class="controls">
                <input type="hidden" value="{{ $product_detail->product_image }}" name="product_image">
                <div class="uploader" id="uniform-undefined"><input type="file" name="filename" size="19" style="opacity: 0;"><span class="filename">Chưa có file nào được chọn</span><span class="action">Chọn File</span></div>
              </div>
              <div class="controls" style="width: 300px;">
              @if($product_detail->product_image)
                <img src="/uploads/thumbnail/{{ $product_detail->product_image }}" style="" alt="">
              @endif
             </div>
            </div>
              <div class="form-actions">
                <div class="control-label">
                  <input type="reset" value="làm mới" class="btn btn-primary">
                </div>
                <div class="control-label">
                 <input type="submit" value="Cập nhật" class="btn btn-success"> 
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