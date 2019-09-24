<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Socialite;
use Illuminate\Routing\Controller;
use Session;
use Illuminate\Support\Facades\Validator;
use Nexmo\Laravel\Facade\Nexmo;

class RegisterController extends Controller
{
    public function registerPhone(\Nexmo\Client $nexmo, Request $request)
    {
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
            'phone' => ['required', 'string', 'max:13','unique:users']
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails())
        {
            return back()->withErrors($validator);
        }
        else
        {
            $date = date('Y-m-d H:i:s');
            $number = mt_rand();

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

            $user = User::where('phone', $request->input('phone'))->first();
            $user->code = $number;
            $user->save();

            $nexmo->message()->send([
                'to' => $user->phone,
                'from' => '+380977133514',
                'text' => $number,
            ]);

            return redirect()->route('confirm.register');

        }
    }


    public function confirmRegister(Request $request)
    {
        $user = User::where('code', $request->input('confirmRegister'))->first();

        if ($user)
        {
            $user->active = 1;
            $user->code = null;
            $user->save();

            return redirect()->intended('/login');
        }
        else
        {
            Session::flash('message', "Невірний код");
            return back();
        }
    }
}
