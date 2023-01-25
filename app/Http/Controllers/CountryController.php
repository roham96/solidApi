<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Http\Requests\CountryRequest;
use App\Http\Resources\CountryResource;
use App\Http\Resources\CountryCollection;

use App\Repositories\CountryRepository;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CountryController extends Controller
{
    private $country;

    public function __construct(CountryRepository $countryRepository)
    {
        $this->country = $countryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\CountryCollection
     */
    public function index(): ResourceCollection
    {
        return new CountryCollection($this->country->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CountryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryRequest $request)
    {
        $country = $this->country->create($request->validated());
        return new CountryResource($country);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        return new CountryResource($country);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CountryRequest  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(CountryRequest $request, Country $country)
    {
        $country = $this->country->update($country, $request->validated());
        return new CountryResource($country);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $this->country->delete($country);
        return response()->noContent();
    }

}