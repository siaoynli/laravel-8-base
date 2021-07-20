<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserController extends Controller
{
    public function create(UserRequest $request)
    {
        dd($request->all());
    }


    public function index()
    {
        $user = User::latest()->first();
        return new UserResource($user);
    }


    public function show()
    {
        $user = User::latest()->first();
        return view("user.show",compact("user"));
    }
}
