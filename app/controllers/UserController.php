<?php

class UserController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = User::paginate(15);

		return View::make('users.index')->with('users', $data);
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('users.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data = User::findOrFail($id);
        return View::make('users.edit')->with('user', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @return Response
	 */
	public function update()
	{
		$date = Input::all();

		//TODO валидатор

		$user = User::findOrFail($date['id']);
		$user->email = $date['email'];

		if(!empty($data['password']))
			$user->password = $date['password'];

		try{
			$user->save();
			return Redirect::to('/user')->with('message', 'Пользователь успешно обновлен');
		} catch (Exception $e){

			return 'error';
		}

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$id = (int)$id;

			$user = User::findOrFail($id);

		if($user){
			$user->delete();
			return Redirect::to('/user')->with('message', 'Пользователь удален');
		}


		return 'null';
	}


	public function enter(){
		$data = Input::all();


		$user = User::enter($data);



		//TODO вывести ошибки

		if ($user == false) {
			Redirect::to('/login');
		}



		Auth::login($user, true);

		Redirect::to('/url');

	}

}
