<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Supplier;
use App\Models\Unit;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $data = [
            "items" => Item::with("category", "supplier", "unit")->get()
        ];

        return view("item.app", $data);
    }

    public function create()
    {
        $data = [
            "categories" => Category::get(),
            "suppliers" => Supplier::get(),
            "units" => Unit::get()
        ];
        return view("item.create", $data);
    }
    
    public function store(Request $request)
    {
        $validate = $request->validate([
            "name" => ["required", "unique:items,name"],
            "category_id" => ["required"],
            "supplier_id" => ["required"],
            "unit_id" => ["required"],
            "description" => ["required"],
        ]);

        try {
            Item::create($validate);
            return redirect()->back()->with("success", "Data berhasil ditambahkan!");
        } catch (\Throwable $th) {
            return redirect()->back()->with("success", "Data berhasil ditambahkan!");
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = [
            "categories" => Category::get(),
            "suppliers" => Supplier::get(),
            "units" => Unit::get(),
            "item" => Item::with("category")->findOrFail($id)
        ];

        return view("item.edit", $data);
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            "name" => ["required", "unique:items,name,".$id],
            "category_id" => ["required"],
            "supplier_id" => ["required"],
            "unit_id" => ["required"],
            "description" => ["required"],
        ]);

        try {
            Item::findOrFail($id)->update($validate);
            return redirect()->back()->with("success", "Data berhasil diubah!");
        } catch (\Throwable $th) {
            return redirect()->back()->with("success", "Data berhasil diubah!");
        }
    }

    public function destroy($id)
    {
        try {
            Item::findOrFail($id)->delete();
            return redirect()->back()->with("success", "Data berhasil dihapus!");
        } catch (\Throwable $th) {
            return redirect()->back()->with("success", "Data gagal dihapus!");
        }
    }
}
