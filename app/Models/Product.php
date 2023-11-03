<?php

namespace App\Models;

use Carbon\Carbon;

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
    protected $appends = ['parent_name', 'price_new','category_name'];

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'products_attributes', 'product_id', 'attribute_id');
    }

    public function discounts()
    {
        return $this->belongsToMany(Discount::class, 'products_discounts', 'product_id', 'discount_id')
            ->withPivot('expiration_date');
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
    public function getCategoryNameAttribute()
    {
        //dùng hàm optional kiểm tra xem giá trị category có tồn tại hay k => có thì sẽ trả ra name => k thì sẽ 'n/a', ( toán tử truy vấn null (??)
        return optional($this->category)->name ?? 'N/A';
    }

    public function parent()
    {
        return $this->belongsTo(Product::class, 'parent_id');
    }

    public function getParentNameAttribute()
    {

        return $this->relationLoaded('category') ? optional($this->parent)->name : 'N/A';
    }

    public function childrens()
    {
        return $this->hasMany(Product::class, 'parent_id');
    }

    public function getPriceNewAttribute()
    {
        $price = $this->price;
        if ($this->relationLoaded('discounts')) {
            if (count($this->discounts) > 0) {
                $discounts = $this->discounts;
                foreach ($discounts as $discount) {
                    if (Carbon::parse($discount->pivot->expiration_date)->timestamp >= Carbon::now()->timestamp) {
                        $price = $price * (1 - $discount->percent_off / 100);
                    }
                }
            }
        }
        return $price;
    }
}
