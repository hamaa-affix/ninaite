<?php

namespace App\Repositories\Eloquents;

use App\Models\FarmUser;
use App\Repositories\Contracts\FarmUserContract;
use Illuminate\Support\Facades\Auth;

class EloquentFarmUserRepository implements FarmUserContract
{
	/**
	 * @var FarmUser
	 */
	private FarmUser $farmUser;

	public function __construct(FarmUser $farmUser)
	{
		$this->farmUser = $farmUser;
	}

	/**
	 * ログイン中のuserを取得する
	 * @return bool
	 */
	public function getAuthUser(): FarmUser
	{
		return Auth::guard(FarmUser::Farm_ROLE)->user();
	}

	/**
	 * farm user情報を登録する
	 * @param array $param
	 * @return FarmUser
	 */
	public function create(array $params): FarmUser
	{}
}
