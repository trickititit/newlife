<?php

namespace App\Repositories;

use App\User;
use Config;

use Gate;


class UsersRepository extends Repository
{
	
    
	public function __construct(User $user) {
		$this->model  = $user;
		
	}
	
	public function addUser($request) {
		
		
//		if (\Gate::denies('create',$this->model)) {
//            abort(403);
//        }
		
		$data = $request->all();

		$this->model->create([
            'name' => $data['name'],
			'telefon' => $data['telefon'],
            'login' => $data['login'],
            'email' => $data['email'],
            'role_id' => $data['role'],
            'password' => bcrypt($data['password']),
        ]);
		
		return ['status' => 'Пользователь добавлен'];
		
	}
	
	
	public function updateUser($request, $user) {
		
		
//		if (\Gate::denies('edit',$this->model)) {
//            abort(403);
//        }
		
		$data = $request->all();
		
		if(isset($data['password'])) {
			$data['password'] = bcrypt($data['password']);
		} else {
			unset($data['password']);
			unset($data['password_confirmation']);
		}
		
		$user->fill($data)->update();
		
		return ['status' => 'Пользователь изменен'];
		
	}
	
	public function deleteUser($user) {
		
//		if (Gate::denies('edit',$this->model)) {
//            abort(403);
//        }
//		
		if($user->delete()) {
			return ['status' => 'Пользователь удален'];	
		} else {
			return ["error" => "Ошибка удаления пользователя"];
		}
	}
	
	

	
}