<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  
    public function index()
    {
        $data = [
            "categories" => Category::get()
        ];
        return view("category.app", $data);
    }
        
    public function create()
    {
        return view("category.create");
    }
        
    public function store(Request $request)
    {
        $validate = $request->validate([
            "name" => ["required", "unique:categories,name"]
        ]);

        try {
            Category::create($validate);
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
        $data = [
            "category" => Category::findOrFail($id)
        ];
        return view("category.edit", $data);
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            "name" => ["required", "unique:categories,name,".$id]
        ]);

        try {
            Category::findOrFail($id)->update($validate);
            return redirect()->back()->with("success", "Data berhasil diubah!");
        } catch (\Throwable $th) {
            return redirect()->back()->with("fail", "Data gagal diubah!");
        }
    }

    public function destroy($id)
    {
        try {
            Category::findOrFail($id)->delete();
            return redirect()->back()->with("success", "Data berhasil dihapus!");
        } catch (\Throwable $th) {
            return redirect()->back()->with("success", "Data gagal dihapus!");
        }
    }
}
