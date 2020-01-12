<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OfferResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'offer name'=>$this->product->title,
            'old price'=>$this->product->price,
            'offer price'=>$this->offer_currency,
            'category name'=>$this->product->category->name,
            'subcategory name'=>$this->product->subcategory->name,
          
        ];
    }
}
