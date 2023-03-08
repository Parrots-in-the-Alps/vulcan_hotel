<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\User;
   
class AuthController
{
    public function signin(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $authUser = Auth::user(); 
            $success['token'] =  $authUser->createToken('MyAuthApp')->plainTextToken;
            $success['name'] =  $authUser->name;
            $success['message'] = 'User signed in';
   
            return response()->json($success, 200); //TODO FAIRE LES RESSOURCES USER
        }
        else { 
            $error['message'] = 'Bad credentials';
            return response()->json($error, 400);
        } 
    }
    
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirmPassword' => 'required|same:password',
        ]);
   
        if($validator->fails()){
            $error['message'] = 'Error validation';
            $error['errors'] = $validator->errors();
            return response()->json($error, 400);
        }
   
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyAuthApp')->plainTextToken;
        $success['name'] =  $user->name;
        $success['message'] = 'User created successfully.';
   
        return response()->json($success, 200);
    }

    public function logout()
    {
        $authUser = Auth::user(); 
        $authUser->tokens()->delete();
        Auth::guard("web")->logout();

    }
   
}