@extends('layouts.app')

@section('content')
<h1>編集画面</h1>
<form method='POST' action='{{ route('users.update', ['id' => $user->id]) }}'>
  @csrf
  <input type='hidden' name='_method' value='PUT'>
  <h5 class="card-title">{{ $user->name }}</h5>
  <div class="form-group">
    <label for="exampleInputPassword1">email</label>
    <input type="email" class="form-control" name='email' id="exampleInputPassword1" placeholder="{{ $user->email }}">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
