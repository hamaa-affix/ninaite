<?php
namespace  App\Repositories\Contracts;

use  App\Models\FarmUser;

interface FarmUserContract
{
    /**
     * ログイン中のfarm userを取得する
     * @return FarmUser
     */
    public function getAuthUser(): FarmUser;

    /**
     * ユーザー情報を登録する。
     * @param array $params
     * @return FarmUser
     */
    public function create(array $params): FarmUser;
}
