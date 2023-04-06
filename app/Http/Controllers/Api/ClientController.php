<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UpdateClientRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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
    public function register(Request $request)
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
    
        if (! Auth::attempt(['email'=>$request->email, 'password'=>$request->password])) {
            return response()->json([
                'success'=>false,
                'status'=>200
            ]);
        }
        $user = auth()->user();
        $token = $user->createToken('token');
        return $token->plainTextToken;
      
    }

    /**
     * Display the specified resource.
     */
    public function show($client)
    {
        $if_exist = User::where('id', '=', $client);
        if ($if_exist->count()>0) 
        {
            return new ClientResource(
                Client::find(User::find($client)->typeable_id)
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
    public function update(Request $request, $id)
    {
        $if_exist = User::where('id', $id);
        if ($if_exist->count()>0) 
        {
            $data = $request->all();
            //$avatar = isset($data['avatar'])? $data['avatar'] : "";
            // if ($avatar) 
            // {
            //     $new_name = time() . '_' . $avatar->getClientOriginalExtension();
            //     $avatar->move(public_path('images'), $new_name);
            // }
            // else
            // {
            //     $new_name = "default.jpg";
            // }

           $user = User::find($request->client);
           $updateclient = Client::find($user->typeable->id);
            $user->update([
                'name'=> $data['name'],
                'email'=> $data['email'],

            ]);
            $updateclient->update([
                // 'national_id' => $data['national_id'],
                // 'avatar' => $new_name,
                'gender' => $data['gender'],
                'date_of_birth' => $data['date_of_birth'],
                'phone' => $data['phone'],
            ]);

            return new ClientResource($updateclient);
        }
        else
        {
            return response()->json([
                "message" => "client not found"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($client)
    {
        $client_id = User::find($client)->typeable_id;
        Client::find($client_id)->delete();
        User::find($client)->delete();
        return response()->json([
            'success' => 'Client deleted'
        ]);
    }
}
