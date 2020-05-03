@extends('layouts.app')

@section('content')
　top画面です。
　
　@guest
 <p>まだログインしてないよ</p>
  @else
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
    
    
<div class="row">
  <div class="col-12">
    <a href="users/show/{{ Auth::user()->id }}">プロフィール編集</a>
  </div>
  
  <div class="col-4 ml-4">
      <h1>サイド</h1>
      <p>メニューとか</p>
      <form class="form-inline" action="">
          <div class="form-group">
              <input type="text" name="keyword" value="" class="form-control" placeholder="">
          </div>
              <input type="submit" value="検索" class="btn btn-info">
      </form>
  </div>
  
  <div class="col-4">
      <h1>コンテンツ</h1>
      <p>コンテンツ内容</p>
      <div></div>
  </div>
</div>

  @endguest
  
@endsection
