<?php

namespace App\ViewComposers;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\View\View;

class ClientViewComposer
{
    /** Binding data to view
     *
     * @param View $view
     *
     * @return View
     * @throws \Exception
     * */
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }


    public function compose(View $view)
    {
        $categories = $this->categoryRepository->queryList(['parent_id_null' => true])->get();
        $view->with('categories', $categories);
    }


}
