<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controL extends Controller
{
	public function index()
	{
		return view('inicioL');
	}

	public function store(Request $request)
	{
		$data = $request->all();

		return redirect()->back()->with([
			'message' => 'Botón funcional ejecutado correctamente',
			'data' => $data,
		]);
	}
}
