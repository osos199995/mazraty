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
        'title'=>$this->cart->title,
        'title_ar'=>$this->cart->title_ar,
        'description'=>$this->cart->description,
        'description_ar'=>$this->cart->description_ar,
        'price'=>$this->cart->price,
        'minimum_qty'=>$this->cart->minimum_qty,
        'number_of_container'=>$this->cart->number_of_container,
        'container'=>$this->cart->container,
    
        ];
    }
}
