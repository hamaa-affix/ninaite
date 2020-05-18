@extends('layouts.app')

@section('content')
 <p>recruitments.editdです</p>
 <form　metod='post' action=''>
      <input type='hidden' name='_method' value='PUT'>
      @csrf
      <div class="form-group text-center">
        <label for="exampleFormControlInput1">案件名</label>
        <input class="form-control" type="text" name='title' value ='{{ old('title', )}}'>
      </div>
      
      <div class="form-group text-center">
        <label for="exampleFormControlTextarea1">農園概要</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name='summary' value ='{{ old('title', )'></textarea>

      </div>
      
      <div class="form-group text-center">
        <label for="exampleFormControlTextarea1">仕事内容</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name='content' value ='{{ old('content', )'></textarea>
      </div>
      
      <div class="form-group text-center">
        <label for="exampleFormControlSelect1">求人公開状況</label>
        <select class="form-control" id="exampleFormControlSelect1"　name='status' value ='{{ old('status', )'>
          <option>0</option>
          <option>1</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary ">更新する</button>
      
      <form method='post' action='{{}}'>
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
</form>
@endsection