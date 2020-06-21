@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="colspan=3">メッセージ一覧</th>
                    <th scope="col"><a href="{{ route('farms.messages.create', ['farm' => $farm->id]) }}" class="btn btn-success">新規作成する</a></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($messages as $message) 
                  <tr>
                    <td>{{ $message->content }}</td>
                    <td>
                      @if ($message->post_by == App\Enums\PostBy::USER)
                      <a href="{{ route('farms.messages.edit', ['farm' => $message->farm_id, 'message'=> $message->id]) }}" class="btn btn-success">編集する</a>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                 </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
