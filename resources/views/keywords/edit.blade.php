@extends('layouts.app')

@section('content')
 recruitments.indexです
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{$recruitment->title}}のタグ</div>
                <div class="card-body">
                   <form action='{{ route('keywords.update', ['id' => $recruitment->id]) }}' method='POST'>
                       <input type='hidden' name='_method' value='PUT'>
                       @csrf
                        <div class="form-group text-center">
                            @foreach($keywords as $keyword)
                            <div class="form-check">
                                 <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name='value' value="{{ $keyword->id }}" id="defaultCheck1"
                                          @if($recruitment->keywords()->where('keywords.id', $keyword->id)->first() !== null)
                                              checked
                                          @endif>
                                  
                                      <label class="form-check-label" for="defaultCheck1">
                                        {{ $keyword->value}}
                                      </label>
                                </div>
                            </div>
                            @endforeach
                            <button type="submit" class="btn btn-primary"> キーワードを編集</button>
                       </div>
                    <form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection