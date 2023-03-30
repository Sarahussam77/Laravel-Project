<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pharmacy;
use App\DataTables\PharmaciesDataTable;
use DataTables;

class PharmacyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {     if ($request->ajax()) {
        $data = Pharmacy::select('id','name','email','national_id','avatar_image','area_id','priority')->get();
        return Datatables::of($data)->addIndexColumn()
            ->addColumn('action', function($row){
                return '<a href="/pharmacies/'.$row->id.'" class="btn btn-primary btn-sm">View</a>'. " ".
                '<a href="/pharmacies/'.$row->id.'" class="btn btn-primary btn-sm">Edit</a>';
                
            })
            ->rawColumns(['action'])
            ->make(true);
    }

        return view("Pharmacies.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Pharmacies.create");
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
        $pharmacies= Pharmacy::find($id);
        return view('pharmacies.show', ['pharmacies' => $pharmacies]);
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
