@extends('layouts.app')

@section('content')
　users詳細画面です。
<div class="card">
  <div class="card-header">
    プロフィール
  </div>
  
  <div class="card-body"  id='app'>
    <h5 class="card-title">{{ $user->name }}</h5>
    <p class="card-text">メールアドレス</p>
    <p class="card-text">{{ $user->email }}</p>
    <a href="{{route('users.edit', ['id' => $user->id]) }}" class="btn btn-primary">プロフィール編集</a>
    
    <form method='POST' action='{{route('users.destroy', ['id' => $user->id]) }}'>
        @csrf
        <input type='hidden' name='_method' value='DELETE'>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            プロフィールの削除
        </button>
        
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">プロフィールの削除</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    　　本当に削除しますか？
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                      <button type="submit" class="btn btn-primary">削除</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    <a href="{{ route('farms.create') }}" class="btn btn-primary">農園を作る</a>
    <div>
      @foreach($user->farms()->get() as $farmData)
        <div class="card-group">
          <div class="card">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text></svg>
            <div class="card-body">
              <h5 class="card-title">{{$farmData->name }}</h5>
              　<p class="card-text">{{$farmData->address1}}</p>
              　<p class="card-text">{{$farmData->address2}}</p>
              　<p class="card-text">{{$farmData->address3}}</p>
              　<p class="card-text">{{$farmData->tel}}</p>
              　<p class="card-text">{{$farmData->site_url}}</p>
              　<p class="card-text">{{$farmData->summary}}</p>
              　<p class="card-text">{{$farmData->content}}</p>
              <a class="btn btn-primary" href="{{ route('farms.edit', ['id' => $farmData->id]) }}" role="button">詳細へ</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
