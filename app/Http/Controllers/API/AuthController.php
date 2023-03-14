<?php
   
namespace App\Http\Controllers\API;
   
use Validator;
use App\Models\User;
use App\Event\UserCreated;
use Illuminate\Http\Request;
use App\Mail\InscriptionMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
   
class AuthController
{
    public function signin(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $authUser = Auth::user();
            $success['id'] =  $authUser->id;
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
        $input['address_id'] = 1;
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyAuthApp')->plainTextToken;
        $success['name'] =  $user->name;
        $success['message'] = 'User created successfully.';
        // Mail::to($user->email)->send(new InscriptionMail($user));
        event(new UserCreated($user));
   
        return response()->json($success, 200);
    }

    public function logout()
    {
        $authUser = Auth::user(); 
        $authUser->tokens()->delete();
        Auth::guard("web")->logout();

    }
   
}