<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

//        DB::table('users')->insert([
//            'name' => 'duc',
//            'email' =>'duc@gmail.com',
//            'password' => Hash::make(123456)
//        ]);


//        User::updateOrCreate(
//            ['email' => 'long@gmail.com'],
//            [
//                'name' => 'long',
//                'password' => Hash::make(123456),
//            ]
//        );



//        Category::create([
//            'parent_id' => null,
//            'name' => 'Smartphones',
//        ]);
//
//        Category::create([
//            'parent_id' => null,
//            'name' => 'Laptops',
//        ]);
//
//        Product::create([
//            'category_id' => 'Laptop Asus Gaming',
//            'parent_id' => '2',
//            'name' => 'Laptop Asus Gaming TUF123',
//            'price' => 25000000,
//            'description' => 'Với bộ vi xử lý Intel Core i5 dòng H mạnh mẽ và card đồ họa rời NVIDIA GeForce RTX 2050 4 GB,
//             laptop Asus TUF Gaming F15 FX506HF là một trong những lựa chọn tuyệt vời cho các game thủ và những người dùng
//             làm việc đa tác vụ hoặc liên quan đến đồ họa, kỹ thuật.'
//        ]);

//
//        Product::create([
//            'category_id' => 'Laptop Asus Gaming',
//            'parent_id' => null,
//            'name' => 'Laptop Asus Gaming TUF123',
//        ]);

//        Discount::create([
//            'name' => 'Flash Sale - Giảm 50% cho đơn hàng đầu tiên',
//            'percent_off' => 50,
//        ]);
//

    }
}
