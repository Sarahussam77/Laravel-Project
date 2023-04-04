<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
   
    public function index(Request $request)
    {     
        if ($request->ajax()) {
        $data = Client::select('id','date_of_birth','gender','phone')->get();
        return DataTables::of($data)->addIndexColumn()
        ->addColumn('action', function ($row) {
            $button = '<a name="show" id="'.$row->id.'" class="show btn btn-success btn-sm p-0" href="'.route('clients.show', $row->id).'" style="border-radius: 20px;"><i class="fas fa-eye m-2"></i></a>';
            $button .= '<a name="edit" id="'.$row->id.'" class="edit btn btn-primary btn-sm p-0" href="'.route('clients.edit', $row->id).'" style="border-radius: 20px;"><i class="fas fa-edit m-2"></i></a>';
            $button .= '<form method="post" action= "'.route('clients.destroy', $row->id).'">
        <input type="hidden" name="_token" value="'. csrf_token().' ">
        <input type="hidden" name="_method" value="delete">
        <button type="submit" class="btn btn-danger btn-sm  p-0 ml-3" style="border-radius: 20px;"><i class="fas fa-trash m-2"></i>
        </button>
        </form>';
            return $button;
            ;
        })
        ->addColumn('name', function($row){
            // $username = Pharmacy::find($row['id']);
            return Client::find($row['id'])->type->name;
        })
        
        ->addColumn('email', function($row){
            
            return Client::find($row['id'])->type->email;
        })
        ->addColumn('gender', function ($row) {
            if($row->gender==0){
            return "male";
        }else{
        return "Female";
        }})
            ->rawColumns(['action'])
            ->make(true);
        }
        return view("clients.index");
      
       
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   $client= Client::find($id);
        return view("clients.show",['client' => $client]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client= Client::find($id);
        return view("clients.edit",['client' => $client]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $client = Client::find($id);

        $client->type->name = $request->input('name');
        $client->date_of_birth =$request->input('date_of_birth');
        $client->phone =$request->input('phone');
        // dd($client->type->name);
        $client->type->save();
        $client->save();
    
        return redirect()->route('clients.index'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::findOrFail($id);
        $client->type()->forceDelete();
       $client->delete();
        return redirect()->route('clients.index');
    }
   
}

