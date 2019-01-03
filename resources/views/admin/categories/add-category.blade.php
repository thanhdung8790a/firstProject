@extends('layouts.adminLayout.admin_design')
@section('content')

<!--main-container-part-->

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="{{ url('admin/add-category') }}" class="current">Danh mục</a> </div>
    <h1>Thêm mới danh mục</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Thêm mới danh mục</h5>
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
              <form class="form-horizontal" method="post" action="{{ url('admin/add-category') }}" name="add_category" id="add_category" novalidate="novalidate" enctype="multipart/form-data">{{ csrf_field() }}
              <div class="control-group">
                <label class="control-label">Tên danh mục</label>
                <div class="controls">
                  <input type="text" name="cat_name" id="required" placeholder="Tên danh mục" value="">
                </div>
              </div>
              <div class="control-group">
              	<label class="control-label">Mô tả</label>
	            <div class="controls">
	              <textarea class="textarea_editor span12" rows="6" name="cat_desc" id="required" placeholder="Enter text ..."></textarea>
	            </div>
              </div>
              <div class="control-group">
              <label class="control-label">Chọn ảnh đại diện</label>
              <div class="controls">
                <div class="uploader" id="uniform-undefined"><input type="file" name="filename" size="19" style="opacity: 0;"><span class="filename">Chưa có file nào được chọn</span><span class="action">Chọn File</span></div>
              </div>
            </div>
              <div class="form-actions">
              	<input type="reset" value="làm mới" class="btn btn-success">
                <input type="submit" value="Thêm mới" class="btn btn-success">
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