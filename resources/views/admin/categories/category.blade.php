@extends('layouts.adminLayout.admin_design')
@section('content')

<!--main-container-part-->

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="{{ url('admin/add-category') }}" class="current">Danh mục</a> </div>
    <h1>Danh sách danh mục</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Danh sách danh mục</h5>
            </div>
            <div class="widget-content nopadding">
            @if (count($cats) > 0)
              @foreach ($cats as $cat)
                <li>{{$cat->id}}</li>
                <li><img src="/uploads/thumbnail/{{$cat->url}}" /></li>
              @endforeach
            @else
              khong co du lieu
            @endif
            </div>
          </div>
        </div>
    </div>
  </div>
</div>

<!--end-main-container-part-->

@endsection