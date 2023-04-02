<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Pharmacy;
use App\DataTables\DoctorsDataTable;
use Yajra\DataTables\Facades\DataTables;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {  
         if ($request->ajax()) {
        $data = Doctor::select('id','name','avatar_image','national_id','email','is_baned')->get();
        return DataTables::of($data)->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm">View</a>';
                return $btn;
            })
            ->addColumn('Pharmacy', function($row){
                $Pharmacyname = Pharmacy::all()->where('id' , $row['pharmacy_id'] )->first()->name;
                return $Pharmacyname;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
        return view("Doctors.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   $pharmacy = Pharmacy::all();
        return view("Doctors.create",['pharmacy'=>$pharmacy ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $PharmacyId = Pharmacy::all()->where('name' , $data['PharmacyName'] )->first()->id;
       
        
        $doctor = Doctor::Create([
            'email'=> $data['email'],
            'pharmacy_id'=> $PharmacyId,
            ''
        ]);



        return to_route('orders.index');   
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
