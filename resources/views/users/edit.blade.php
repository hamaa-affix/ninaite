@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body text-center">
                  <h5 class = "card-title font-weight-bolder" >プロフィール編集</h5 > 
                  <form method='POST' action='{{ route('users.update', ['user' => $user->id]) }}'>
                      @csrf
                      <input type='hidden' name='_method' value='PUT'>
                      <h5 class="card-title">{{ $user->name }}</h5>
                      <div class="form-group">
                          <label for="exampleInputPassword1"><i class="fas fa-seedling" style="color: limegreen" ></i>emailを変更する</label>
                          <input type="email" class="form-control text-center" name='email' id="exampleInputPassword1" placeholder="{{ $user->email }}">
                      </div>
                      <button type="submit" class="btn btn-success"><i class="fas fa-leaf">編集内容で登録</i></button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
