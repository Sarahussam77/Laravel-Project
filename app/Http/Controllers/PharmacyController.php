<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pharmacy;
use App\DataTables\PharmaciesDataTable;
use App\Models\Area;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables as DataTablesDataTables;
use Yajra\DataTables\Facades\DataTables ;

class PharmacyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Pharmacy::select('id', 'name', 'email', 'national_id', 'avatar_image', 'area_id', 'priority')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $button = '<a name="show" id="'.$row->id.'" class="show btn btn-success btn-sm p-0" href="'.route('pharmacies.show', $row->id).'" style="border-radius: 20px;"><i class="fas fa-eye m-2"></i></a>';
                    $button .= '<a name="edit" id="'.$row->id.'" class="edit btn btn-primary btn-sm p-0" href="'.route('pharmacies.edit', $row->id).'" style="border-radius: 20px;"><i class="fas fa-edit m-2"></i></a>';
                    $button .= '<form method="post" action= "'.route('pharmacies.destroy', $row->id).'">
                <input type="hidden" name="_token" value="'. csrf_token().' ">
                <input type="hidden" name="_method" value="delete">
                <button type="submit" class="btn btn-danger btn-sm  p-0 ml-3" style="border-radius: 20px;"><i class="fas fa-trash m-2"></i>
                </button>
                </form>';
                    return $button;
                    ;
                })


                ->rawColumns(['action'])
                ->make(true);
        }

        return view("pharmacies.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $areas = Area::all();
        return view('Pharmacies.create', ['areas' => $areas]);
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
        return view('pharmacies.edit', ['pharmacies' => $pharmacies,'areas' =>$areas]);
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

     public function destroy(Request $request, String $id)
     {
         //$pharmacyId = $request->pharmacies;
         $pharmacies = Pharmacy::withTrashed()
                 ->where('id', $id)
                 ->get()->first();
         $pharmacies->delete();
         return response()->json([
             'success' => 'Record deleted successfully!'
         ]);
     }

    // public function softdelete(Pharmacy $pharmacies)
    // {
    //     $pharmacies->delete();
    //     return response()->json([
    //         'success' => 'Record deleted successfully!'
    //     ]);
    // }

    // public function readsoftdelete()
    // {
    //     $pharmacies = Pharmacy::onlyTrashed()
    //                 ->get();
    //     return view('pharmacies.destroy', [
    //         'deletedPharmacies' => $pharmacies
    //     ]);
    // }
    // public function restore(Request $request)
    // {
    //     $pharmacies = Pharmacy::onlyTrashed()->where('id', $request->pharmacies);
    //     $pharmacies->restore();
    //     return redirect()->route('pharmacies.index');
    // }
}