<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
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
//    public function __construct()
//    {
//        $this->middleware('guest')->except('logout');
//    }

    public function showLoginForm()
    {

        return view('client.login');

    }

//    public function dashboard()
//    {
//        return view('admins.dashboard');
//    }

    protected function guard()
    {
        return Auth::guard('web');
    }

    public function login(LoginRequest $request)
    {
        $login = $request->only('email','password');

        if ($this->guard()->attempt($login)) {
//            $user = auth()->guard('web')->user();
//            if ($admin->hasAnyPermission(['admin.index', 'admin.store', 'admin.update', 'admin.delete'])) {
                return redirect()->route('home.index');
//            } else {
//                return redirect()->route('admin.dashboard');
//            }
        } else {
            return redirect()->back()->withErrors(['login' => 'Tài khoản không hợp lệ hoặc chưa kích hoạt.']);
        }
    }


    //  login social
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    // login callback
    public function callback($provider)
    {

        $getInfo = Socialite::driver($provider)->user();
        $user = $this->createUser($getInfo,$provider);
        session()->flash('login_success', true);
        Auth::login($user, true);
        return redirect()->route('home.index');
    }

    function createUser($getInfo,$provider){
        $user = User::where('provider_id', $getInfo->id)->first();
        if (!$user) {
            $user = User::where('email',$getInfo->email)->first();
            if ($user){
                $user->provider = $provider;
                $user->provider_id = $getInfo->id;
                $user->save();
            }else{
                $user = User::Create([
                    'name'     => $getInfo->name,
                    'email'    => $getInfo->email,
                    'provider' => $provider,
                    'provider_id' => $getInfo->id
                ]);
            }

        }
        return $user;
    }

    public function logout(Request $request)
    {
        //xóa các phiên bản đn
        Session::flush();

        auth()->guard('web')->logout();

//        dd(route('home.index'));
        return redirect()->route('user.showLoginForm');
    }

}
