<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {     
        if ($request->ajax()) {
        $data = User::select('id','name','avatar_image','national_id','email','date_of_birth','gender','phone')->get();
        return DataTables::of($data)->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm">View</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view("users.index");

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
       
        $data = $request->all();
        $client= Client::create([
		
            'gender'=>1,
            'date_of_birth'=>$data['date_of_birth'],
            'phone'=>$data['phone'],

        ]);
        User::create([
           
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
            'typeable_type'=>'app\Models\Client',
            'typeable_id'=>$client->id
           
        ])->assignRole('client');


    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view("users.show");

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
