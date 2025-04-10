<?php


namespace App\Interfaces;

use App\Models\Category;

interface CategoryRepositoryInterface
{
    public function getAllCategories();

    public function getCategoryBySlug($slug);
    
}

?>
