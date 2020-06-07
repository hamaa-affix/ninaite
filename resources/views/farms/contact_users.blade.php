@extends('layouts.app')

@section('content')
<div>やりとりしているユーザー一覧<div>
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-hover">
                <thead>
                    <tr>
                      <th scope="col">ユーザー名</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($uesrs as user) 
                    <tr>
                      <td><a href="{{ route('farms.messages.index', ['user_id' => $user->id]) }}" class="btn btn-success">{{ $user->name }}</a></</td>
                    </tr>
                  @endforeach
                 </tbody>
            </table>
        </div>
    </div>
</div>
@endsection