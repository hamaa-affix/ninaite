@extends('layouts.app')

@section('content')
 keywords.createです
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">キーワードタグを作成する</div>
                <div class="card-body">
                      <form action='{{ route('recruitments.keywords.store', ['recruitment' => $recruitment->id]) }}' method='POST'>
                        @csrf
                        <div class="form-group text-center">
                            <label for="exampleFormControlInput1">タグを作成する</label>
                            <input id="name" type="text" class="form-control @error('keyword') is-invalid @enderror" name="value" value="{{ old('value') }}" required autocomplete="value" autofocus>
                                @error('value')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success">タグ作成</button>
                        </div>
                        
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection