<?php

namespace App\Http\Controllers;

use App\Models\InventoryIn;
use App\Models\InventoryOut;
use App\Models\Item;
use App\Models\Warehouse;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class InventoryOutController extends Controller
{
    public function index()
    {
        $data = [
            "inventories" => InventoryOut::get()
        ];

        return view("inventory.inventoryout", $data);
    }
    
    public function create($id)
    {
        $data = [
            "inventory" => InventoryIn::with("item", "warehouse")->findOrFail($id)
        ];
        return view("inventory.inventoryout_create", $data);
    }

    public function checkout(Request $request, $id)
    {
        $validate = $request->validate([
            "date" => ["required"],
            "qty" => ["required"],
        ]);

        try {
            $inventory = InventoryIn::findOrFail($id);
            InventoryOut::create([
                "item_id" => $inventory["item_id"],
                "warehouse_id" => $inventory["warehouse_id"],
                "qty" => $request->qty,
                "date" => $request->date,
            ]);

            InventoryIn::findOrFail($id)->update(["qty" => $inventory["qty"] - $request->qty]);
            return redirect()->back()->with("success", "Data berhasil dikeluarkan!");
        } catch (QueryException $e) {
            return redirect()->back()->with("fail", $e);
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
