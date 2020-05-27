@extends('layouts.app')

@section('content')
 recruitments.indexです
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{$recruitment->title}}のタグ</div>
                <div class="card-body">
                        <div class="form-group text-center">
                            @foreach($keywords as $keyword)
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item">{{ $keyword->value }}</li>
                            </ul>
                            @endforeach
                       </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection