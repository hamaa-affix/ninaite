@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card text-center " style="width: 100%;">
            <div class="card-header">
              　　<h3>農園詳細</h3>
            </div>
            <div class="card-body">
                <h4 class="card-title">農園名</h4>
                <p class="card-text">{{ $farmData->name }}</p>
                <h4 class="card-title">郵便番号</h4>
                <p class="card-text">{{ $farmData->address1 }}</p>
                <h4 class="card-title">都道府県</h4>
                <p class="card-text">{{ $farmData->address2 }}</p>
                <h4 class="card-title">番地、マンション名</h4>
                <p class="card-text">{{ $farmData->address3 }}</p>
                <h4 class="card-title">電話番号</h4>
                <p class="card-text">{{ $farmData->tel }}</p>
                <h4 class="card-title">サイトurl</h4>
                <p class="card-text">{{ $farmData->site_url }}</p>
                <h4 class="card-title">概要</h4>
                <p class="card-text">{{ $farmData->summary }}</p>
                <h4 class="card-title">コンテンツ</h4>
                <p class="card-text">{{ $farmData->content }}</p>
                <a class="btn btn-primary" href="{{ route('farms.edit', ['farm' => $farmData->id]) }}" role="button">編集する</a>
            </div>
        </div>
    </div>
  </div>
@endsection
