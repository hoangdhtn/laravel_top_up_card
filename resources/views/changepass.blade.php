@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('ADMIN') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <p>{{ __('Chào mừng bạn đến ADMIN!') }}</p>
                    <a href="{{URL::to('/home')}}"><button type="button" class="btn btn-primary">Quay lại trang chủ</button></a>
                </div>
            </div>
            <div class="card-body">

                @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                    @php
                    Session::forget('success');
                    @endphp
                </div>
                @endif

                @if(Session::has('fail'))
                <div class="alert alert-danger">
                    {{Session::get('fail')}}
                    @php
                    Session::forget('fail');
                    @endphp
                </div>
                @endif


                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="POST" action="{{URL::to('/home/setpass/' . $data->id)}}">
                    @csrf
                    @method('PUT')
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nhập mật khẩu cũ</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="old_pass">
                    
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mật khẩu mới</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="" name="new_pass">
                </div>
                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </form>
        </div>

    </div>
</div>
@endsection
