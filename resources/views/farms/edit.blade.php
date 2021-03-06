@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-body text-center">
					<h5 class = "card-title font-weight-bolder" >農園情報を編集する</h5 >
					<h6 class="card-title">変更点を修正してください</h6>

					<form method='post' action='{{ route('farms.update', ['farm' => $farm->id] ) }}'>
						<input type='hidden' name='_method' value='PUT'>
						@csrf
						<div class="form-group">
							<label for="formGroupExampleInput">
								<span>
									<i class="fas fa-seedling" style="color: limegreen" ></i>
									<strong>事業所名</strong>
								</span>
							</label>
							<input type="text"
											class="form-control text-center"
											id="formGroupExampleInput"
											name='name'
											value ='{{ old('name', $farm->name)}}'
							>

							@error('name')
								<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>

						<div class="form-group">
							<label for="formGroupExampleInput">
								<span>
									<i class="fas fa-seedling" style="color: limegreen" ></i>
									<strong>郵便番号</strong>
								</span>
							</label>

							<input type="text"
											class="form-control text-center"
											id="formGroupExampleInput"
											name='postal_code'
											value ='{{ old('postal_code', $farm->postal_code)}}'
							>

							@error('postal_code')
								<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>

						<div class="form-group">
							<label for="formGroupExampleInput">
								<span>
									<i class="fas fa-seedling" style="color: limegreen" ></i>
									<strong>都道府県</strong>
								</span>
							</label>
							<input type="text"
											class="form-control text-center"
											id="formGroupExampleInput"
											name='address1'
											value ='{{ old('address1', $farm->address1)}}'
							>

							@error('address1')
								<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>

						<div class="form-group">
							<label for="formGroupExampleInput">
								<span>
									<i class="fas fa-seedling" style="color: limegreen" ></i>
									<strong>市町村</strong>
								</span>
							</label>
							<input type="text"
											class="form-control text-center"
											id="formGroupExampleInput"
											name='address2'
											value ='{{ old('address2', $farm->address2)}}'
							>

							@error('address2')
								<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>

						<div class="form-group">
							<label for="formGroupExampleInput">
								<span>
									<i class="fas fa-seedling" style="color: limegreen" ></i>
									<strong>番地、マンション名</strong>
								</span>
							</label>
							<input type="text"
											class="form-control text-center"
											id="formGroupExampleInput"
											name='address3'
											value ='{{ old('address3', $farm->address3)}}'
							>

							@error('address3')
								<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">
								<span>
									<i class="fas fa-seedling" style="color: limegreen" ></i>
									<strong>電話番号</strong>
								</span>
							</label>
							<input type="text"
											class="form-control text-center"
											id="exampleInputEmail1"
											aria-describedby="emailHelp"
											name='tel'
											value ='{{ old('tel', $farm->tel)}}'
							>

							@error('tel')
								<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>

						<div class="form-group">
							<label for="formGroupExampleInput">
								<span>
									<i class="fas fa-seedling" style="color: limegreen" ></i>
									<strong>農園のurl</strong>
								</span>
							</label>
							<input type="url"
											class="form-control text-center"
											id="formGroupExampleInput"
											name='site_url'
											value ='{{ old('site_url', $farm->site_url)}}'
							>

							@error('site_url')
								<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>

						<div class="form-group">
							<label for="formGroupExampleInput">
								<span>
									<i class="fas fa-seedling" style="color: limegreen" ></i>
									<strong>事業内容</strong>
								</span>
							</label>
							<textarea class="form-control"
												name='summary'
												rows="3">{{ old('summary',$farm->summary) }}
							</textarea>

							@error('summary')
									<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
									</span>
							@enderror
						</div>
						<button type="submit" class="btn btn-success"><i class="fas fa-leaf"></i>編集して送信</button>
					</form>
						<br>
					<!--destroy-->
					<form method='POST' action='{{route('farms.destroy', ['farm' => $farm->id]) }}'>
						@csrf
						<input type='hidden' name='_method' value='DELETE'>
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
								<i class="fas fa-leaf"></i>ファームの削除
						</button>

							<div class="modal fade"
										id="exampleModal"
										tabindex="-1"
										role="dialog"
										aria-labelledby="exampleModalLabel"
										aria-hidden="true"
							>
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">
												<i class="fas fa-leaf"></i>ファームの削除
											</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>

										<div class="modal-body">
											本当に削除しますか？
										</div>

										<div class="modal-footer">
											<button type="button"
															class="btn btn-secondary"
															data-dismiss="modal">
															<i class="fas fa-leaf"></i>閉じる
											</button>
											<button type="submit" class="btn btn-primary"><i class="fas fa-leaf"></i>削除</button>
										</div>
									</div>
								</div>
							</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
