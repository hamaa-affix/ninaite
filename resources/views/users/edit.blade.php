@extends('layouts.app')

@section('content')
<div class="card text-center">
    <div class="card-header">
    　　プロフィール編集
    </div>
    <div class="card-body">
        <form method='POST' action='{{ route('users.update', ['user' => $user->id]) }}'>
          @csrf
          <input type='hidden' name='_method' value='PUT'>
          <h5 class="card-title">{{ $user->name }}</h5>
          <div class="form-group">
          <label for="exampleInputPassword1">email</label>
          <input type="email" class="form-control text-center" name='email' id="exampleInputPassword1" placeholder="{{ $user->email }}">
          </div>
          <button type="submit" class="btn btn-success">編集内容で登録</button>
        </form>
    </div>
</div>
@endsection
