<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function getcommutiny()
    {
        $community =  User::join('userdetails','users.id','=','userdetails.user_id')->get()->toArray();
        if (count($community) > 0) {

            array_walk_recursive($community, function (&$item) {
                $item = null === $item ? '' : $item;
            });

            return response()->json(['data' => $community], 200);
        } else {
            return response()->json(['message' => 'No User found'], 200);
        }
    }
    public function getcommutinybyid($id)
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
}
