@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-body text-center">
            <h5 class = "card-title font-weight-bolder" >農園の詳細</h5 > 
            <hr>
            <ul class="list-group list-group-flush">
              <li class="list-group-item "><span><i class="fas fa-seedling" style="color: limegreen" ></i><strong>農園名</strong></span>&emsp;{{ $farmData->name }}</li>
              <li class="list-group-item "><span><i class="fas fa-seedling" style="color: limegreen" ></i><strong>郵便番号</strong></span>&emsp;{{ $farmData->address1 }}</li>
              <li class="list-group-item "><span><i class="fas fa-seedling" style="color: limegreen" ></i><strong>都道府県</strong></span>&emsp;{{ $farmData->address2 }}</li>
              <li class="list-group-item "><span><i class="fas fa-seedling" style="color: limegreen" ></i><strong>番地、マンション名</strong></span>&emsp;{{ $farmData->address3 }}</li>
              <li class="list-group-item "><span><i class="fas fa-seedling" style="color: limegreen" ></i><strong>電話番号</strong></span>&emsp;{{ $farmData->tel }}</li>
              <li class="list-group-item "><span><i class="fas fa-seedling" style="color: limegreen" ></i><strong>サイトurl</strong></span>&emsp;{{ $farmData->site_url }}</li>
              <li class="list-group-item "><span><i class="fas fa-seedling" style="color: limegreen" ></i><strong>概要</strong></span>&emsp;{{ $farmData->summary }}</li>
              <li class="list-group-item "><span><i class="fas fa-seedling" style="color: limegreen" ></i><strong>コンテンツ</strong></span>&emsp;{{ $farmData->content }}</li>
            </ul>
            
            <br>
            @if($farmData->users()->where('users.id', Auth::id())->count() > 0)
            <div class="container">
              <div class="row">
                  <div class="col-sm">
                    <a class="btn btn-success" href="{{ route('farms.edit', ['farm' => $farmData->id]) }}" role="button"><i class="fas fa-leaf">編集する</i></a>
                  </div>
                  
                  <div class="col-sm">
                    <a class="btn btn-success" href="{{ route('farms.recruitments.create', ['farm' => $farmData->id])}}" role="button"><i class="fas fa-leaf">案件を作成する</i></a>
                  </div>
                  
                  <div class="col-sm">
                    <a class="btn btn-success" href="{{ route('farms.contact_user', ['farm' => $farmData->id]) }}" role="button"><i class="fas fa-leaf">メッセージを確認する</i></a>
                  </div>
                  @else
                  <div class="col-sm">
                    <a class="btn btn-success" href="{{ route('farms.messages.index', ['farm' => $farmData->id]) }}" role="button"><i class="fas fa-leaf">農場のメッセージ一覧をみる</i></a>
                  </div>
                   @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection