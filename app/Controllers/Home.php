<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('user/dashboard');
	}
	public function dashboard()
	{
		echo "selemat datang dihalaman dashboard admin initekno";
	}
}
