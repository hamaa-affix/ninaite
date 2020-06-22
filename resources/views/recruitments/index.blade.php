@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 justify-content-center">
              @foreach($recruitments as $recruitment)
                <div class="card border-dark mb-3 text-center justify-content-center" style="max-width: auto;">
                  <div class="card-header h3">{{ $recruitment->farm()->name}}の案件</div>
                    <div class="card-body text-dark">
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item"><span><i class="fas fa-seedling" style="color: limegreen" ></i><strong>案件名</strong></span>&emsp;案件名{{ $recruitment->title }}</li>
                          <li class="list-group-item"><span><i class="fas fa-seedling" style="color: limegreen" ></i><strong>農園概要</strong></span>&emsp;{{ $recruitment->summary }}</li>
                          <li class="list-group-item"><span><i class="fas fa-seedling" style="color: limegreen" ></i><strong>仕事内容</strong></span>&emsp;{{ $recruitment->content }}</li>
                        </ul>
                        <div class="row justify-content-center">
                            <a href="{{ route('farms.recruitments.show', ['farm' => $recruitment->farm_id, 'recruitment' => $recruitment->id]) }}"  class="btn btn-success mt-3"><i class="fas fa-leaf"></i>詳細へ</a>
                        </div>
                    </div>
                </div>
              @endforeach
        </div>
        <br>
    </div>
</div>
@endsection