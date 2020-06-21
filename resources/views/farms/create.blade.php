@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class = "card-title font-weight-bolder" >{{ __('農園作成') }}</h5 > 
                    <hr>
                    <form method="post" action="{{ route('farms.store')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><i class="fas fa-seedling" style="color: limegreen" ></i><strong>{{ __('農園名') }}</strong></span></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><i class="fas fa-seedling" style="color: limegreen" ></i><strong>{{ __('郵便番号') }}</strong></span></label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" value="{{ old('postal_code') }}" required autocomplete="">

                                @error('postal_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><i class="fas fa-seedling" style="color: limegreen" ></i><strong>{{ __('都道府県') }}</strong></span></label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control @error('address1') is-invalid @enderror" name="address1" required autocomplete="">

                                @error('address1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><i class="fas fa-seedling" style="color: limegreen" ></i><strong>{{ __('市町村') }}</strong></span></label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control @error('address2') is-invalid @enderror" name="address2" required autocomplete="">

                                @error('address2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><i class="fas fa-seedling" style="color: limegreen" ></i><strong>{{ __('番地、マンション名') }}</strong></span></label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control @error('address3') is-invalid @enderror" name="address3" required autocomplete="">

                                @error('address3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                          
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><i class="fas fa-seedling" style="color: limegreen" ></i><strong>{{ __('電話番号') }}</strong></span></label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" required autocomplete="">

                                @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>   
                        
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><i class="fas fa-seedling" style="color: limegreen" ></i><strong>{{ __('サイトurl') }}</strong></span></label>

                            <div class="col-md-6">
                                <input id="password" type="url" class="form-control @error('site_url') is-invalid @enderror" name="site_url" required autocomplete="">

                                @error('site_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><i class="fas fa-seedling" style="color: limegreen" ></i><strong>{{ __('概要') }}</strong></span></label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control @error('summary') is-invalid @enderror" name="summary" required autocomplete="">

                                @error('summary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><i class="fas fa-seedling" style="color: limegreen" ></i><strong>{{ __('コンテンツ') }}</strong></span></label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control @error('content') is-invalid @enderror" name="content" required autocomplete="">

                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>   

                        <div class="form-group row mb-0">
                            <div class="col-md-4 offset-md-4">
                                <button type="submit" class="btn btn-success btn-lg">
                                    <i class="fas fa-leaf"></i>
                                    {{ __('登録') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
