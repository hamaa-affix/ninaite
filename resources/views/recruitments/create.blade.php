@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card　text-center">
                <div class="card-body">
                    <h5 class = "card-title font-weight-bolder" >{{ $farm->name }}の案件作成</h5 > 
                    <hr>
                    
                    
                    <form action='{{ route('farms.recruitments.store', ['farm' => $farm->id]) }}' method='POST' enctype='multipart/form-data'>
                        @csrf 
                          <div class="form-group text-center">
                            <label for="exampleFormControlInput1"><span><i class="fas fa-seedling" style="color: limegreen" ></i><strong>案件名</strong></span></label>
                            <input id="name" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror    
                          </div>
                        
                          <div class="form-group text-center">
                            <label for="exampleFormControlTextarea1"><span><i class="fas fa-seedling" style="color: limegreen" ></i><strong>農園概要</strong></span></label>
                            <textarea class="form-control @error('summary') is-invalid @enderror" id="exampleFormControlTextarea1" name='summary'　value="{{ old('summary') }}"　required autocomplete="summary" rows="3"></textarea>
                        @error('summary')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                          </div>
                        
                          <div class="form-group text-center">
                            <label for="exampleFormControlTextarea1"><span><i class="fas fa-seedling" style="color: limegreen" ></i><strong>仕事内容</strong></span></label>
                            <textarea class="form-control @error('content') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" name='content'></textarea>
                        @error('content')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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
                              <label for="exampleFormControlSelect1"><span><i class="fas fa-seedling" style="color: limegreen" ></i><strong>画像ファイル選択</strong></span></label>
                              <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                            </div>
                            <div class="custom-file">
                              <input type="file" name="img_name" class="custom-file-input @error('img_name') is-invalid @enderror" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                              @error('img_name')
                                  <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>
                          </div>
                          
                          <div class="form-group text-center">
                            <button type="submit" class="btn btn-success"><i class="fas fa-leaf"></i>案件を登録</button>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection