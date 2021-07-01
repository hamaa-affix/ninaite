<?php

//namaspace -> Controllerの共通化 この場合だとapp/Http/Controller/Farm配下
//prefix -> urlの共通化
//name() -> farm.~ と名前の共通化 route('farm.index');
//middleware -> routeの名前解決前の認証チェックができる(HTTP requestのフィルタリング)

Route::namespace('User')->prefix('user')->name('user.')->group( function() {
    Auth::routes([
        'register' => true,
        'reset'    => true,
        'verify'   => true
    ]);

    Route::middleware(['auth', 'second'])->group(function () {

    });
});
