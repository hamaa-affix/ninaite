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
        <input type="url" class="form-control" id="formGroupExampleInput" name='site_url'  placeholder="{{ $farmData->site_url }} ">
        @error('site_url')
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
    
    <form method='POST' action='{{route('farms.destroy', ['id' => $farmData->id]) }}'>
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
   
@endsection
