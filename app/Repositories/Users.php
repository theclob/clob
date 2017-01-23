<?php

namespace Clob\Repositories;

use Clob\User;
use Illuminate\Support\Facades\Hash;

class Users extends Repository
{
	/*
    |--------------------------------------------------------------------------
    | Users Repository
    |--------------------------------------------------------------------------
    |
    | This class handles saving user data to the database.
    |
    */

	/**
	 * Create a new admin user account.
	 *
	 * @param array $data
	 * @return \Clob\User
	 */
	public function createAdmin($data)
	{
		$user = new User;
		$user->name = $data['name'];
		$user->email = $data['email'];
		$user->password = bcrypt($data['password']); // Hash the user's password
		$user->save();

		return $user;
	}

	/**
	 * Updates a user account details.
	 *
	 * @param \Clob\User $user
	 * @param array $data
	 * @return \Clob\User
	 */
	public function update(User $user, $data)
	{
    	$user->name = $data['name'];
    	$user->email = $data['email'];
    	$user->save();

    	return $user;
	}

	/**
	 * Checks the supplied password is correct for the given user.
	 *
	 * @param \Clob\User $user
	 * @param string $password
	 * @return boolean
	 */
	public function checkPassword(User $user, string $password)
	{
		return Hash::check($password, $user->password);
	}

	/**
	 * Change the user's password.
	 *
	 * @param \Clob\User $user
	 * @param string $password
	 * @return \Clob\User
	 */
	public function changePassword(User $user, string $password)
	{
		$user->password = bcrypt($password);
    	$user->save();

    	return $user;
	}
}