<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pharmacy;
use App\DataTables\PharmaciesDataTable;
use App\Models\Area;
use App\Models\User;
use DataTables;
use Illuminate\Support\Facades\Storage;

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
                return '<a href="'.route('pharmacies.show',$row->id).'" class="btn btn-primary btn-sm">View</a>'. " ".
                '<a href="'.route('pharmacies.edit',$row->id).'" class="btn btn-primary btn-sm">Edit</a>'. " ".
                '<a href="'.route('pharmacies.index',$row->id).'" class="btn btn-primary btn-sm">Delete</a>';
                
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
        $areas = Area::all();
        return view('Pharmacies.create',['areas' => $areas]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = request()->name;
        $email = request()->email;
        $national_id =request()->national_id;
        $password =request()->password;
        $avatar_image =request()->avatar_image;
        $area_id =request()->area_id;
        $priority=request()->priority;

            Pharmacy::create([
                'name' => $name,
                'email' => $email,
                'national_id' =>$national_id,
                'password' =>$password,
                'avatar_image'=>$avatar_image,
                'area_id'=>$area_id,
                'priority'=>$priority
    
            ]);

        return to_route('pharmacies.index');

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
        $pharmacies =Pharmacy::with('area')->find($id);
        $areas = Area::all();
        return view('pharmacies.edit',['pharmacies' => $pharmacies,'areas' =>$areas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pharmacies = Pharmacy::findOrFail($id);
        $pharmacies->name = $request->input('name');
        $pharmacies->national_id = $request->input('national_id');
        $pharmacies->email = $request->input('email');
        $pharmacies->area_id = $request->input('area_id');

        $pharmacies->save();
        return redirect()->route('pharmacies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     $pharmacies = Pharmacy::find($id);
    //     $pharmacies = Pharmacy::withTrashed()->get();
    // }

    // public function restore(string $id)
    // {
    //     $pharmacies = Pharmacy::find($id);
    //     $pharmacies->delete();
    // }
}
