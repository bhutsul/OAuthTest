<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Socialite;
use Illuminate\Routing\Controller;
use Session;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function registerPhone(Request $request)
    {
        $date = date('Y-m-d H:i:s');

        $data = [
            'lastName' => $request->input('lastName'),
            'name' => $request->input('name'),
            'patronimicName' => $request->input('patronimicName'),
            'dateOfBirth' => $request->input('dateOfBirth'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'city' => $request->input('city'),
        ];

        $rules = [
            'lastName' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'patronimicName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'city' => ['required', 'string', 'max:255'],
        ];
        $validator = Validator::make($data, $rules);

        if ($validator->fails())
        {
            Session::flash('message', "Не вірні дані");
            return back();
        }
        else
        {
            User::create([
                'lastName' => $request->input('lastName'),
                'name' => $request->input('name'),
                'patronimicName' => $request->input('patronimicName'),
                'dateOfBirth' => $request->input('dateOfBirth'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'city' => $request->input('city'),
                'registrationDate' => $date,
            ]);
            return redirect()->intended('/login');
        }
    }
}
