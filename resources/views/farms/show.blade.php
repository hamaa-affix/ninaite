@extends('layouts.app')

@section('content')
<div>showです</div>
  @foreach($farmDatas as $farmData)
  <div class="card-group">
  <div class="card">
    <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text></svg>
    <div class="card-body">
        <h5 class="card-title">{{ $farmData->name }}</h5>
      　<p class="card-text">{{$farmData->address1}}</p>
      　<p class="card-text">{{$farmData->address2}}</p>
      　<p class="card-text">{{$farmData->address3}}</p>
      　<p class="card-text">{{$farmData->tel}}</p>
      　<p class="card-text">{{$farmData->site_url}}</p>
      　<p class="card-text">{{$farmData->summary}}</p>
      　<p class="card-text">{{$farmData->content}}</p>
      <a class="btn btn-primary" href="{{ route('farms.edit', ['id' => $farmData->id]) }}" role="button">編集する</a>
    </div>
    
  @endforeach

@endsection
