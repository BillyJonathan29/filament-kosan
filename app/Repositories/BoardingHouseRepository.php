<?php

namespace App\Repositories;

use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Models\BoardingHouse;
use Illuminate\Database\Eloquent\Builder;




class BoardingHouseRepository implements BoardingHouseRepositoryInterface
{
    public function getAllBoardingHouses($search = null, $city = null, $category = null)
    {
        $query = BoardingHouse::query();

        // di sini ketika search di isi maka dia akan di jalankan
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        // jika city di isi maka dia akan mencari berdasarkan slug
        if ($city) {
            $query->whereHas('city', function (Builder $query) use ($city) {
                $query->where('slug', $city);
            });
        }

        // dia akan mencari berdasarkan slug
        if ($category) {
            $query->whereHas('category', function (Builder $query) use ($category) {
                $query->where('slug', $category);
            });
        }

        return $query->get();
    }

    public function getPopularBoardingHouses($limit = 5)
    {
        return BoardingHouse::withCount('transactions')
            ->orderBy('transactions_count', 'desc')
            ->take($limit)
            ->get();
    }

    public function getBoardingHouseByCitySlug($slug)
    {
        return BoardingHouse::whereHas('city', function(Builder $query) use ($slug) {
            return $query->where('slug', $slug);
        })->get();
    }

/*************  ✨ Windsurf Command ⭐  *************/
    /**
     * Retrieve a collection of boarding houses that belong to a specific category identified by its slug.
     *
     * @param string $slug The slug of the category to filter boarding houses by.
     * @return \Illuminate\Database\Eloquent\Collection A collection of boarding houses belonging to the specified category.
     */

/*******  1e33c2d1-dd06-49d8-96f2-0b31f487910c  *******/
    public function getBoardingHouseByCategorySlug($slug)
    {
        return BoardingHouse::whereHas('category', function(Builder $query) use ($slug) {
            return $query->where('slug', $slug);
        })->get();
    }

    public function getBoardingHouseBySlug($slug)
    {
        return BoardingHouse::where('slug', $slug)->first();
    }
}
