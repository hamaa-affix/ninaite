@extends('layouts.app')

@section('content')
<div>editです</div>
    <div class='text-center'>
        <form method='post' action='{{ route('farms.update', ['farm' => $farmData->id] ) }}'>
          <input type='hidden' name='_method' value='PUT'>
          @csrf
          <div class="form-group">
            <label for="formGroupExampleInput">事業所名</label>
            <input type="text" class="form-control text-center" id="formGroupExampleInput"  name='name' value ='{{ old('name', $farmData->name)}}'>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="formGroupExampleInput">郵便番号</label>
            <input type="text" class="form-control text-center" id="formGroupExampleInput" name='postal_code'  value ='{{ old('postal_code', $farmData->postal_code)}}'>
            @error('postal_code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
     
          <div class="form-group">
            <label for="formGroupExampleInput">都道府県</label>
            <input type="text" class="form-control text-center" id="formGroupExampleInput"  name='address1' value ='{{ old('address1', $farmData->address1)}}'>
            @error('address1')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          
          <div class="form-group">
            <label for="formGroupExampleInput">市町村</label>
            <input type="text" class="form-control text-center" id="formGroupExampleInput" name='address2' value ='{{ old('address2', $farmData->address2)}}'>
            @error('address2')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
      
          <div class="form-group">
            <label for="formGroupExampleInput">番地、マンション名</label>
            <input type="text" class="form-control text-center" id="formGroupExampleInput" name='address3' value ='{{ old('address3', $farmData->address3)}}'>
            @error('address3')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          
          <div class="form-group">
            <label for="exampleInputEmail1">電話番号</label>
            <input type="text" class="form-control text-center" id="exampleInputEmail1" aria-describedby="emailHelp" name='tel' value ='{{ old('tel', $farmData->tel)}}'>
            @error('tel')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
      
          <div class="form-group">
            <label for="formGroupExampleInput">url</label>
            <input type="url" class="form-control text-center" id="formGroupExampleInput" name='site_url'  value ='{{ old('site_url', $farmData->site_url)}}'>
            @error('site_url')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="formGroupExampleInput">概要</label>
            <input type="text" class="form-control text-center" id="formGroupExampleInput" name='summary'  value='{{ old('summary',$farmData->summary) }}'>
            @error('summary')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="formGroupExampleInput">コンテンツ</label>
            <input type="text" class="form-control text-center" id="formGroupExampleInput" name='content'  value ='{{ old('content', $farmData->content) }}'>
            @error('content')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
           <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <br>
    
        <form method='POST' action='{{route('farms.destroy', ['farm' => $farmData->id]) }}'>
            @csrf
            <input type='hidden' name='_method' value='DELETE'>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                ファームの削除
            </button>
            
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">ファームの削除</h5>
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
    </div>
@endsection
