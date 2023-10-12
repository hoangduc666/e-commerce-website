<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'parent_id',
        'name',
        'price',
        'quantity',
        'description',
        'quantity_in_stock',
        'quantity_sold',
        'is_active',
        'slug',
    ];

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'products_attributes','product_id','attribute_id');
    }

    public function discounts()
    {
        return $this->belongsToMany(Discount::class, 'products_discounts','product_id','discount_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        // belongsTo : mối quan hệ thuộc về
        //Ví dụ: Một sản phẩm "thuộc về" một danh mục (Product thuộc về Category)

        return $this->belongsTo(Category::class);
    }

    //phương thức giả lấy ra data
    public function getCategoryName()
    {
        //dùng hàm optional kiểm tra xem giá trị category có tồn tại hay k => có thì sẽ trả ra name => k thì sẽ 'n/a', ( toán tử truy vấn null (??)
        return optional($this->category)->name ?? 'N/A';
    }


}
