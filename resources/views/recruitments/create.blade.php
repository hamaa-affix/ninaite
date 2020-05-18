@extends('layouts.app')

@section('content')
 <p>recruitments.createです</p>
 <p>{{ $farm->name }}の案件作成</p>
 <form　metod='post' action='{{ route('farms.recruitments.store', ['farm' => $farm->id] ) }}'> 
   @csrf
    <div class="form-group text-center">
      <label for="exampleFormControlInput1">案件名</label>
      <input class="form-control" type="text" name='title'>
      @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
      @enderror
    </div>
    
    <div class="form-group text-center">
      <label for="exampleFormControlTextarea1">農園概要</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name='summary'></textarea>
      @error('summary')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
      @enderror
    </div>
    
    <div class="form-group text-center">
      <label for="exampleFormControlTextarea1">仕事内容</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name='content'></textarea>
      @error('content')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
      @enderror
    </div>
    
    <div class="form-group text-center">
      <label for="exampleFormControlSelect1">求人公開状況</label>
      <select class="form-control" id="exampleFormControlSelect1"　name='status'>
        <option>0</option>
        <option>1</option>
      </select>
      @error('status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary ">求人を登録</button>
</form>
@endsection