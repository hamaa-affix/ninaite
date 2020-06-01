@extends('layouts.app')

@section('content')
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
             @foreach($recruitments as $recruitment)
            <div class="card">
                <div class="card-body text-center">
                    <div class="form-group text-center">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><span class="h5">農園名</span><br>{{ $recruitment->farm()->name}}</li>
                            <li class="list-group-item"><span class="h5">案件名</span><br>{{ $recruitment->title }}</li>
                            <li class="list-group-item"><span class="h5">農園概要</span><br>{{ $recruitment->summary }}</li>
                            <li class="list-group-item"><span class="h5">仕事内容</span><br>{{ $recruitment->content }}</li>
                        </ul>
                        
                        <div class="row justify-content-center">
                            <a href="{{ route('farms.recruitments.show', ['farm' => $recruitment->farm_id, 'recruitment' => $recruitment->id]) }}"  class="btn btn-success mt-3">詳細へ</a>
                        </div>
                    </div>
                </div>
            </div>
             @endforeach
        </div>
        <br>
    </div>
</div>
@endsection