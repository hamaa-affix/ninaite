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
                            @foreach($recruitment->farm()->get() as $farmData)
                              <li class="list-group-item">{{ $farmData->name }}</li>
                            @endforeach
                              <li class="list-group-item">{{ $recruitment->title }}</li>
                              <li class="list-group-item">{{ $recruitment->summary }}</li>
                              <li class="list-group-item">{{ $recruitment->content }}</li>
                            @if($recruitment->stuas === 0)
                              <li class="list-group-item">募集中</li>
                            @else
                              <li class="list-group-item">現在募集をしておりません</li>
                            @endif
                            </ul>
                            @foreach($recruitment->keywords()->get() as $keyword)
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item">{{ $keyword->value }}</li>
                            </ul>
                            @endforeach
                        </div>
                </div>
　　　　　　　　@foreach($recruitment->farm()->get() as $recruitmentData)
　　　　　　　　        @if($recruitmentData->id === $recruitment->id)
                            <a href="{{ route('farms.recruitments.edit', ['farm' => $recruitment->farm_id, 'recruitment' => $recruitment->id]) }}"  class="card-link text-center">編集する</a>
                        @endif
　　　　　　　　@endforeach
　　　　　　　　<a href="{{ route('recruitments.keywords.create', ['recruitment' => $recruitment->id]) }}"  class="card-link text-center">タグを作成する</a>
            </div>
        </div>
    </div>
</div>
@endsection