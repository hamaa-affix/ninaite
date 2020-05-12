@extends('layouts.app')

@section('content')
<div>showです</div>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">農園名</th>
      <th scope="col">郵便番号</th>
      <th scope="col">都道府県</th>
      <th scope="col">番地、マンション名</th>
      <th scope="col">電話番号</th>
      <th scope="col">サイトurl</th>
      <th scope="col">概要</th>
      <th scope="col">コンテンツ</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">{{ $farmData->name }}</th>
      <td>{{$farmData->address1}}</td>
      <td>{{$farmData->address2}}</td>
      <td>{{$farmData->address3}}</td>
      <td>{{$farmData->tel}}</td>
      <td>{{$farmData->site_url}}</td>
      <td>{{$farmData->summary}}</td>
      <td>{{$farmData->content}}</td>
    </tr>
  </tbody>
</table>
  @foreach($farmData->users()->get() as $user)
      @if(Auth::user()->id === $user->id)
        <a class="btn btn-primary" href="{{ route('farms.edit', ['farm' => $farmData->id]) }}" role="button">編集する</a>
      @endif
  @endforeach
@endsection
