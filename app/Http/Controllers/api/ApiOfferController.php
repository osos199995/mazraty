<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\OfferResource;
use App\Offers;

class ApiOfferController extends Controller
{
    use ApiResponceTrait;

    public function index()
    {
        $offers=OfferResource::collection(Offers::paginate($this->paginateNumber));

        return $this->ApiResponce($offers) ;
    }





}
