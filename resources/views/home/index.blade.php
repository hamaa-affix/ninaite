@extends('layouts.app')

@section('content')
  
  <div class="text-center">
      <img src="https://aws-ninaite-infra.s3.us-east-2.amazonaws.com/%E3%81%97%E3%81%A3%E3%81%A8%E3%82%8A%E4%BF%9D%E6%B9%BF%E3%82%BF%E3%82%A4%E3%83%95%E3%82%9A+%E3%83%8D%E3%83%AD%E3%83%AA+500ml.png" class="img-fluid  " alt="Responsive image">
  </div>
  
  <hr>
    
  <div class="row">
      <div class="col-3 ml-5 ">
          <form class="form-inline" method="get" action="{{ route('recruitments.search') }}">
            @csrf
              <div class="form-group">
                  <div class="col-auto">
                      <i class="fas fa-search fa-2x	"></i>
                  </div>
                  <input type="text" name="search" value="" class="form-control" placeholder="">
              </div>
                  <input type="submit" value="検索" class="btn btn-success">
          </form>
          <hr>
          <div class="mt-4">
            <a class="text-success" href="{{route('farms.index')}}"><i class="fas fa-leaf">農園一覧をみる</i></a>
          </div>
          
          <div class="mt-4">
             <a class="text-success" href="{{ route('recruitments.index') }}"><i class="fas fa-leaf">案件一覧をみる</i></a>
          </div>
          <hr>
          <div class="">
              <p><strong>キーワード検索</strong></p>
          </div>
          <ul class="list-unstyled justify-content-center">
            @foreach($keywords as $keyword)
              <li>
                  <a class="text-success" href="{{ route('keywords.search_tags', ['keyword' => $keyword->id]) }}">
                      <i class="fas fa-tag fa-lg"><span class="badge badge-pill badge-success">{{ $keyword->value }}</span></i>
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
