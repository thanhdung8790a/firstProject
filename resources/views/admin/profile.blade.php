@extends('layouts.adminLayout.admin_design')
@section('content')
    <!--main-container-part-->
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="{{ url('admin/profile') }}" class="current">Thông tin tài khoản</a> </div>
            <h1>Thông tin tài khoản {{$current_user->display_name}}</h1>
        </div>
        <div class="container-fluid"><hr>
            <div class="row-fluid">
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
                                <strong>Lỗi!</strong> Có vấn đề xảy ra với đầu vào của bạn.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="container emp-profile">
                            <form action="{{url('/admin/update-thumbnail')}}" method="post" enctype="multipart/form-data">{{ csrf_field() }}
                                <input type="hidden" name="user_id" value="{{$current_user->id}}">
                                <input type="hidden" value="{{ $current_user->image }}" name="user_image">
                                <div class="row">
                                    <div class="span4">
                                        <div class="profile-img" style="width: 275px;">
                                            <div style="width: 273px; height: 255px; overflow: hidden; border: 1px solid #333333">
                                                @if(!empty($current_user->image))
                                                    <img style="width: 273px; height: 255px;" src="/uploads/users/thumbnail/{{ $current_user->image }}" alt="no-avatar"/>
                                                @else
                                                    <img style="width: 273px; height: 255px;" src="/uploads/users/thumbnail/no-avatar.png" alt="no-avatar"/>
                                                @endif
                                            </div>
                                            <div class="controls" style="text-align: center; background: #222;">
                                                <div class="uploader" id="uniform-undefined"><input type="file" name="file_user_image" size="19" style="opacity: 0;"><span class="file_user_image">Chưa có file nào được chọn</span><span class="action">Chọn File</span></div>
                                            </div>
                                        </div>
                                        <div style="margin: 10px 0;">
                                            <input class="btn btn-primary" type="submit" value="Cập nhật avatar" style="margin-right: 10px;" title="Cập nhật avatar" />
                                            <a class="btn btn-inverse" href="{{ url('admin/deleteUserImage/'.$current_user->id) }}" title="Xóa ảnh đại diện">Xóa ảnh đại diện</a>
                                        </div>
                                    </div>
                                    <div class="span6">
                                        <div class="profile-head">
                                            <h5>{{$current_user->display_name}}</h5>
                                            <h6>Web Developer and Designer</h6>
                                            <p class="proile-rating"><strong>Địa chỉ</strong> : <span>{{$current_user->address}}</span></p>
                                            <p class="proile-rating"><strong>Số điện thoại</strong> : <span>{{$current_user->phone}}</span></p>
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
                                </ul>
                            </div>
                            <div class="widget-content tab-content">
                                <div id="tab1" class="tab-pane active">
                                    <form class="form-horizontal" method="post" action="{{ url('/admin/update-info') }}" name="form_validate" id="form_validate" novalidate="novalidate">{{ csrf_field() }}
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--end-main-container-part-->

@endsection