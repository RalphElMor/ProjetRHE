<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;


class RegisterController extends Controller
{
     /**

     * Register api

     *

     * @return \Illuminate\Http\Response

     */

     public function register(Request $request)

     {
 
         $validator = Validator::make($request->all(), [
 
             'name' => 'required',
 
             'email' => 'required|email',
 
             'password' => 'required',
 
       
 
         ]);
 
    
 
         if($validator->fails()){
 
             return $this->sendError('Validation Error.', $validator->errors());       
 
         }
 
    
 
         $input = $request->all();
 
         $input['password'] = bcrypt($input['password']);
 
         $user = User::create($input);
 
         $success['token'] =  $user->createToken('MyApp')->plainTextToken;
 
         $success['name'] =  $user->name;
        // $success['id'] =  $user->id;  la réponse lors de l'enregistrement peut aussi être l'id et le token
 
    
 
         return response()->json([$success, "message"=> 'User register successfully.']);

 
     }
 
    
 
     /**
 
      * Login api
 
      *
 
      * @return \Illuminate\Http\Response
 
      */
      public function login(Request $request)
      {
          // Validation des entrées
          $request->validate([
              'email' => 'required|email',
              'password' => 'required|min:8',
          ]);
      
          if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
              $user = Auth::user();
              $success['token'] = $user->createToken('MyApp')->plainTextToken;
              $success['name'] = $user->name;
      
              return response()->json([$success, "message" => 'User login successfully.']);
          } else {
              return response()->json([
                  'message' => 'Unauthorized',
                  'error' => 'Unauthorized'
              ], 401);
          }
      }
      
      public function logout(Request $request)
      {
          Auth::guard('web')->logout();
          Session::flush();
      
          return response()->json(['success' => true, 'message' => 'Logged out successfully']);
      }
      
      
}