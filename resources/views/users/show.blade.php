@extends('layouts.app')

@section('content')
　users詳細画面です。
<div class="card text-center">
  <div class="card-header">
    プロフィール
  </div>
  
  <div class="card-body"  id='app'>
    <h5 class="card-title">{{ $user->name }}</h5>
    <p class="card-text">メールアドレス</p>
    <p class="card-text">{{ $user->email }}</p>
    <a href="{{route('users.edit', ['user' => $user->id]) }}" class="btn btn-primary">プロフィール編集</a>
    <form method='POST' action='{{route('users.destroy', ['user' => $user->id]) }}'>
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
  </div>
</div>

@foreach($user->farms()->get() as $farmData)
  <div class="row">
    <div class="col-sm-12">
        <div class="card text-center " style="width: 100%;">
            <div class="card-body">
                <h5 class="card-title">農園名</h5>
                <p class="card-text">{{ $farmData->name }}</p>
                <h5 class="card-title">郵便番号</h5>
                <p class="card-text">{{ $farmData->address1 }}</p>
                <h5 class="card-title">都道府県</h5>
                <p class="card-text">{{ $farmData->address2 }}</p>
                <h5 class="card-title">番地、マンション名</h5>
                <p class="card-text">{{ $farmData->address3 }}</p>
                <h5 class="card-title">電話番号</h5>
                <p class="card-text">{{ $farmData->tel }}</p>
                <h5 class="card-title">サイトurl</h5>
                <p class="card-text">{{ $farmData->site_url }}</p>
                <h5 class="card-title">概要</h5>
                <p class="card-text">{{ $farmData->summary }}</p>
                <h5 class="card-title">コンテンツ</h5>
                <p class="card-text">{{ $farmData->content }}</p>
                <a href="{{ route('farms.show', ['farm' => $farmData->id]) }}" class="card-link">詳細へ</a>
                <br>
                <a href="{{ route('recruitments.create') }}" class="card-link">案件を作る</a>
            </div>
        </div>
    </div>
  </div>
@endforeach
@endsection
