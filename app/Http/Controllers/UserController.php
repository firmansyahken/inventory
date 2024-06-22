<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $data = [
            "users" => User::get()
        ];
        return view("user.app", $data);
    }

    public function create()
    {
        return view("user.create");
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            "name" => ["required"],
            "email" => ["required", "unique:users,email"],
            "password" => ["required"],
            "level" => ["required"]
        ]);

        $validate["password"] = bcrypt($validate["password"]);

        try {
            User::create($validate);
            return redirect()->back()->with("success", "Data berhasil ditambahkan!");
        } catch (\Throwable $th) {
            return redirect()->back()->with("fail", "Data gagal ditambahkan!");
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
