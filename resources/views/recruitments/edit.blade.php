@extends('layouts.app')

@section('content')
<p>recruitments.editdです</p>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">案件一覧</div>
                <div class="card-body">
                   <form action='{{ route('farms.recruitments.update', ['farm' => $recruitment->farm_id, 'recruitment' => $recruitment->id]) }}' method='POST'>
                      @method('PUT')
                      @csrf
                        <div class="form-group text-center">
                          <label for="exampleFormControlInput1">案件名</label>
                          <input id="name" type="text" class="form-control" name="title" value ='{{ old('title', $recruitment->title ) }}'>
                        </div>
                          
                        <div class="form-group text-center">
                          <label for="exampleFormControlTextarea1">農園概要</label>
                          <textarea class="form-control" name='summary' rows="3">{{ old('summary', $recruitment->summary ) }}</textarea>
                        </div>

                        <div class="form-group text-center">
                          <label for="exampleFormControlTextarea1">仕事内容</label>
                          <textarea class="form-control"  name='content' rows="3">{{ old('content', $recruitment->content ) }}</textarea>
                        </div>
                      
                        <div class="form-group text-center">
                          <label for="exampleFormControlSelect1">求人公開状況　0 = 公開中　1 = 非公開</label>
                          <input class="form-control" type="text" name='status' value='{{ old('status', $recruitment->status ) }}' >
                        </div>
        
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary"> 案件を更新</button>
                        </div>
                  </form>
                  
                  <form method='POST' action='{{ route('farms.recruitments.destroy', ['farm' => $recruitment->farm_id, 'recruitment' => $recruitment->id]) }}'>
                        @csrf
                     <div class="form-group text-center">
                        <input type='hidden' name='_method' value='DELETE'>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                              案件の削除
                        </button>
                  
                         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                     <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">案件の削除</h5>
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
                     </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection