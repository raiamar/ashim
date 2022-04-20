<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use Auth;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inventory()
    {
        $breadcrum = "Add Inventory";
        return view('admin.pages.inventory', compact('breadcrum'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function invStore(Request $request)
    {
        // return $request->input();
        //Insert Data into DB
        $inven = new Inventory;
        $inven-> supplier_name  = $request->input('supplier_name');
        $inven-> inventory_item = $request->input('inventory_item');
        $inven-> inventory_type = $request->input('inventory_type');
        $inven-> stock_quantity = $request->input('stock_quantity');
        $inven-> user_id = Auth::user()->id;
        
        $save = $inven->save();

        if($save){
            return back()->with('success','Your inventory has been successfuly ');
        }else{
            return back()->with('fail','Something went wrong, try again later');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function inventoryShow(Inventory $inventory)
    {
        $breadcrum = "Inventory";
        $data = Inventory::all();
        return view('admin.pages.stock',["inventory"=>$data, 'breadcrum'=>$breadcrum]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Inventory::find($id);
        $breadcrum = "Edit Inventory";
        return view('admin.pages.editInventory', compact('item', 'breadcrum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inven = Inventory::find($id);
        $inven-> supplier_name  = $request->input('supplier_name');
        $inven-> inventory_item = $request->input('inventory_item');
        $inven-> inventory_type = $request->input('inventory_type');
        $inven-> stock_quantity = $request->input('stock_quantity');
        $inven-> user_id = Auth::user()->id;
        
        $save = $inven->save();
        return redirect('/admin/show-inventory')->with('success', 'Inventory has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventory = Inventory::find($id); 
        $inventory->delete();
        return back()->with('success', 'Inventory removed');
    }
}
