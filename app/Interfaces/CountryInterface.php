<?php

namespace App\Interfaces;

use App\Models\Country;
use Illuminate\Support\Collection;

interface CountryInterface
{
    public function all($search = null);

    public function find(Country $country);

    public function create(array $data);

    public function update(Country $country, array $data);

    public function delete(Country $country);
}