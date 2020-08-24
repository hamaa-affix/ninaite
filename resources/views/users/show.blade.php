@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-body">
                  <h5 class = "card-title font-weight-bolder" >プロフィール</h5 > 
                  <hr>
                  <div class="text-center">
                    <img src="..." class="card-img-top" alt="...">
                  </div>
                  
                  <div class="form-group text-center">
                      <ul class="list-group list-group-flush">
                          <li class="list-group-item "><span><i class="fas fa-seedling" style="color: limegreen" ></i><strong>名前</strong></span>&emsp;{{ $user->name }}</li>
                          <li class="list-group-item"> <span><i class="fas fa-seedling" style="color: limegreen" ></i><strong>e-mail</strong></span>&emsp;{{ $user->email }}</li>
                      </ul>
                  </div>

                  <div class="container">
                      <div class="row">
                          <div class="col-sm">
                              <a href="{{route('users.edit', ['user' => $user->id]) }}" class="btn btn-success ml-3"><i class="fas fa-leaf">プロフィール編集</i></a>
                          </div>
                          
                          <div class="col-sm">
                              <form method='POST' action='{{route('users.destroy', ['user' => $user->id]) }}'>
                                  @csrf
                                  <input type='hidden' name='_method' value='DELETE'>
                                  <button type="button" class="btn btn-success ml-4" data-toggle="modal" data-target="#exampleModal">
                                      <i class="fas fa-leaf">プロフィールの削除</i>
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
                          
                          <div class="col-sm">
                              <a href="{{ route('farms.create') }}" class="btn btn-success ml-5"><i class="fas fa-leaf">農園情報を作る</i></a>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <br>
            <div class="card text-center">
              <div class="card-body">
                  <h5 class = "card-title font-weight-bolder" >{{ $user->name }}さんの農園情報</h5 > 
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
                        <td><a href="{{ route('farms.show', ['farm' => $farmData->id]) }}" class="btn btn-success"><i class="fas fa-leaf">詳細へ</i></a></td>
                      </tr>
                     </tbody>
                     @endforeach
                </table>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
