<?php
namespace App\Http\Controllers;

use App\User;

class TestController extends Controller
{
    public function index() {
        $data = User::all();
        return $data;
    }

    public function add() {
        $data = New User;
        $data->username = "x nguyen";
        $data->email = 'nguyenytran06@gmail.com';
        $data->password = app('hash')->make('123456');
        $data->save();

        return 'success';
    }
}