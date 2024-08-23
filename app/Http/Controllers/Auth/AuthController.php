<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
class AuthController extends Controller
{
    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        } else {
            return redirect()->back()->withErrors($credentials);
        }
    }

    public function getLoggedInUser(Request $request)
    {
        $input = $request->all();

        $token = $input['token'];

        $getToken =  PersonalAccessToken::findToken($token);

        if ($getToken == null) {
            return response()->json(['error' => 'Unauthorised'], 401);
        }

        $user = $getToken->tokenable;

        if ($user['roles'] == 0) {
            $user['user'] = User::where('users.id', $user['id'])->join('userdetails','users.id','=','userdetails.user_id')->get()->toArray();
        }


        array_walk_recursive($user, function (&$item) {
            $item = null === $item ? '' : $item;
        });

        return response()->json(['data' => $user], 200);
    }
    public function forgotPassword(Request $request) {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $input = $request->all();

        $getUser = User::where('email', $input['email'])->get()->toArray();

        if (count($getUser) > 0) {
            $subject = 'Reset Password - BALI';

            $data['id'] = base64_encode($getUser[0]['id']);

            Mail::to($input['email'])->send(new ForgotPassword($subject, $data));

            return response()->json(['message' => 'Email sent'], 200);
        } else {
            return response()->json(['message' => 'No account exists with the entered email'], 200);
        }

    }
    public function reset(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $input = $request->all();

        $resetPassword = User::where('id', base64_decode($input['id']))->update(['password' => Hash::make($input['password'])]);

        if ($resetPassword) {
            return response()->json(['message' => 'Password set successfully'], 200);
        }

    }

    
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }

   

}
