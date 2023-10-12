<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TotalData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $product;

    public function __construct($product)
    {
        $this->product = $product;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $category = $this->product->category;
        if (!is_null($category)){
            $category->quantity = $category->products->sum('quantity');
            $category->save();
            $this->sumData($category);
        }


        if (!is_null($category)) {
           $category->quantity_in_stock = $category->products->sum('quantity') - $category->products->sum('quantity_sold') ;
           $category->save();
           $this->updateQuantityInStock($category);
        }


    }

    protected function sumData($category)
    {
        $parent = $category->parent;
        if (!is_null($parent)){
            $parent->quantity = $parent->childrens->sum('quantity');
            $parent->save();
            $this->sumData($parent);
        }
    }



    protected function updateQuantityInStock($category)
    {
        $parent = $category->parent;

        foreach ($category->products as $product) {
            //tính quantity_in_stock của sản phẩm hiện tại
            $product->quantity_in_stock = $product->quantity - $product->quantity_sold;
            $product->save();
        }
        $category->quantity_in_stock = $category->products->sum('quantity') - $category->products->sum('quantity_sold');
        $category->save();

        if (!is_null($parent)) {
            $this->updateQuantityInStock($parent);
        }
    }

}
