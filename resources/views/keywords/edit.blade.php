@extends('layouts.app')

@section('content')
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                  @if(App\Recruitment::find($recruitment->id)->has('keywords')->count() > 0)
                   <form action='{{ route('keywords.update', ['id' => $recruitment->id]) }}' method='POST'>
                       <input type='hidden' name='_method' value='PUT'>
                       @csrf
                        <div class="form-group text-center">
                          <label for="exampleFormControlInput1">タグを編集する</label>
                          @foreach($recruitment->keywords()->get() as $keyword)
                            <input id="name" type="text" class="form-control text-center mt-3" name="value[{{ $keyword->id }}]" value="{{ old('value', $keyword->value) }}" required autocomplete="value" autofocus>
                          @endforeach
                            <button type="submit" class="btn btn-success mt-3"> キーワードを編集</button>
                        </div>
                    <form>
                      
                    <form method='POST' action='{{ route('keywords.destroy', ['id' => $recruitment->id])  }}'>
                        @csrf
                     <div class="form-group text-center">
                        <input type='hidden' name='_method' value='DELETE'>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                              キーワードを削除する
                        </button>
                         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                     <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">キーワードの削除</h5>
                                        <button type="button" class="close btn btn-success" data-dismiss="modal" aria-label="Close">
                                           <span aria-hidden="true">&times;</span>
                                        </button>
                                     </div>
                                     
                                     <div class="modal-body">
                                     　　本当に削除しますか？
                                     </div>
                                  
                                     <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                        <button type="submit" class="btn btn-success">削除</button>
                                     </div>
                                  </div>
                               </div>
                         </div>
                     </div>
                  </form>
                  @else
                      <a href="{{ route('recruitments.keywords.create', ['recruitment' => $recruitment->id]) }}"  class="btn btn-success">タグを作成する</a>
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection