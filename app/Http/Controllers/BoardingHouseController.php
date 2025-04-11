<?php

namespace App\Http\Controllers;

use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\CityRepositoryInterface;
use App\Repositories\CityRepository;
use Illuminate\Http\Request;

class BoardingHouseController extends Controller
{

    private CityRepositoryInterface  $cityRepository;
    private CategoryRepositoryInterface $categoryRepository;
    private BoardingHouseRepositoryInterface $boardingHouseRepository;

    public function __construct(CityRepositoryInterface $cityRepository, CategoryRepositoryInterface $categoryRepository, BoardingHouseRepositoryInterface $boardingHouseRepository)
    {
        $this->cityRepository = $cityRepository;
        $this->categoryRepository = $categoryRepository;
        $this->boardingHouseRepository = $boardingHouseRepository;
    }

    public function find()
    {
        $cities = $this->cityRepository->getAllCities();
        $categories = $this->categoryRepository->getAllCategories();
        return view('pages.boarding-house.find', compact('cities', 'categories'));
    }

    public function show($slug)
    {
        $boardingHouse = $this->boardingHouseRepository->getBoardingHouseBySlug($slug);
        return view('pages.boarding-house.show', compact('boardingHouse'));
    }

    public function findResults(Request $request)
    {
        $boardingHouses = $this->boardingHouseRepository->getAllBoardingHouses($request->search, $request->city, $request->category);

        return view('pages.boarding-house.index', compact('boardingHouses'));
    }
}
