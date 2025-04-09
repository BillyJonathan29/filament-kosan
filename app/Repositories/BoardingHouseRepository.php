<?php

namespace App\Repositories;

use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Models\BoardingHouse;
use Filament\Forms\Components\Builder;



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

    public function getBoardingHouseByCategorySlug($slug)
    {
        return BoardingHouse::whereHas('category', function(Builder $query) use ($slug) {
            return $query->where('slug', $slug);
        });
    }

    public function getBoardingHouseBySlug($slug)
    {
        return BoardingHouse::where('slug', $slug)->first();
    }
}
