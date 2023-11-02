<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
<<<<<<< HEAD
use App\Models\User;
=======
use App\Models\Admin;
>>>>>>> dece221f309a6888873a1349df77751a0356c316
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
<<<<<<< HEAD
use Laravel\Socialite\Facades\Socialite;
=======
use function Laravel\Prompts\alert;
use function Psy\debug;
>>>>>>> dece221f309a6888873a1349df77751a0356c316

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
<<<<<<< HEAD
//    public function __construct()
//    {
//        $this->middleware('guest')->except('logout');
//    }
=======
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
>>>>>>> dece221f309a6888873a1349df77751a0356c316

    public function showLoginForm()
    {
//        $admin = Admin::where('email', 'admin@gmail.com')->first();
//
//
//        if($admin){
//            $admin->update(['is_active' => 1]);
//            return response()->json('thành công');
//        }else{
//            return response()->json('thất bại');
//        }


//        $admin = Admin::where('email','manhadmin@gmail.com')->first();
//        $admin->update(['password' => Hash::make(123456)]);
//        $admin->update(['is_active' => 1]);

//        return response()->json(['thành công']);


        return view('admins.login');

    }

<<<<<<< HEAD
    public function dashboard()
    {
=======
    public function dashboard(){
>>>>>>> dece221f309a6888873a1349df77751a0356c316
        return view('admins.dashboard');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function login(LoginRequest $request)
    {
        $login = $request->only('email', 'password');

        if ($this->guard()->attempt($login) && auth()->guard('admin')->user()->is_active == 1) {
            $admin = auth()->guard('admin')->user();
            if ($admin->hasAnyPermission(['admin.index', 'admin.store', 'admin.update', 'admin.delete'])) {
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('admin.dashboard');
            }
        } else {
            return redirect()->back()->withErrors(['login' => 'Tài khoản không hợp lệ hoặc chưa kích hoạt.']);
        }
    }

<<<<<<< HEAD

//    //  login social
//    public function redirect($provider)
//    {
//        return Socialite::driver($provider)->redirect();
//    }
//
//    // login callback
//    public function callback($provider)
//    {
//
//        $getInfo = Socialite::driver($provider)->user();
//        $user = $this->createUser($getInfo,$provider);
//        session()->flash('login_success', true);
//        Auth::login($user, true);
//        return redirect()->route('home.index');
//    }
//
//    function createUser($getInfo,$provider){
//        $user = User::where('provider_id', $getInfo->id)->first();
//        if (!$user) {
//            $user = User::where('email',$getInfo->email)->first();
//            if ($user){
//                $user->provider = $provider;
//                $user->provider_id = $getInfo->id;
//                $user->save();
//            }else{
//                $user = User::updateOrCreate([
//                    'name'     => $getInfo->name,
//                    'email'    => $getInfo->email,
//                    'provider' => $provider,
//                    'provider_id' => $getInfo->id
//                ]);
//            }
//
//        }
//        return $user;
//    }

=======
>>>>>>> dece221f309a6888873a1349df77751a0356c316
    public function logout(Request $request)
    {
        //xóa các phiên bản đn
        Session::flush();

        auth()->guard('admin')->logout();

        return redirect()->route('admin.showLoginForm');
    }

}
