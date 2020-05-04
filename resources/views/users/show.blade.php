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
    <a href="/users/edit/{{ $user->id }}" class="btn btn-primary">プロフィール編集</a>
    
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
    
   <a href="{{ route('farms.create', ['id' => $user->id ]) }}" class="btn btn-primary">農園を作る</a>
  </div>
</div>
@endsection
