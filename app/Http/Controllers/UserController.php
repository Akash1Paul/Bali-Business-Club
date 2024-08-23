<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
class UserController extends Controller
{

    public function userlogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        } else {

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

                $user = Auth::user();

                $data = [
                    'id' => $user->id,
                    'name' => $user->name,
                    'roles' => $user->roles,
                    'token' => $user->createToken('MyAuthApp')->plainTextToken
                ];

                return response()->json(['data' => $data, 'message' => 'You are logged in successfully'], 200);
            } else {
                return response()->json(['error' => 'Unauthorised'], 401);
            }
        }
    }


    public function userRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'pseudo' => 'required',
            'd_où_viens_tu' => 'required',
            'es_tu_installé_à_Bali' => 'required',
            'depuis_combien_de_temps' => 'required',
            'pour_combien_de_temps_seras_tu_à_Bali' => 'required',
            'wpnumber' => 'required',
            'instagram' => 'required',
            'tictok' => 'required',
            'linkedin' => 'required',
            'tes_meilleures_skills' => 'required',
            'ton_parcours' => 'required',
            'tes_hobbies_à_bali' => 'required',
        ]);
        $validator->after(function ($validator) use ($request) {

            if ($request->file('profile_pic')) {

                $imageFile = $request->file('profile_pic');

                $extension = $imageFile->getClientOriginalExtension();

                if ($imageFile->getSize() > 2 * 1024 * 1024) {
                    $validator->errors()->add('profile_pic', 'The image should not be greater than 2MB.');
                }

                $allowed = ['jpg', 'jpeg', 'png', 'gif'];

                if (!in_array($extension, $allowed)) {
                    $validator->errors()->add('profile_pic', 'The supported formats are jpg, jpeg, png and gif');
                }
            }
        });
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $input = $request->all();
        if ($request->hasFile('profile_pic')) {

            // file upload code
            $uploadFolder = 'files';
            $file = $request->file('profile_pic');
            $filename = 'img_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs($uploadFolder, $filename, 'public');

            $input['profile_pic'] = Storage::disk('public')->url($uploadFolder . '/' . $filename);
        }
          // check if email exists
          $checkEmail = User::where('email', $input['email'])->get()->toArray();

          if (count($checkEmail) > 0) {

              return response()->json(['message' => 'Email already exists'], 200);
          } else {
            $input['name'] = $request->first_name.' '.$request->last_name;
            $input['password'] = Hash::make($input['password']);

            $input['roles'] = 0;


            $user = User::create($input);

            if ($user) {
                UserDetail::create([
                    'user_id' => $user->id,
                    'first_name' => $input['first_name'],
                    'last_name' => $input['last_name'],
                    'pseudo' => $input['pseudo'],
                    'd_où_viens_tu' => $input['d_où_viens_tu'],
                    'es_tu_installé_à_Bali' => $input['es_tu_installé_à_Bali'],
                    'depuis_combien_de_temps' => $input['depuis_combien_de_temps'],
                    'pour_combien_de_temps_seras_tu_à_Bali' => $input['pour_combien_de_temps_seras_tu_à_Bali'],
                    'wpnumber' => $input['wpnumber'],
                    'instagram' => $input['instagram'],
                    'tictok' => $input['tictok'],
                    'linkedin' => $input['linkedin'],
                    'tes_meilleures_skills' => $input['tes_meilleures_skills'],
                    'ton_parcours' => $input['ton_parcours'],
                    'tes_hobbies_à_bali'=> $input['tes_hobbies_à_bali'],
                    'profile_pic' => $input['profile_pic']
                ]);

                $subject = 'Welcome to Bali Business Club';

                $data = [];

               // Mail::to($input['email'])->send(new SignUp($subject, $data));

                $data = [
                    'name' => $user->name,
                    'token' => $user->createToken('MyAuthApp')->plainTextToken
                ];

                return response()->json(['data' => $data, 'message' => 'You are registered successfully'], 200);
            }
        }
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'pseudo' => 'required',
            'd_où_viens_tu' => 'required',
            'es_tu_installé_à_Bali' => 'required',
            'depuis_combien_de_temps' => 'required',
            'pour_combien_de_temps_seras_tu_à_Bali' => 'required',
            'wpnumber' => 'required',
            'instagram' => 'required',
            'tictok' => 'required',
            'linkedin' => 'required',
            'tes_meilleures_skills' => 'required',
            'ton_parcours' => 'required',
            'tes_hobbies_à_bali' => 'required',
        ]);

        $validator->after(function ($validator) use ($request, $id) {

            if ($request->file('profile_pic')) {

                $imageFile = $request->file('profile_pic');

                $extension = $imageFile->getClientOriginalExtension();

                if ($imageFile->getSize() > 2 * 1024 * 1024) {
                    $validator->errors()->add('profile_pic', 'The image should not be greater than 2MB.');
                }

                $allowed = ['jpg', 'jpeg', 'png', 'gif'];

                if (!in_array($extension, $allowed)) {
                    $validator->errors()->add('profile_pic', 'The supported formats are jpg, jpeg, png and gif');
                }
            }
        });

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $input = $request->all();

        if ($request->hasFile('profile_pic')) {

            // file upload code
            $uploadFolder = 'files';
            $file = $request->file('profile_pic');
            $filename = 'img_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs($uploadFolder, $filename, 'public');

            $input['profile_pic'] = Storage::disk('public')->url($uploadFolder . '/' . $filename);
        }

        $job = UserDetail::where('user_id', $id)->update([
                    'first_name' => $input['first_name'], 
                    'last_name' => $input['last_name'], 
                    'pseudo' => $input['pseudo'], 
                    'd_où_viens_tu' => $input['d_où_viens_tu'],
                    'es_tu_installé_à_Bali' => $input['es_tu_installé_à_Bali'],
                    'depuis_combien_de_temps' => $input['depuis_combien_de_temps'],
                    'pour_combien_de_temps_seras_tu_à_Bali' => $input['pour_combien_de_temps_seras_tu_à_Bali'],
                    'wpnumber' => $input['wpnumber'], 
                    'instagram' => $input['instagram'], 
                    'tictok' => $input['tictok'], 
                    'linkedin' => $input['linkedin'], 
                    'tes_meilleures_skills' => $input['tes_meilleures_skills'], 
                    'ton_parcours' => $input['ton_parcours'],
                    'tes_hobbies_à_bali'=> $input['tes_hobbies_à_bali'] ,
                    'profile_pic' => $input['profile_pic']
        ]);
        $job = User::where('id', $id)->update([
            'name'=> $input['first_name'].' '.$input['last_name'],
            'email' => $input['email']
        ]);

        if ($job) {
            return response()->json(['message' => 'User edited successfully'], 200);
        }
    }
    public function getUserByID($id)
    {
        $User =  User::where('users.id', $id)->join('userdetails','users.id','=','userdetails.user_id')->get()->toArray();

        if (count($User) > 0) {

            array_walk_recursive($User, function (&$item) {
                $item = null === $item ? '' : $item;
            });

            return response()->json(['data' => $User], 200);
        } else {
            return response()->json(['message' => 'No User found'], 200);
        }
    }

    public function userlogout(Request $request)
    {
        $token = $request->token;

        $getToken =  PersonalAccessToken::findToken($token);

        if ($getToken == null) {
            return response()->json(['error' => 'Unauthorised'], 401);
        }

        $token_id = $getToken->id;

        $logout = DB::table('personal_access_tokens')->where('id', $token_id)->delete();

        if ($logout) {
            return response()->json(['message' => 'You are logged out successfully'], 200);
        }
    }
    public function gettransaction($id)
    {
        $transaction = Transaction::where('user_id',$id)->get();
        return response()->json($transaction);
    }
}
