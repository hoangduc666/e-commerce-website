<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'name',
        'quantity_in_stock',
        'quantity_sold',
        'quantity',

    ];

    // 1 category -> nhiều product và ngc lại
    public function products()
    {
        //hasMany: mối quan hệ 1 nhiều
        //vd: Một danh mục có nhiều sản phẩm (Category có nhiều Product).
        return $this->hasMany(Product::class);
    }

    // bản ghi trong category sẽ có thể thuộc về 1 bản ghi khác nhưng vẫn trong category
    // vd : mối quan hệ đang ánh xạ một danh mục con tới danh mục cha
    public function parent()
    {
        // belongsTo : mối quan hệ thuộc về
        //Ví dụ: Một sản phẩm "thuộc về" một danh mục (Product thuộc về Category)

        return $this->belongsTo(Category::class, 'parent_id');
    }

    //phương thức giả lấy ra data
    public function getParentCategoryName()
    {
        return $this->parent ? $this->parent->name : 'N/A';
    }


    public function childrens()
    {
        return $this->hasMany(Category::class,'parent_id');
    }
}
