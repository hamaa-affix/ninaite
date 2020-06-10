@extends('layouts.app')

@section('content')
 recruitments.indexです
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">案件一覧</div>
                <div class="card-body">
                    <div class="form-group text-center">
                      <ul class="list-group list-group-flush">
                          <li class="list-group-item">{{ $recruitment->farm()->name }}</li>
                          <li class="list-group-item">{{ $recruitment->title }}</li>
                          <li class="list-group-item">{{ $recruitment->summary }}</li>
                          <li class="list-group-item">{{ $recruitment->content }}</li>
                        @if($recruitment->stuas === 0)
                          <li class="list-group-item">募集中</li>
                        @else
                          <li class="list-group-item">現在募集をしておりません</li>
                        @endif
                      </ul>
                      
                      @if($recruitment->isEditable(Auth::id()))
                        <div class='col-md-8 offset-md-2'>
                          <a href="{{ route('farms.recruitments.edit', ['farm' => $recruitment->farm_id, 'recruitment' => $recruitment->id]) }}"  class="btn btn-success mt-3 mb-3">編集する</a>
                        </div>
                        
                      <h4>関連付いているキーワード</h4>
                      @foreach($recruitment->keywords()->get() as $keyword)
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">{{ $keyword->value }}</li>
                        </ul>
                      @endforeach
                      <div class="row justify-content-center mt-3">
                        <a href="{{ route('keywords.edit', ['id' => $recruitment->id]) }}"  class="btn btn-success mr-2">タグを編集する</a>
                        <a href="{{ route('recruitments.keywords.create', ['recruitment' => $recruitment->id]) }}"  class="btn btn-success">タグを作成する</a>
                      </div>
                      @endif
                      
                      <div class="row justify-content-center mt-3">
                        <a href="{{ route('farms.messages.create', ['farm' => $recruitment->farm()->id]) }}"  class="btn btn-success mr-2">農家にメッサージを送る</a>
                      </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection