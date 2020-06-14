@extends('layouts.app')

@section('content')
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">メッセージの変更</div>
                <div class="card-body">
                      <form action='{{ route('farms.users.messages.update', ['farm' => $farm->id, 'user' => $user->id, 'message' => $message->id]) }}' method='POST'>
                        @csrf
                        @method('PUT')
                        <div class="form-group text-center">
                            <label for="exampleFormControlInput1">メッセージを作成</label>
                            <input id="content" type="text" class="form-control @error('content') is-invalid @enderror" name="content" value="{{ old('content', $message->content) }}" required autocomplete="value" autofocus>
                            @error('message')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success">メッセージを変更する</button>
                        </div>
                        
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection