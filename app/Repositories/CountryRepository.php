<?php

namespace App\Repositories;

use App\Interfaces\CountryInterface;
use App\Models\Country;

class CountryRepository implements CountryInterface
{
    public function all($search = null)
    {
        return Country::search($search)->paginate();
    }

    public function find(Country $country): Country
    {
        return Country::find($country);
    }

    public function create(array $data): Country
    {
        return Country::create($data);
    }

    public function update(Country $country, array $data): Country
    {
        $country->update($data);
        return $country;
    }

    public function delete(Country $country): bool
    {
        return Country::destroy($country->id);
    }

}