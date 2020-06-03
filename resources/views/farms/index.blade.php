@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-hover">
                <thead>
                    <tr>
                      <th scope="col">農園名</th>
                      <th scope="col">概要</th>
                      <th scope="colspan=2">サイトURL</th>
                      <th scope="col">詳細画面へ</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($farmDatas as $farmData) 
                    <tr>
                      <td>{{ $farmData->name }}</td>
                      <td>{{ $farmData->summary }}</td>
                      <td>{{ $farmData->site_url }}</td>
                      <td><a href="{{ route('farms.show', ['farm' => $farmData->id]) }}" class="btn btn-success">詳細へ</a></td>
                    </tr>
                  @endforeach
                 </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
