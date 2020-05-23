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
                             @foreach($recruitment->farm()->get() as $recruitmentData)
                              <li class="list-group-item">{{ $recruitmentData->name }}</li>
                              @endforeach
                              <li class="list-group-item">{{ $recruitment->title }}</li>
                              <li class="list-group-item">{{ $recruitment->summary }}</li>
                              <li class="list-group-item">{{ $recruitment->content }}</li>
                            </ul>
                        </div>
                </div>
                <a href="{{ route('farms.recruitments.edit', ['farm' => $recruitment->farm_id, 'recruitment' => $recruitment->id]) }}"  class="card-link text-center">編集する</a>
            </div>
        </div>
    </div>
</div>
@endsection