<?php

namespace Clob\Repositories;

use Clob\User;
use Illuminate\Http\Request;

class Users extends Repository
{
	/**
	 * Create a new admin user account.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Clob\User
	 */
	public function createAdmin(Request $request)
	{
		$user = new User;
		$user->name = request()->name;
		$user->email = request()->email;
		$user->password = bcrypt(request()->password); // Hash the user's password
		$user->save();

		return $user;
	}
}