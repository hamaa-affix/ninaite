@extends('layouts.app')

@section('content')
 keywords.createです
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-body">
                  <h5 class = "card-title font-weight-bolder" >キーワードを作成する</h5 > 
                  <hr>
                      <form action='{{ route('recruitments.keywords.store', ['recruitment' => $recruitment->id]) }}' method='POST'>
                        @csrf
                        <div class="form-group text-center">
                            <label for="exampleFormControlInput1"><span><i class="fas fa-seedling" style="color: limegreen" ></i><strong>キーワードを入力してね</strong></span></label>
                            <input id="name" type="text" class="form-control @error('keyword') is-invalid @enderror" name="value" value="{{ old('value') }}" required autocomplete="value" autofocus>
                                @error('value')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success"><i class="fas fa-leaf"></i>キーワードを登録する</button>
                        </div>
                        
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection