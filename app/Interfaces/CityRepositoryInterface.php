<?php


namespace App\Interfaces;


interface CityRepositoryInterface
{
    public function getAllCities();

    public function getCityBySlug($slug);
    // public function getCityById($id);
    // public function createCity(array $data);
    // public function updateCity($id, array $data);
    // public function deleteCity($id);

}


?>
