<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Custom;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    # Google Login
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
    # Google Callback
    public function handleGoogleCallback(){
        $user = Socialite::driver('google')->user();
        $this->_registerOrLoginUser($user);

        return redirect()->route('/')->with('toast',Custom::sweetAlert('success','Thanks For Login with Google!'));
    }
    # Facebook Login
    public function redirectToFacebook(){
        return Socialite::driver('facebook')->redirect();
    }
    # Facebook Callback
    public function handleFacebookCallback(){
        $socialiteUser = Socialite::driver('facebook')->stateless()->user();
        // return dd($socialiteUser);

        $findUser = User::where('provider_id',$socialiteUser->id)->orWhere('email',$socialiteUser->email)->first();

        if($findUser){
            Auth::login($findUser);
            return redirect()->route('/');
        }else{
            $user = new User();
            $user->name = $socialiteUser->name;
            if(isset($socialiteUser->email)){
                $user->email = $socialiteUser->email;
            }
            else{
//                $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
//                $randomName = rand(0,strlen($characters) -1 );
                $n = 10;
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $randomString = '';
                for ($i = 0; $i < $n; $i++) {
                    $index = rand(0, strlen($characters) - 1);
                    $randomString .= $characters[$index];
                }
                $user->email = $randomString . "@" ."example.com";
            }
            if(isset($socialiteUser->avatar)){
                $user->avatar = $socialiteUser->avatar;
            }
            $user->provider_id = $socialiteUser->id;
            $user->save();
            Auth::login($user);
            return redirect()->route('/')->with('toast',Custom::sweetAlert('success','Thanks For login with Facebook!'));
        }
    }
    protected function _registerOrLoginUser($data){
        $user = User::where('email','=',$data->email)->first();
        if(!$user){
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;

//            $newName = uniqid()."_profile.".$data;
//            $data->storeAs("public/profile",$newName);

            $user->avatar = $data->avatar;
            $user->save();

        }
        Auth::login($user);
    }
}
