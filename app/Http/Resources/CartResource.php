<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
        'cart id'=>$this->id,
        'cart qty'=>$this->qty,   
        'title'=>$this->Cart->title,
        'title_ar'=>$this->Cart->title_ar,
        'description'=>$this->Cart->description,
        'description_ar'=>$this->Cart->description_ar,
        'price'=>$this->Cart->price,
        'minimum_qty'=>$this->Cart->minimum_qty,
        'number_of_container'=>$this->Cart->number_of_container,
        'container'=>$this->Cart->container,
    
        ];
    }
}
