@extends('layouts.app')

@section('content')
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-body">
                  <h5 class = "card-title font-weight-bolder" >農業案件の詳細</h5 > 
                  <hr>
                    <div class="form-group text-center">
                      <ul class="list-group list-group-flush">
                          <li class="list-group-item"><span><i class="fas fa-seedling" style="color: limegreen" ></i><strong>農園名</strong></span>&emsp;{{ $recruitment->farm()->name }}</li>
                          <li class="list-group-item"><span><i class="fas fa-seedling" style="color: limegreen" ></i><strong>案件名</strong></span>&emsp;{{ $recruitment->title }}</li>
                          <li class="list-group-item"><span><i class="fas fa-seedling" style="color: limegreen" ></i><strong>農園の概要</strong></span>&emsp;{{ $recruitment->summary }}</li>
                          <li class="list-group-item overflow-auto"><span><i class="fas fa-seedling" style="color: limegreen" ></i><strong>案件内容</strong></span>&emsp;{{ $recruitment->content }}</li>
                        @if($recruitment->stuas === 0)
                          <li class="list-group-item">募集中</li>
                        @else
                          <li class="list-group-item">現在募集をしておりません</li>
                        @endif
                      </ul>
                      
                     <div class="text-center">
                          <img class="img-fluid rounded mb-3 mb-md-0" src="/storage/images/{{$recruitment->img_name}}" alt="">
                          <hr>
                      </div>
                      

                       <div class="row justify-content-center mt-3">
                         @if($recruitment->isEditable(Auth::id()))
                          <a href="{{ route('farms.recruitments.edit', ['farm' => $recruitment->farm_id, 'recruitment' => $recruitment->id]) }}"  class="btn btn-success mr-2">編集する</a>
                         @endif
                        </div>
                          @foreach($recruitment->farm()->users()->get() as  $farm_user )
                          <form action='{{ route('chat_rooms.create_chat_room', ['user' => Auth::id() ]) }}' method='POST'>
                             @csrf
                              <div class="form-group text-center">
                                  <input id="name"  class="form-control text-center mt-3" type="hidden" name="user_id" value="{{ $farm_user->id }}" required autocomplete="" autofocus>
                              </div>
                              <button type="submit" class="btn btn-success mt-3"><i class="fas fa-leaf"></i>農家とコンタクトをとる</button>
                          </form>
                          @endforeach
                      <br>
                      
                      <h4><i class="fas fa-tag" style="color: limegreen"></i>関連付いているキーワード</h4>
                      @foreach($recruitment->keywords()->get() as $keyword)
                        <div class="d-inline-block">
                          <p><i class="fas fa-seedling" style="color: limegreen" ></i>{{ $keyword->value }}</p>
                        </div>
                      @endforeach
                      
                      @if($recruitment->isEditable(Auth::id()))
                      <div class="row justify-content-center mt-3">
                        <a href="{{ route('keywords.edit', ['id' => $recruitment->id]) }}"  class="btn btn-success mr-2">キーワードを編集する</a>
                        <a href="{{ route('recruitments.keywords.create', ['recruitment' => $recruitment->id]) }}"  class="btn btn-success">キーワードを作成する</a>
                      </div>
                      @endif
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection