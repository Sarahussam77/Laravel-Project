<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function index()
    {     
        $clients = Client::all();
        return ClientResource::collection($clients);
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

        return new ClientResource($client);
    }


    public function login(Request $request){
    
        $user = User::where('email', $request->email);

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
               //  $user= auth()->user();
           $token = $request->user()->createToken($request->device_name);
           return [
            'token' => $token->plainTextToken,
            'client_info' => new ClientResource(
                Client::find($user->typeable->id)
            )
            ]; 
        }
        else{
           return response()->json([
               "success" =>false,
               "status"=>200
              ]);
        }
      
       }

    /**
     * Display the specified resource.
     */
    public function show($client_id)
    {
        $if_exist = User::where('id', '=', $client_id);
        if ($if_exist->count()>0) 
        {
            return new ClientResource(
                Client::find(User::find($client_id)->typeable->id)
            );
        }
        else
        {
            return response()->json([
                "message" => "client not found"
            ]);
        }

    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($client)
    {
        $client_id = User::find($client)->typeable->id;
        Client::find($client_id)->delete();
        User::find($client)->delete();
        return response()->json([
            'success' => 'Client deleted'
        ]);
    }
}
