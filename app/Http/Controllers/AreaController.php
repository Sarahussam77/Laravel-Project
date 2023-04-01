<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\DataTables\AreasDataTable;
use Yajra\DataTables\Facades\DataTables ;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
    public function index(Request $request)
    {
        if ($request->ajax()) {
        $data = Area::select('id','name','address')->get();
        return DataTables::of($data)->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm">View</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
        
        return view("areas.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Areas.create");

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
        //
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
