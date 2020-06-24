@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-body">
                  <h5 class = "card-title font-weight-bolder" >案件情報を編集する</h5 > 
                  <hr>
                   <form action='{{ route('farms.recruitments.update', ['farm' => $recruitment->farm_id, 'recruitment' => $recruitment->id]) }}' method='POST' enctype='multipart/form-data'>
                      @method('PUT')
                      @csrf
                        <div class="form-group text-center">
                          <label for="exampleFormControlInput1"><span><i class="fas fa-seedling" style="color: limegreen" ></i><strong>案件名</strong></span></label>
                          <input id="name" type="text" class="form-control" name="title" value ='{{ old('title', $recruitment->title ) }}'>
                        </div>
                          
                        <div class="form-group text-center">
                          <label for="exampleFormControlTextarea1"><span><i class="fas fa-seedling" style="color: limegreen" ></i><strong>農園概要</strong></span></label>
                          <textarea class="form-control" name='summary' rows="3">{{ old('summary', $recruitment->summary ) }}</textarea>
                        </div>

                        <div class="form-group text-center">
                          <label for="exampleFormControlTextarea1"><span><i class="fas fa-seedling" style="color: limegreen" ></i><strong>仕事内容</strong></span></label>
                          <textarea class="form-control"  name='content' rows="3">{{ old('content', $recruitment->content ) }}</textarea>
                        </div>
    
                        <div class="form-group text-center">
                            <label for="exampleFormControlSelect1"><span><i class="fas fa-seedling" style="color: limegreen" ></i><strong>求人公開状況</strong></span></label>
                                {{Form::select('status', [
                                    '0' => '非公開',
                                    '1' => '公開',
                                    ],
                                    null,
                                    ['class' => 'form-control']
                                )}}
                          </div>
                          
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                            </div>
                            <div class="custom-file">
                              <input type="file" name="img_name" class="custom-file-input @error('img_name') is-invalid @enderror" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                          </div>
                        
                        <div class="form-group text-center">
                          <label for="exampleFormControlTextarea1"><span><i class="fas fa-seedling" style="color: limegreen" ></i><strong>キーワード</strong></span></label>
                          <p>新たに登録したいキーワードはチェックしてね</p>
                          <div>
                            @php
                              $selectedKeywords = $recruitment->keywords()->pluck('keyword_id')->toArray();
                            @endphp
                            @foreach(App\Keyword::all() as $keyword)
                              <label>
                                  <input type="checkbox" name="keywords[]" value="{{ $keyword->id }}" 
                                  @if(in_array($keyword->id, $selectedKeywords))
                                        checked
                                  @endif>
                                  {{ $keyword->value }}
                              </label>
                            @endforeach
                          </div>
                        </div>
        
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success"><i class="fas fa-leaf"></i>案件を更新</button>
                        </div>
                  </form>
                  
                  <form method='POST' action='{{ route('farms.recruitments.destroy', ['farm' => $recruitment->farm_id, 'recruitment' => $recruitment->id]) }}'>
                        @csrf
                     <div class="form-group text-center">
                        <input type='hidden' name='_method' value='DELETE'>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                              <i class="fas fa-leaf"></i>案件の削除
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
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-leaf"></i>閉じる</button>
                                        <button type="submit" class="btn btn-success"><i class="fas fa-leaf"></i>削除</button>
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