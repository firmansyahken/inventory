<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "suppliers" => Supplier::get()
        ];

        return view("supplier.app", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("supplier.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            "name" => ["required", "unique:suppliers,name"],
            "contact" => ["required"],
            "address" => ["required"]
        ]);

        try {
            Supplier::create($validate);
            return redirect()->back()->with("success", "Data berhasil ditambahkan!");
        } catch (\Throwable $th) {
            return redirect()->back()->with("fail", "Data gagal ditambahkan!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            "supplier" => Supplier::findOrFail($id)
        ];

        return view("supplier.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            "name" => ["required", "unique:suppliers,name,".$id],
            "address" => ["required"]
        ]);

        try {
            Supplier::findOrFail($id)->update($validate);
            return redirect()->back()->with("success", "Data berhasil diubah!");
        } catch (\Throwable $th) {
            return redirect()->back()->with("fail", "Data gagal diubah!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Supplier::findOrFail($id)->delete($id);
            return redirect()->back()->with("success", "Data berhasil dihapus!");
        } catch (\Throwable $th) {
            return redirect()->back()->with("fail", "Data gagal dihapus!");
        }
    }
}
