<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\DataTables\AddressesDataTable;
use App\Models\Area;
use Auth;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class UserAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    { $user=Auth::user()->typeable_type;
        
         if ($request->ajax()) {
        $data = Address::select('id','street_name','building_number','floor_number','flat_number','is_main','area_id','user_id')->get();
        //   if($user->hasRole('admin')){
        return DataTables::of($data)->addIndexColumn()
     
            ->addColumn('action', function ($row) {
              
                $button = '<a name="show" id="'.$row->id.'" class="show btn btn-success btn-sm p-0" href="'.route('useraddresses.show', $row->id).'" style="border-radius: 20px;"><i class="fas fa-eye m-2"></i></a>';
                $button .= '<a name="edit" id="'.$row->id.'" class="edit btn btn-primary btn-sm p-0" href="'.route('useraddresses.edit', $row->id).'" style="border-radius: 20px;"><i class="fas fa-edit m-2"></i></a>';
                $button .= '<form method="post" action= "'.route('useraddresses.destroy', $row->id).'">
            <input type="hidden" name="_token" value="'. csrf_token().' ">
            <input type="hidden" name="_method" value="delete">
            <button type="submit" class="btn btn-danger btn-sm  p-0 ml-3" style="border-radius: 20px;"><i class="fas fa-trash m-2"></i>
            </button>
            </form>';
                return $button;
                
            })
        // }
        
            ->addColumn('area', function (Address $address) {
                return $address->area->name;
            })
            ->addColumn('user', function (Address $address) {
                return $address->user->name;
            })
            ->addColumn('ismain', function (Address $address) {
                $is_main = NULL;
                if ($address->is_main== '1') $is_main = 'yes' ;
                else $is_main = 'no' ;
                return $is_main;
            })

        
            ->rawColumns(['action'])
            ->make(true);
    }
        return view("Addresses.index",["user"=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $areas = Area::all();
        return view("Addresses.create", ['users' => $users ,'areas' => $areas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $is_main = NULL;
        if ($request->is_main == 'yes') $is_main = 1 ;
        else $is_main = 0 ;
        Address::create([
           'street_name' => $request->street_name,
            'building_number' => $request->building_number,
            'floor_number' => $request->floor_number,
            'flat_number' => $request->flat_number,
            'is_main' => $is_main,
            'area_id' => $request->input('area'),
            'user_id' => $request->input('user')
        ]);

        return redirect()->route('useraddresses.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $address= Address::find($id);
        return view('Addresses.show' , ['address'=> $address]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $address= Address::find($id);
        $users = User::all();
        $areas = Area::all();
        return view('Addresses.edit' , ['address' => $address , 'users' => $users , 'areas' => $areas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $is_main = NULL;
        if ($request->is_main == 'yes') $is_main = 1 ;
        else $is_main = 0 ;
        $address= Address::find($id);
        $address->update([
            'street_name' => $request->street_name,
            'building_number' => $request->building_number,
            'floor_number' => $request->floor_number,
            'flat_number' => $request->flat_number,
            'is_main' =>$is_main,
            'area_id' => $request->input('area'),
            'user_id' => $request->input('user')
        ]);
        return redirect()->route('useraddresses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $address= Address::find($id);
        $address->delete();
        return redirect()->route('useraddresses.index');
    }
}
