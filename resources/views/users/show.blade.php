@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">プロフィール</div>
                <div class="card-body">
                        <div class="form-group text-center">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{ $user->name }}</li>
                                <li class="list-group-item">{{ $user->email }}</li>
                            </ul>
                            
                            <a href="{{route('users.edit', ['user' => $user->id]) }}" class="btn btn-success mt-3">プロフィール編集</a>
                        </div>
                        
                        <div class='row justify-content-center  mt-3'>
                            <form method='POST' action='{{route('users.destroy', ['user' => $user->id]) }}'>
                                @csrf
                                <input type='hidden' name='_method' value='DELETE'>
                                <button type="button" class="btn btn-success " data-toggle="modal" data-target="#exampleModal">
                                    プロフィールの削除
                                </button>
                                
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">プロフィールの削除</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                            　　本当に削除しますか？
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                              <button type="submit" class="btn btn-primary">削除</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class='row justify-content-center mt-3'>
                            <a href="{{ route('farms.create') }}" class="btn btn-success">農園を作る</a>
                        </div>
                    </div>
                    
                    <div class="card">
                            <table class="table table-hover">
                                <thead>
                                  <tr>
                                    <th scope="col">農園名</th>
                                    <th scope="col">概要</th>
                                    <th scope="colspan=2">サイトURL</th>
                                    <th scope="col">詳細画面へ</th>
                                  </tr>
                                </thead>
                                 @foreach($user->farms()->get() as $farmData)
                                <tbody>
                                  <tr>
                                    <td>{{ $farmData->name }}</td>
                                    <td>{{ $farmData->summary }}</td>
                                    <td>{{ $farmData->site_url }}</td>
                                    <td><a href="{{ route('farms.show', ['farm' => $farmData->id]) }}" class="btn btn-success">詳細へ</a></td>
                                  </tr>
                                 </tbody>
                                 @endforeach
                            </table>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
