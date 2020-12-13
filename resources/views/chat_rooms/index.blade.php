@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<!--farmuserのmatching_user一覧表示-->
			@if (App\User::find(Auth::id())->farms()->first() !== null)
				<table class="table table-hover">
					<thead>
						<tr>
								<th scope="col"><i class="fas fa-seedling" style="color: limegreen"></i>やりとりしているユーザー</th>
						</tr>
					</thead>
					<tbody>
						@foreach($matching_users as $matching_user)
							<tr>
								<td><i class="fas fa-seedling" style="color: limegreen"></i>{{  $matching_user->user->name }}さん</td>
								<td>
									<a href="{{ route('users.chat_rooms.show', ['user' => $matching_user->id, 'chat_room' => $matching_user->chat_room_id]) }}"  class="btn btn-success">
											<i class="fas fa-leaf">メッセージを確認する</i>
									</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			@else
				<!--一般userのmatching_user一覧表示-->
				<table class="table table-hover">
					<thead>
						<tr>
								<th scope="col"><i class="fas fa-seedling" style="color: limegreen"></i>やりとりしているユーザー</th>
						</tr>
					</thead>
					<tbody>
						@foreach($matching_users as $matching_user)
							@foreach($matching_user->user->farms()->get() as $farm_user)
								<tr>
									<td>{{  $farm_user->name }}</td>
									<td><a href="{{ route('users.chat_rooms.show', ['user' => $matching_user->id, 'chat_room' => $matching_user->chat_room_id]) }}" class="btn btn-success"><i class="fas fa-leaf">メッセージを確認する</i></a></td>
								</tr>
							@endforeach
						@endforeach
					</tbody>
				</table>
				@endif
		</div>
	</div>
</div>
@endsection
