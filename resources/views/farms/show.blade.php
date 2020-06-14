@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header text-center h3">農園詳細</div>
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
            @if($farmData->users()->where('users.id', Auth::id())->count() > 0)
              <div class='row justify-content-center mt-3'>
                <a class="btn btn-success" href="{{ route('farms.edit', ['farm' => $farmData->id]) }}" role="button">編集する</a>
              </div>
              <div class='row justify-content-center mt-3'>
                <a class="btn btn-success" href="{{ route('farms.recruitments.create', ['farm' => $farmData->id])}}" role="button">案件を作成する</a>
              </div>
              <div class='row justify-content-center mt-3'>
                <a class="btn btn-success" href="{{ route('farms.contact_user', ['farm' => $farmData->id]) }}" role="button">メッセージを確認する</a>
              </div>
            @else
               <div class='row justify-content-center mt-3'>
                <a class="btn btn-success" href="{{ route('farms.messages.index', ['farm' => $farmData->id]) }}" role="button">農場のメッセージ一覧をみる</a>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
</div>
@endsection