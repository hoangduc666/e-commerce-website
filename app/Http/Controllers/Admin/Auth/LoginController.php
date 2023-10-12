<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use function Laravel\Prompts\alert;
use function Psy\debug;

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

    public function dashboard(){
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

    public function logout(Request $request)
    {
        //xóa các phiên bản đn
        Session::flush();

        auth()->guard('admin')->logout();

        return redirect()->route('admin.showLoginForm');
    }

}
