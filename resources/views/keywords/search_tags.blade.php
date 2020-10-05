@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row justify-content-center">
         @foreach($searchRecruitments as $recruitment)
          <div class="col-md-8">
              <a href="{{ route('farms.recruitments.show', ['farm' => $recruitment->farm_id, 'recruitment' => $recruitment->id]) }}">
                  <img class="img-fluid rounded mb-3 mb-md-0" src="{{ $recruitment->img_name }}" alt="">
              </a>
              <hr>
          </div>
          <div class="col-md-5">
              <h3>{{ $recruitment->summary }}</h3>
              <p>{{ $recruitment->content }}</p>
              <a class="btn btn-success" href="{{ route('farms.recruitments.show', ['farm' => $recruitment->farm_id, 'recruitment' => $recruitment->id]) }}">詳細をみる</a>
          </div>
        @endforeach
      </div>
      <div >
          <a class='d-flex justify-content-center text-success' href="{{ route('home.index') }}">
            <i class="fas fa-home">ホームへ戻る</i>
          </a>
      </div>
  </div>
@endsection
