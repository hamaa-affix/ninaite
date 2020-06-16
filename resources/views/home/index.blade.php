@extends('layouts.app')

@section('content')

   <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: First slide"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#555" dy=".3em">First slide</text></svg>
        </div>
        <div class="carousel-item">
          <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Second slide"><title>Placeholder</title><rect width="100%" height="100%" fill="#666"/><text x="50%" y="50%" fill="#444" dy=".3em">Second slide</text></svg>
        </div>
        <div class="carousel-item">
          <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Third slide"><title>Placeholder</title><rect width="100%" height="100%" fill="#555"/><text x="50%" y="50%" fill="#333" dy=".3em">Third slide</text></svg>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
  </div>
  <hr>
    
  <div class="row">
      <div class="col-4 ml-4 ">
          <form class="form-inline" method="get" action="{{ route('recruitments.search') }}">
            @csrf
              <div class="form-group">
                  <div class="col-auto">
                       <i class="fas fa-search h5 text-body"></i>
                  </div>
                  <input type="text" name="search" value="" class="form-control" placeholder="">
              </div>
                  <input type="submit" value="検索" class="btn btn-success">
          </form>
          
          <br>
          <ul class="list-unstyled justify-content-center">
            @foreach($keywords as $keyword)
              <li>
                  <a class="text-success" href="">
                      <i class="fas fa-tag fa-lg"><span class="badge badge-pill badge-success">{{ $keyword->value }}</span></i>
                  </a>
              </li>
            @endforeach
          </ul>
      </div>
      
      <div class="col-6">
        @if (isset( $seach_result))
            <h5>{{ $seach_result }}</h5>
        @endif
        
        @if ($recruitments->count() >0)
            @foreach($recruitments as $recruitment)
             <div class="row">
                <div class="col-md-7">
                  <a href="{{ route('farms.recruitments.show', ['farm' => $recruitment->farm_id, 'recruitment' => $recruitment->id]) }}">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
                  </a>
                  <hr>
                </div>
                <div class="col-md-5">
                  <h3>{{ $recruitment->summary}}</h3>
                  <p>{{ $recruitment->content }}</p>
                  <a class="btn btn-success" href="{{ route('farms.recruitments.show', ['farm' => $recruitment->farm_id, 'recruitment' => $recruitment->id]) }}">詳細をみる</a>
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
