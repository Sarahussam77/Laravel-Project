<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Pharmacy;
use Illuminate\Support\File;
use App\DataTables\DoctorsDataTable;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreRequest;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {  
         if ($request->ajax()) {
        $data = Doctor::select('id','national_id','pharmacy_id','is_baned')->get();
        
        return DataTables::of($data)->addIndexColumn()
          
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

        ->addColumn('ban', function($row){
            $button ='<a class="btn btn-sm  mx-1" href="'.route("doctors.ban",$row).'"><i class="fas fa-ban m-2"></i></a>';
            return $button;
        })
        
        ->addColumn('is_baned', function ($row) {
            if($row->is_baned==0){
            return "No";
        }else{
        return "Yes";
        }})
            ->addColumn('name', function($row){
                // $username = Pharmacy::find($row['id']);
                return Doctor::find($row['id'])->type->name;
            })
            
            ->addColumn('email', function($row){
                
                return Doctor::find($row['id'])->type->email;
            })
            
            ->addColumn('pharmacy', function($row){
                $Pharmacyname = Pharmacy::all()->where('id',$row['pharmacy_id'])->first()->type->name;
               
             
                return $Pharmacyname;
            })
            ->rawColumns(['action','ban'])
            ->make(true);
    }
        return view("Doctors.index");
    }

    // protected function validator(Request $data){

    //     return Validator::make($data, [
    //                'name' => ['required', 'string', 'max:255'],
    //                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //                'national_id' => ['required', 'string', 'national_id', 'max:255', 'unique:users'],
    //                'password' => ['required', 'string', 'min:6', 'confirmed'],
    //             //    'phone'=>['required', 'string', 'min:11'],
    //                'avatar'=>'required|image',
    //            ]);
    //            }
    /**
     * 
     * 
     * Show the form for creating a new resource.
     */
    public function create()
    {  
         $pharmacy = Pharmacy::all();
         
        return view("doctors.create",['pharmacy'=>$pharmacy]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
       
        $data = $request->all();
        $request->validate([
            'national_id' => ['required', 'string', 'max:255', 'unique:pharmacies'],

        ]);
         $PharmacyId = USer::all()->where('id' , $data['Pharmacy_id'] )->first()->typeable_id;
         if($request->file('avatar')){
            $image = $request->file('avatar')->store('images',['disk' => "public"]);}
            else{
                $image = null;
            }         
        $doctor= Doctor::create([
            'pharmacy_id'=>$PharmacyId,
            'national_id'=>$data['national_id'],
            'is_baned'=>'0',
            'avatar'=>$image,

        ]);
        User::create([
           
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
            'typeable_type'=>'app\Models\Doctor',
            'typeable_id'=>$doctor->id
           
        ])->assignRole('doctor');



        return to_route('doctors.index');   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $doctors= Doctor::find($id);
        $Pharmacyname = Pharmacy::all()->where('id',$doctors['pharmacy_id'])->first()->type->name;
        return view('doctors.show', ['doctors' => $doctors ,'pharmacies'=>$Pharmacyname]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $pharmacies= Pharmacy::all();
        $doctors= Doctor::find($id);

        
        return view('doctors.edit', ['doctors'=>$doctors, 'pharmacies'=>$pharmacies]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    { 
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'avatar'=>'image'
        ]);
        $doctors = Doctor::findOrFail($id);
        if(Auth::user()->typeable_type!="app\\Models\\Doctor"){
        $doctors->pharmacy_id = $request->input('pharmacy_id');}

            if($request->hasFile('avatar')){

                 Storage::disk("public")->delete($doctors->avatar);

                $image = $request->file('avatar')->store('images',['disk' => "public"]);
                $doctors->avatar=$image;

              };


            //'avatar_image'=> request()->avatar_image,
            //'is_banned'=>0,
           

        $doctors->type()->update([
            'name'=>request()->name,
        ]);
        if(Auth::user()->typeable_type=="app\\Models\\Doctor"){
            $doctors->type()->update([
                'email'=>request()->email,
            ]);
            $doctors->update();
        return redirect()->route('welcome'); 
        }
        $doctors->update();
        return redirect()->route('doctors.index'); 

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->type()->forceDelete();
        $doctor->delete();
        return redirect()->route('doctors.index');
    }

    public function ban($id)
    {
        $doctor = Doctor::findOrFail($id);
        if($doctor->is_baned===0){
            $doctor->update(['is_baned'=>1]);
        }
        else{
            $doctor->update(['is_baned'=>0]);
        }
        return redirect()->route('doctors.index');
    }
}