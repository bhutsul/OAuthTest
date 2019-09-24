<?php


namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Nexmo\Laravel\Facade\Nexmo;
use Socialite;
use Session;

class LoginController extends Controller
{

    public function redirectToProviderLogin($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function authenticateSocial($provider)
    {
        $socialiteUser = Socialite::driver($provider)->user();

        $split = explode(" ", $socialiteUser->getName());
        $firstName = array_shift($split);
        $lastName  = implode(" ", $split);

        $findUser = User::where('email', $socialiteUser->getEmail())->first();

        if ($findUser)
        {
            Auth::login($findUser);

            return redirect()->intended('/home');
        }
        else
        {
            $user = User::create([
                'name' => $firstName,
                'lastName' => $lastName,
                'email' => $socialiteUser->getEmail(),
            ]);

            Auth::login($user);

            return redirect()->intended('/home');
        }
    }

    public function loginPhone(\Nexmo\Client $nexmo, Request $request)
    {
        $user = User::where('phone', $request->input('phone'))->first();
        $number = mt_rand();

        if ($user)
        {
            $user->code = $number;
            $user->save();

            $nexmo->message()->send([
                'to' => $user->phone,
                'from' => '+380977133514',
                'text' => $number,
            ]);

            return redirect()->route('confirm.login');
        }
        else
        {
            Session::flash('message', "Ви ввели невірний номер");
            return back();
        }
    }

    public function confirmLogin(Request $request)
    {
        $user = User::where('code', $request->input('confirmLogin'))->first();

        if ($user)
        {
            $user->code = null;
            $user->save();

            Auth::login($user);

            return redirect()->intended('/home');
        }
        else
        {
            Session::flash('message', "Не вірний код");
            return back();
        }
    }
}
