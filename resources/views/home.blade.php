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
                    <a href="{{URL::to('/home/changepass/' . Auth::user()->id)}}"><button type="button" class="btn btn-primary">Đổi mật khẩu Admin</button></a>
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
                <table class="table">
                  <thead>
                    <tr>
                        <th scope="col">ID Game</th>
                        <th scope="col">Loại thẻ</th>
                        <th scope="col">Mệnh giá</th>
                        <th scope="col">Se-ri</th>
                        <th scope="col">Mã thẻ</th>
                        <th scope="col">Tình trạng</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($paginator as $key => $data)
                    <tr>
                      <th scope="row">{{$data->id_game}}</th>
                      <td>{{$data->loai_the}}</td>
                      <td>{{number_format($data->menh_gia)}}</td>
                      <td>{{$data->seri}}</td>
                      <td>{{$data->ma_the}}</td>
                      <td>
                        @if($data->status == 1)
                        <p style="color: green;">Đã duyệt <a href="{{URL::to('/napthe/vohieu/' . $data->id)}}">Thay đổi</a></p>
                        @else
                        <p style="color: red;">Chưa duyệt <a href="{{URL::to('/napthe/kichhoat/' . $data->id)}}">Thay đổi</a></p>
                        @endif

                    </td>
                    <td>
                      <a href="{{URL::to('/home/delete/' . $data->id)}}" class="btn btn-danger">Xóa</a>
                  </td>
              </tr>
              @endforeach
          </tbody>
      </table>
@if (isset($paginator) && $paginator->lastPage() > 1)

    <ul class="pagination">

        <?php
        $interval = isset($interval) ? abs(intval($interval)) : 3 ;
        $from = $paginator->currentPage() - $interval;
        if($from < 1){
            $from = 1;
        }

        $to = $paginator->currentPage() + $interval;
        if($to > $paginator->lastPage()){
            $to = $paginator->lastPage();
        }
        ?>

        <!-- first/previous -->
        @if($paginator->currentPage() > 1)
            <li>
                <a href="{{ $paginator->url(1) }}" aria-label="First" class="page-link">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

            <li>
                <a href="{{ $paginator->url($paginator->currentPage() - 1) }}" aria-label="Previous" class="page-link">
                    <span aria-hidden="true">&lsaquo;</span>
                </a>
            </li>
        @endif

        <!-- links -->
        @for($i = $from; $i <= $to; $i++)
            <?php 
            $isCurrentPage = $paginator->currentPage() == $i;
            ?>
            <li class="{{ $isCurrentPage ? 'active' : '' }}">
                <a href="{{ !$isCurrentPage ? $paginator->url($i) : '#' }}" class="page-link">
                    {{ $i }}
                </a>
            </li>
        @endfor

        <!-- next/last -->
        @if($paginator->currentPage() < $paginator->lastPage())
            <li>
                <a href="{{ $paginator->url($paginator->currentPage() + 1) }}" aria-label="Next" class="page-link">
                    <span aria-hidden="true">&rsaquo;</span>
                </a>
            </li>

            <li>
                <a href="{{ $paginator->url($paginator->lastpage()) }}" aria-label="Last" class="page-link">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        @endif

    </ul>

@endif
  </div>

</div>
</div>
@endsection
