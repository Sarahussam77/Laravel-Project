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
        $data = Doctor::select('id','avatar','national_id','pharmacy_id','is_baned')->get();
        
        return DataTables::of($data)->addIndexColumn()
<<<<<<< HEAD
            ->addColumn('action', function($row){
                $button = '<a name="show" id="'.$row->id.'" class="show btn btn-success btn-sm p-0" href="'.route('doctors.show', $row->id).'" style="border-radius: 20px;"><i class="fas fa-eye m-2"></i></a>';
                $button .= '<a name="edit" id="'.$row->id.'" class="edit btn btn-primary btn-sm p-0" href="'.route('doctors.edit', $row->id).'" style="border-radius: 20px;"><i class="fas fa-edit m-2"></i></a>';
                $button .= '<form method="post" action= "'.route('doctors.destroy', $row->id).'">
            <input type="hidden" name="_token" value="'. csrf_token().' ">
            <input type="hidden" name="_method" value="delete">
            <button type="submit" class="btn btn-danger btn-sm  p-0 ml-3" style="border-radius: 20px;"><i class="fas fa-trash m-2"></i>
            </button>
            </form>';
                return $button;
                ;
=======
        ->addColumn('action', function ($row) {
            $button = '<a name="show" id="'.$row->id.'" class="show btn btn-success btn-sm p-0 mr-2" href="'.route('doctors.show', $row->id).'" style="border-radius: 20px;"><i class="fas fa-eye m-2"></i></a>';
            $button .= '<a name="edit" id="'.$row->id.'" class="edit btn btn-primary btn-sm p-0 mr-2" href="'.route('doctors.edit', $row->id).'" style="border-radius: 20px;"><i class="fas fa-edit m-2"></i></a>';
            $button .= '<form method="post" action= "'.route('doctors.destroy', $row->id).'">
        <input type="hidden" name="_token" value="'. csrf_token().' ">
        <input type="hidden" name="_method" value="delete">
        <button type="submit" class="btn btn-danger btn-sm  p-0 ml-4" style="border-radius: 20px;"><i class="fas fa-trash m-2"></i>
        </button>
        </form>';
            return $button;
            ;
        })
            ->addColumn('name', function($row){
                // $username = Pharmacy::find($row['id']);
                return Doctor::find($row['id'])->type->name;
            })
            
            ->addColumn('email', function($row){
                
                return Doctor::find($row['id'])->type->email;
>>>>>>> c6e25fb84e723bbe648ed04234dcdb4738e5b85c
            })
            
            ->addColumn('pharmacy', function($row){
                $Pharmacyname = Pharmacy::all()->where('id',$row['pharmacy_id'])->first()->type->name;
               
             
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
        $doctors= Doctor::find($id);
        return view('doctors.show', ['doctors' => $doctors]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("Doctors.edit");

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
