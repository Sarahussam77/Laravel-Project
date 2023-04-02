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
        ->addColumn('action', function ($row) {
            $button = '<a name="show" id="'.$row->id.'" class="show btn btn-success btn-sm p-0 mr-2" href="'.route('areas.show', $row->id).'" style="border-radius: 20px;"><i class="fas fa-eye m-2"></i></a>';
            $button .= '<a name="edit" id="'.$row->id.'" class="edit btn btn-primary btn-sm p-0 mr-2" href="'.route('areas.edit', $row->id).'" style="border-radius: 20px;"><i class="fas fa-edit m-2"></i></a>';
            $button .= '<form method="post" onSubmit="return confirm(Are you sure you want to delete this row?)" action= "'.route('areas.destroy', $row->id).'">
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
        $name = request()->name;
       $address=request()->address;

        Area::create([
            'name' => $name,
            'address'=>$address,

        ]);
        return to_route('areas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $area= Area::find($id);
        return view('areas.show', ['area' => $area]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $area =Area::find($id);
        return view('areas.edit', ['area' => $area]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $area = Area::findOrFail($id);
        $area->name = $request->input('name');
        $area->address = $request->input('address');
      

        $area->save();
        return redirect()->route('areas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Area::where('id',$id)->Delete();
        return redirect()->route('areas.index');
    }
}
