<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\DataTables\OrdersDataTable;
use App\Models\User;
use DataTables;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
	
   public function index(Request $request)
   {  
     if ($request->ajax()) {
       $data = Order::select('*')->get();
       return Datatables::of($data)->addIndexColumn()
           ->addColumn('action', function($row){
               $btn = '<a href="/orders/'.$row->id.'" class="btn btn-primary btn-sm">View</a>'." ".
               '<a href="//'.$row->id.'" class="btn btn-primary btn-sm">Edit</a>'.'<br>'.
               '<a href="//'.$row->id.'" class="btn btn-primary btn-sm">Delete</a>';
               return $btn;
           })
           ->rawColumns(['action'])
           ->make(true);
   }
        return view("Orders.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Orders.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $orders= Order::find($id);
        $users = User::all();
        return view('orders.show', [
            'orders' => $orders,
            'users' => $users,
    
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
