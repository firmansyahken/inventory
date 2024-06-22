<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        $data = [
            "units" => Unit::get()
        ];
        return view("unit.app", $data);
    }

    public function create()
    {
        return view("unit.create");
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            "name" => ["required", "unique:units,name"]
        ]);

        try {
            Unit::create($validate);
            return redirect()->back()->with("success", "Data berhasil ditambahkan!");
        } catch (\Throwable $th) {
            return redirect()->back()->with("fail", "Data gagal ditambahkan!");
        }
    }
    public function show($id)
    {
    }
    public function edit($id)
    {
        $data = [
            "unit" => Unit::findOrFail($id)
        ];
        return view("unit.edit", $data);
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            "name" => ["required", "unique:categories,name,".$id]
        ]);

        try {
            Unit::findOrFail($id)->update($validate);
            return redirect()->back()->with("success", "Data berhasil diubah!");
        } catch (\Throwable $th) {
            return redirect()->back()->with("fail", "Data gagal diubah!");
        }
    }

    public function destroy($id)
    {
        try {
            Unit::findOrFail($id)->delete();
            return redirect()->back()->with("success", "Data berhasil dihapus!");
        } catch (\Throwable $th) {
            return redirect()->back()->with("success", "Data gagal dihapus!");
        }
    }
}
