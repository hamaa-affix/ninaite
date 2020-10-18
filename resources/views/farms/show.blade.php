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
              <li class="list-group-item "><span><i class="fas fa-seedling" style="color: limegreen" ></i><strong>農園名</strong></span>&emsp;{{ $farm->name }}</li>
              <li class="list-group-item "><span><i class="fas fa-seedling" style="color: limegreen" ></i><strong>郵便番号</strong></span>&emsp;{{ $farm->address1 }}</li>
              <li class="list-group-item "><span><i class="fas fa-seedling" style="color: limegreen" ></i><strong>都道府県</strong></span>&emsp;{{ $farm->address2 }}</li>
              <li class="list-group-item "><span><i class="fas fa-seedling" style="color: limegreen" ></i><strong>番地、マンション名</strong></span>&emsp;{{ $farm->address3 }}</li>
              <li class="list-group-item "><span><i class="fas fa-seedling" style="color: limegreen" ></i><strong>電話番号</strong></span>&emsp;{{ $farm->tel }}</li>
              <li class="list-group-item "><span><i class="fas fa-seedling" style="color: limegreen" ></i><strong>サイトurl</strong></span>&emsp;{{ $farm->site_url }}</li>
              <li class="list-group-item "><span><i class="fas fa-seedling" style="color: limegreen" ></i><strong>事業内容</strong></span>&emsp;{{ $farm->summary }}</li>
            </ul>

            <br>
            @if($user->id === Auth::id())
            <div class="container">
              <div class="row">
                  <div class="col-sm">
                    <a class="btn btn-success mb-2" href="{{ route('farms.edit', ['farm' => $farm->id]) }}" role="button"><i class="fas fa-leaf">農園情報を編集</i></a>
                  </div>

                  <div class="col-sm">
                    <a class="btn btn-success" href="{{ route('farms.recruitments.create', ['farm' => $farm->id])}}" role="button"><i class="fas fa-leaf">案件を作成</i></a>
                  </div>

                  @if(!$reccuirments == null)
                  <div class="col-sm">
                    <a class="btn btn-success ml-2"
                        href="{{ route('farms.recruitments.show', ['farm' => $farm->id, 'recruitment' => $reccuirments->id])}}"
                        ole="button">
                      <i class="fas fa-leaf">案件の詳細を確認</i>
                    </a>
                  </div>
                  @endif
              </div>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
