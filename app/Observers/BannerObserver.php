<?php

namespace App\Observers;

use App\Models\Banner;
use App\Repositories\Contracts\BannerRepositoryInterface;

class BannerObserver
{
    protected $bannerRepository;

    public function __construct(BannerRepositoryInterface $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
    }

    /**
     * Handle the Banner "created" event.
     */

    public function created(Banner $banner): void
    {
        $this->bannerRepository->incrementOrder($banner->order);
    }

    /**
     * Handle the Banner "updated" event.
     */
    public function updated(Banner $banner): void
    {
        if ($banner->isDirty('order')) {
            $this->bannerRepository->incrementOrder($banner->order);
        }
    }


    /**
     * Handle the Banner "deleted" event.
     */
    public function deleted(Banner $banner): void
    {
        //
    }

    /**
     * Handle the Banner "restored" event.
     */
    public function restored(Banner $banner): void
    {
        //
    }

    /**
     * Handle the Banner "force deleted" event.
     */
    public function forceDeleted(Banner $banner): void
    {
        //
    }
}
