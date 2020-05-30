@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($farmDatas as $farmData) 
            <div class="card">
                <div class="card-body text-center">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> <span class="h5">農園名</span><br>{{ $farmData->name }}</li>
                        <li class="list-group-item"> <span class="h5">郵便番号</span><br>{{ $farmData->address1 }}</li>
                        <li class="list-group-item"> <span class="h5">都道府県</span><br>{{ $farmData->address2 }}</li>
                        <li class="list-group-item"> <span class="h5">番地、マンション名</span><br>{{ $farmData->address3 }}</li>
                        <li class="list-group-item"> <span class="h5">電話番号</span><br>{{ $farmData->tel }}</li>
                        <li class="list-group-item"> <span class="h5">サイトurl</span><br>{{ $farmData->site_url }}</li>
                        <li class="list-group-item"> <span class="h5">概要</span><br>{{ $farmData->summary }}</li>
                        <li class="list-group-item"> <span class="h5">コンテンツ</span><br>{{ $farmData->content }}</li>
                    </ul>
                    <a href="{{ route('farms.show', ['farm' => $farmData->id]) }}" class="btn btn-success mt-3">詳細へ</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
