@extends('layouts.app')

@section('content')
<div>showです</div>
  @foreach($farmDatas as $farmData)
    {{ $farmData->id }}
  @endforeach
@endsection
