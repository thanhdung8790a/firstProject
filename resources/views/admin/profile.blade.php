@extends('layouts.adminLayout.admin_design')
@section('content')
    <!--main-container-part-->
    @if(Session::get('user_session'))
        <?php $current_user = Session::get('user_session'); //echo $current_user; die; ?>
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="{{ url('admin/profile') }}" class="current">Thông tin tài khoản</a> </div>
            <h1>Thông tin tài khoản {{$current_user->display_name}}</h1>
        </div>
        <div class="container-fluid"><hr>
            <div class="row-fluid">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="container emp-profile">
                            <form method="post">
                                <div class="row">
                                    <div class="span4">
                                        <div class="profile-img">
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                                            <div class="file btn btn-lg btn-primary">
                                                Thay đổi ảnh đại diện
                                                <input type="file" name="file"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="span6">
                                        <div class="profile-head">
                                            <h5>
                                                Kshiti Ghelani
                                            </h5>
                                            <h6>
                                                Web Developer and Designer
                                            </h6>
                                            <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab1">Cập nhật thông tin</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab2">Cập nhật mật khẩu</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab3">Cập nhật quyền truy cập</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab4">Cập nhật ảnh đại diện</a></li>
                                </ul>
                            </div>
                            <div class="widget-content tab-content">
                                <div id="tab1" class="tab-pane active">
                                    <form class="form-horizontal" method="post" action="{{ url('/admin/update-info') }}" name="" id="" novalidate="novalidate">{{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{$current_user->id}}">
                                        <div class="control-group">
                                            <label class="control-label">Tên hiện thị </label>
                                            <div class="controls">
                                                <input type="text" value="{{$current_user->display_name}}" name="display_name" id="display_name" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Họ và tên</label>
                                            <div class="controls">
                                                <input type="text" value="{{$current_user->fullname}}" name="fullname" id="fullname" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Hòm thư</label>
                                            <div class="controls">
                                                <input type="text" value="{{$current_user->email}}" name="email" id="email" disabled="true" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Địa chỉ</label>
                                            <div class="controls">
                                                <input type="text" value="{{$current_user->address}}" name="address" id="address" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Số điện thoại</label>
                                            <div class="controls">
                                                <input type="text" value="{{$current_user->phone}}" name="phone" id="phone" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label"></label>
                                            <div class="controls">
                                                <input type="submit" value="Cập nhật" class="btn btn-success">
                                            </div>
                                        </div>
                                    </form>
                                    @endif
                                </div>
                                <div id="tab2" class="tab-pane">

                                    <form class="form-horizontal" method="post" action="{{ url('/admin/update-pwd') }}" name="password_validate" id="password_validate" novalidate="novalidate">{{ csrf_field() }}
                                        <div class="control-group">
                                            <label class="control-label">mật khẩu hiện tại</label>
                                            <div class="controls">
                                                <input type="password" name="current_pwd" id="current_pwd" />
                                                <span id="chkPwd"></span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Mật khẩu mới</label>
                                            <div class="controls">
                                                <input type="password" name="new_pwd" id="new_pwd" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Nhập lại mật khẩu</label>
                                            <div class="controls">
                                                <input type="password" name="confirm_pwd" id="confirm_pwd" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label"></label>
                                            <div class="controls">
                                                <input type="submit" value="Cập nhật" class="btn btn-success">
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <div id="tab3" class="tab-pane">
                                    <p>full of waffle to pad out the comment. Usually, you just wish these sorts of comments would come to an end.multiple paragraphs and is full of waffle to pad out the comment. Usually, you just wish these sorts of comments would come to an end. </p>
                                </div>
                                <div id="tab4" class="tab-pane">
                                    <form class="form-horizontal" method="post" action="{{ url('/admin/update-thumbnail') }}" name="" id="" novalidate="novalidate" enctype="multipart/form-data">{{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{$current_user->id}}">
                                        <div class="control-group">
                                            <label  class="control-label">Chọn ảnh đại diện</label>
                                            <div class="controls">
                                                <div class="uploader" id="uniform-undefined">
                                                    <input type="hidden" value="{{ $current_user->image }}" name="user_image">
                                                    <input type="file" name="filename" size="19" style="opacity: 0;">
                                                </div>
                                                <img style="width: 40px;" src="/uploads/thumbnail/{{ $current_user->image }}" style="" alt="">
                                                <a class="btn btn-inverse btn-mini" href="{{ url('admin/deleteUserImage/'.$current_user->id) }}">Xóa ảnh đại diện</a>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label"></label>
                                            <div class="controls">
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
    </div>

    <!--end-main-container-part-->

@endsection