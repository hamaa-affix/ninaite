@extends('layouts.app')

@section('content')
<div>farms.indexです</div>
  
 @foreach($farmDatas as $farmData)
 <div class="row">
   <div class="col-sm-12">
    <div class="card text-center " style="width: 100%;">
      <div class="card-body">
          <h5 class="card-title">農園名</h5>
            <p class="card-text">{{ $farmData->name }}</p>
          <h5 class="card-title">郵便番号</h5>
            <p class="card-text">{{ $farmData->address1 }}</p>
          <h5 class="card-title">都道府県</h5>
            <p class="card-text">{{ $farmData->address2 }}</p>
          <h5 class="card-title">番地、マンション名</h5>
            <p class="card-text">{{ $farmData->address3 }}</p>
          <h5 class="card-title">電話番号</h5>
            <p class="card-text">{{ $farmData->tel }}</p>
          <h5 class="card-title">サイトurl</h5>
            <p class="card-text">{{ $farmData->site_url }}</p>
          <h5 class="card-title">概要</h5>
            <p class="card-text">{{ $farmData->summary }}</p>
          <h5 class="card-title">コンテンツ</h5>
            <p class="card-text">{{ $farmData->content }}</p>
          <a href="{{ route('farms.show', ['farm' => $farmData->id]) }}" class="card-link">詳細へ</a>
      </div>
    </div>
   </div>
  </div>
 @endforeach
@endsection
