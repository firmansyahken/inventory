<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index()
    {
        $data = [
            "warehouses" => Warehouse::get()
        ];

        return view("warehouse.app", $data);
    }

    public function create()
    {
        return view("warehouse.create");
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            "name" => ["required", "unique:warehouses,name"],
            "location" => ["required"]
        ]);

        try {
            Warehouse::create($validate);
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
            "warehouse" => Warehouse::findOrFail($id)
        ];

        return view("warehouse.edit", $data);
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            "name" => ["required", "unique:warehouses,name,".$id],
            "location" => ["required"]
        ]);

        try {
            Warehouse::findOrFail($id)->update($validate);
            return redirect()->back()->with("success", "Data berhasil diubah!");
        } catch (\Throwable $th) {
            return redirect()->back()->with("fail", "Data gagal diubah!");
        }
    }

    public function destroy($id)
    {
        try {
            Warehouse::findOrFail($id)->delete();
            return redirect()->back()->with("success", "Data berhasil dihapus!");
        } catch (\Throwable $th) {
            return redirect()->back()->with("success", "Data gagal dihapus!");
        }
    }
}
