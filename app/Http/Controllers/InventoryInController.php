<?php

namespace App\Http\Controllers;

use App\Models\InventoryIn;
use App\Models\Item;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class InventoryInController extends Controller
{
    public function index()
    {
        $data = [
            "inventories" => InventoryIn::with("item", "warehouse")->get()
        ];
        return view("inventory.inventoryin", $data);
    }
    
    public function create()
    {
        $data = [
            "warehouses" => Warehouse::where("status", 1)->get(),
            "items" => Item::get()
        ];
        return view("inventory.inventoryin_create", $data);
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            "item_id" => ["required"],
            "warehouse_id" => ["required"],
            "qty" => ["required"],
            "date" => ["required"]
        ]);

        try {
            InventoryIn::create($validate);
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
