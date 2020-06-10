@extends('layouts.app')

@section('content')
massage.indexです
@if ($messages->isEmpty())
  <p>まだメッセージありません</p>
@else
<div>
    @foreach ($messages as $messageDatas)
    <ul>
       <li>{{$messageDatas->messages}}</li>
    </ul>
    @endforeach
</div>
@endif
@endsection
