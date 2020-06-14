@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="colspan=3">{{ $user->name }}さんとのメッセージ一覧</th>
                    <th scope="col"><a href="{{ route('farms.users.messages.create', ['farm' => $farm->id, 'user' => $user->id]) }}" class="btn btn-success">新規作成する</a></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($messages as $message) 
                  <tr>
                    <td>{{ $message->content }}</td>
                    @if ($message->post_by == App\Enums\PostBy::FARM)
                    <td>
                      <a href="{{ route('farms.users.messages.edit', ['farm' => $farm->id, 'user' => $user->id, 'message'=> $message->id]) }}" class="btn btn-success">編集する</a>
                    </td>
                    @endif
                  </tr>
                  @endforeach
                 </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

