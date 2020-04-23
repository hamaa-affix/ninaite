@extends('layouts.app')

@section('content')
　top画面です。
　
　@guest
    <a href='#'>ログイン</a>
    <a href='#'>新規登録</a>
  @else
    <a href='#'>ログアウト</a>
    <a href='{{ route('users.index')}}'>プロフィール編集</a>
  @endguest
  
@endsection
