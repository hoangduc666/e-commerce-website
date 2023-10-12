<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRolePermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // lấy thông tin người dùng đang đn
        $admin = Auth::guard('admin')->user();

        // lấy tên route người dùng đang truy cập
        $permission  = request()->route()->getName();

        //bước xác thực
        //nếu tk đó có quyền truy cập vào các route
        if ($admin->can($permission)){
            //cho phép đi qua
            return $next($request);
        }
        abort(401,'Không có quyền truy cập');


    }
}
