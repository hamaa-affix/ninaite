@extends('layouts.app')

@section('content')
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">メッセージの作成</div>
                <div class="card-body">
                      <form action='{{ route('farms.messages.store', ['farm' => $farm->id, 'message' => $user->id]) }}' method='POST'>
                        @csrf
                        <div class="form-group text-center">
                            <label for="exampleFormControlInput1">メッセージを作成</label>
                            <input id="name" type="text" class="form-control @error('message') is-invalid @enderror" name="message" value="{{ old('message') }}" required autocomplete="value" autofocus>
                            @error('message')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                       
                        <div class="form-group text-center">
                            <label for="exampleFormControlSelect1">コンタクトタイプ</label>
                                {{Form::select('post_by', [
                                    '0' => '農家の投稿',
                                    '1' => 'ユーザーの投稿',
                                    ],
                                    null,
                                    ['class' => 'form-control']
                                )}}
                        </div>
                        
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success">メッセージを送る</button>
                        </div>
                        
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection