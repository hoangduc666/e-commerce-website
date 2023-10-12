<?php

namespace App\Console\Commands;

use App\Models\Admin;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateRolePermissionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-role-permission-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Role Permission';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $role = Role::firstOrCreate(['name' => 'super admin', 'guard_name' => 'admin']);

        $permissions = [
            'admin.index',
            'admin.store',
            'admin.update',
            'admin.delete',
            'admin.changeStatus',
            'user.index',
            'user.store',
            'user.update',
            'user.delete',
            'category.index',
            'category.store',
            'category.update',
            'category.delete',
            'product.index',
            'product.store',
            'product.update',
            'product.delete',
            'product.create',
            'product.edit',
            'product.changeStatus',
            'attribute.index',
            'attribute.store',
            'attribute.update',
            'attribute.delete',
            'banner.index',
            'banner.store',
            'banner.update',
            'banner.delete',
            'banner.changeStatus',
            'discount.index',
            'discount.store',
            'discount.update',
            'discount.delete',
            'product.copy',
        ];

        // phương thức firstOrCreate không tự động duyệt qua mảng => sử dụng vòng lặp để thực hiện tạo mới cho mỗi phần tử trong mảng permissions
        foreach ($permissions as $permissionName) {
            // dùng luôn hàm firstOrCreate để vừa lấy ra quyền và vừa tạo
            Permission::firstOrCreate(['name' => $permissionName, 'guard_name' => 'admin',]);
        }

        //gán quyền cho role(nhóm người dùng)
        $role->syncPermissions($permissions);

        // truy vấn để lấy ra thông tin admin
        $admin = Admin::where('email', 'admin@gmail.com')->first();

        //gán vai trò cho admin
        $admin->assignRole($role->id);

        $this->info('Tạo và gán quyền cho admin thành công');



//        //xóa quyền
//        $permissionsToDelete = [
//            'product.detail.index',
//            'product.detail.store',
//            'product.detail.update',
//            'product.detail.delete',
//            'product.detail.changeStatus',
//        ];
//
//        foreach ($permissionsToDelete as $permissionName) {
//            // Tìm quyền có tên tương ứng trong cơ sở dữ liệu và xóa nếu nó tồn tại
//            Permission::where('name', $permissionName)->delete();
//        }
//
//        $this->info('Đã xóa các quyền thành công');

    }

}
