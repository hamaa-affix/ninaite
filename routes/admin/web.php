<?php
//namaspace -> Controllerの共通化 この場合だとapp/Http/Controller/Farm配下
//prefix -> urlの共通化
//name() -> farm.~ と名前の共通化 route('farm.index');
//middleware -> routeの名前解決前の認証チェックができる(HTTP requestのフィルタリング)

Route::namespace('Admin')->prefix('admin')->name('admin.')->group( function() {
    Auth::routes([
        'register' => false,
        'reset'    => false,
        'verify'   => false
    ]);

    Route::middleware(['auth', 'second'])->group(function () {

    });
});
