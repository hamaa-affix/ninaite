@extends('layouts.app')

@section('content')
<div>editです</div>
    <form method='post' action='{{ route('farms.update', ['id' => $farmData->id] ) }}'>
      <input type='hidden' name='_method' value='PUT'>
      @csrf
      <div class="form-group">
        <label for="formGroupExampleInput">事業所名</label>
        <input type="text" class="form-control" id="formGroupExampleInput"  name='name' placeholder="{{ $farmData->name }} ">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      
      <div class="form-group">
        <label for="formGroupExampleInput">郵便番号</label>
        <input type="text" class="form-control" id="formGroupExampleInput" name='postal_code'  placeholder="{{ $farmData->postal_code }} ">
        @error('postal_code')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      
      <div class="form-group">
        <label for="formGroupExampleInput">都道府県</label>
        <input type="text" class="form-control" id="formGroupExampleInput"  name='address1' placeholder="{{ $farmData->address1 }} ">
        @error('address1')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      
      <div class="form-group">
        <label for="formGroupExampleInput">市町村</label>
        <input type="text" class="form-control" id="formGroupExampleInput" name='address2'  placeholder="{{ $farmData->address2 }} ">
        @error('address2')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      
      <div class="form-group">
        <label for="formGroupExampleInput">番地、マンション名</label>
        <input type="text" class="form-control" id="formGroupExampleInput" name='address3'  placeholder="{{ $farmData->address3 }} ">
        @error('address3')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      
      <div class="form-group">
        <label for="exampleInputEmail1">電話番号</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='tel'  placeholder='{{ $farmData->tel }} '>
        @error('tel')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      
      <div class="form-group">
        <label for="formGroupExampleInput">url</label>
        <input type="text" class="form-control" id="formGroupExampleInput" name=site_uri''  placeholder="{{ $farmData->site_uri }} ">
        @error('site_uri')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      
       <div class="form-group">
        <label for="formGroupExampleInput">概要</label>
        <input type="text" class="form-control" id="formGroupExampleInput" name='summary'  placeholder="{{ $farmData->summary }} ">
        @error('summary')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      
       <div class="form-group">
        <label for="formGroupExampleInput">コンテンツ</label>
        <input type="text" class="form-control" id="formGroupExampleInput"  name='content' placeholder="{{ $farmData->content }} ">
        @error('content')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      
       <button type="submit" class="btn btn-primary">Submit</button>
    </form>
   
@endsection
