<?php

namespace App\Observers;

use App\Jobs\TotalData;
use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductObserver
{
    /**
     * Handle the Product "creating" event.
     */
    public function creating(Product $product): void
    {
        //tính quantity_in_stock khi được thêm mới từ quantity
        $product->quantity_in_stock = $product->quantity - $product->quantity_sold;
    }
    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "updating" event.
     */
    public function updating(Product $product): void
    {

    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
        if ($product->isDirty('quantity')) {
            TotalData::dispatch($product);

        } else {
            // Cột 'quantity' không thay đổi
        }
    }

    /**     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        //
    }
}
