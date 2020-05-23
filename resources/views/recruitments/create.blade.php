@extends('layouts.app')

@section('content')
 <p>recruitments.createです</p>
 <p>{{ $farm->name }}の案件作成</p>
 
 <form action='{{ route('farms.recruitments.store', ['farm' => $farm->id]) }}' method='POST'>
    @csrf
      <div class="form-group text-center">
        <label for="exampleFormControlInput1">案件名</label>
        <input id="name" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
              @error('title')
                  <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                  </span>
              @enderror
      </div>
    
      <div class="form-group text-center">
        <label for="exampleFormControlTextarea1">農園概要</label>
        <textarea class="form-control @error('summary') is-invalid @enderror" id="exampleFormControlTextarea1" name='summary'　value="{{ old('summary') }}"　required autocomplete="summary" rows="3"></textarea>
              @error('summary')
                  <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                  </span>
              @enderror
      </div>
    
      <div class="form-group text-center">
        <label for="exampleFormControlTextarea1">仕事内容</label>
        <textarea class="form-control @error('content') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" name='content'></textarea>
              @error('content')
                  <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                  </span>
              @enderror
      </div>
    
      <div class="form-group text-center">
        <label for="exampleFormControlSelect1">求人公開状況　0 = 公開中　1 = 非公開</label>
        <input class="form-control @error('status') is-invalid @enderror" type="text" name='status'>
              @error('status')
                  <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                  </span>
              @enderror
       </div>
              
      <div class="form-group text-center">
        <button type="submit" class="btn btn-primary">求人を登録</button>
      </div>
  </form>
@endsection