@extends('layouts.adminLayout.admin_design')
@section('content')

<!--main-container-part-->

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Thư mục</a> </div>
    <h1>Danh sách thư mục</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Danh sách thư mục</h5>
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
                  <th>Thư mục cha</th>
                  <th>Tên thư mục</th>
                  <th>Mô tả</th>
                  <th>Hình ảnh đại diện</th>
                  <th>Hành động</th>
                </tr>
              </thead>
              @if(count($cats) > 0)
              <tbody>
                @foreach($cats as $cat)
                <tr class="gradeX">
                  <td>{{ $cat->id }}</td>
                  <td>{{ $cat->parent_id }}</td>
                  <td>{{ $cat->name }}</td>
                  <td>{{ $cat->description }}</td>
                  @if(empty($cat->url))
                  <td class="center">Chưa có ảnh</td>
                  @else  
                  <td class="center"><img src="/uploads/thumbnail/{{ $cat->url }}"></td>
                  @endif
                  <td class="center">
                    <div class="fr">
                    <a href="{{ url('/admin/edit-category/'.$cat->id) }}" class="btn btn-primary btn-mini">Sửa</a>
                     | 
                    <a href="{{ url('/admin/delete-category/'.$cat->id) }}" class="btn btn-danger btn-mini">Xóa</a>
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