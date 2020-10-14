@extends('layouts.app')

@section('content')

<div class="text-center">
    <img src="https://aws-ninaite-prod.s3-ap-northeast-1.amazonaws.com/1-min.png" class="img-fluid  " alt="Responsive image">
</div>
    <hr>
    <div class="row">
        <div class="col-3 ml-5 ">
            <form class="form-inline" method="get" action="{{ route('recruitments.search') }}">
                @csrf
                <div class="form-group">
                    <input type="text" name="search" value="" class="form-control" placeholder="search">
                </div>
                <button type="submit" class="btn btn-outline-success"><i class="fas fa-leaf">検索</i></button>
            </form>
        <hr>
        <div class="mt-4">
            <a class="text-success" href="{{route('farms.index')}}"><i class="fas fa-seedling">農園一覧をみる</i></a>
        </div>
        <div class="mt-4">
            <a class="text-success" href="{{ route('recruitments.index') }}"><i class="fas fa-seedling">案件一覧をみる</i></a>
        </div>
        <hr>
        <div class="">
            <p><strong>キーワード検索</strong></p>
        </div>
        <ul class="list-unstyled justify-content-center">
        @foreach($keywords as $keyword)
            <li class="mb-3">
                <a class="text-success" href="{{ route('keywords.search_tags', ['keyword' => $keyword->id]) }}">
                    <i class="fas fa-leaf">{{ $keyword->value }}</i>
                </a>
            </li>
        @endforeach
        </ul>
    </div>

    <div class="col-7">
        @if (isset( $seach_result))
            <h5>{{ $seach_result }}</h5>
        @endif

        @if ($recruitments->count() >0)
            @foreach($recruitments as $recruitment)
                <div class="row">
                    <div class="col-md-7">
                        <a href="{{ route('farms.recruitments.show', ['farm' => $recruitment->farm_id, 'recruitment' => $recruitment->id]) }}">
                        <img class="img-fluid rounded mb-3 mb-md-0" src="{{$recruitment->img_name}}" alt="">
                        </a>
                        <hr>
                    </div>
                    <div class="col-md-5">
                        <h3>{{ $recruitment->summary }}</h3>
                        <p>{{ $recruitment->content }}</p>
                        <a class="btn btn-success" href="{{ route('farms.recruitments.show', ['farm' => $recruitment->farm_id, 'recruitment' => $recruitment->id]) }}">
                        <i class="fas fa-leaf fa-sx"></i>詳細をみる
                        </a>
                    </div>
                </div>
                <br>
            @endforeach
                {{ $recruitments->links('vendor.pagination.bootstrap-4') }}
        @else
            <h5>該当の案件は見つかりませんでした</h5>
            <a class='text-success' href="{{ route('home.index') }}">
            <i class="fas fa-home">ホームへ戻る</i>
            </a>
        @endif
    </div>
</div>

@endsection
