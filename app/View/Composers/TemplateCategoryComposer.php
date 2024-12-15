<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\TempleteCategories; // Adjust model path as necessary

class TemplateCategoryComposer
{
    public function compose(View $view)
    {
        // Retrieve data you want to share with the view
        $templateCategories = TempleteCategories::latest()->take(12)
            ->select('category_name','slug', 'category_description','icon')
            ->get();
        // Bind data to the view
        $view->with('templateCategories', $templateCategories);
    }
}
