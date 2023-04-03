<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
use App\DataTables\MedicinesDataTable;
use Yajra\DataTables\Facades\DataTables;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {    
         if ($request->ajax()) {
        $data = Medicine::select('id','name','type','price')->get();
        return DataTables::of($data)->addIndexColumn()
        ->addColumn('action', function ($row) {
            $button = '<a name="show" id="'.$row->id.'" class="show btn btn-success btn-sm p-0 mr-2" href="'.route('medicines.show', $row->id).'" style="border-radius: 20px;"><i class="fas fa-eye m-2"></i></a>';
            $button .= '<a name="edit" id="'.$row->id.'" class="edit btn btn-primary btn-sm p-0 mr-2" href="'.route('medicines.edit', $row->id).'" style="border-radius: 20px;"><i class="fas fa-edit m-2"></i></a>';
            $button .= '<form method="post" action= "'.route('medicines.destroy', $row->id).'">
        <input type="hidden" name="_token" value="'. csrf_token().' ">
        <input type="hidden" name="_method" value="delete">
        <button type="submit" class="btn btn-danger btn-sm  p-0 ml-4" style="border-radius: 20px;"><i class="fas fa-trash m-2"></i>
        </button>
        </form>';
            return $button;
            ;
        })
            ->rawColumns(['action'])
            ->make(true);
    }
        return view("Medicines.index");

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Medicines.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   $data = $request->all();
        Medicine::create([
            'name'=>$data['name'],
            'price'=>$data['price'],
            'type'=>$data['type'],
            

        ]);
        return to_route('medicines.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $medicine= Medicine::find($id);
        return view('medicines.show', ['medicine' => $medicine]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $medicine =Medicine::find($id);
        
        return view('medicines.edit', ['medicine' => $medicine]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $medicine = Medicine::findOrFail($id);
        $medicine->name = $request->input('name');
        $medicine->type = $request->input('type');
        $medicine->price= $request->input('price');
        
        $medicine->save();
     
        return redirect()->route('medicines.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $medicine=Medicine::find($id);
        if(count($medicine->orders))
        {
           $alert=[];
           $alert['type']='danger';
           $alert['message']='medicine is in orders Can not be deleted';
           return view('medicines.index',['alert'=>$alert]);
        }
        $medicine->delete();
        return redirect()->route('medicines.index');
    }
}
