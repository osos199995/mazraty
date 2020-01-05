<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
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
            'title'=>$this->title,
            'title_ar'=>$this->title_ar,
            'description'=>$this->description,
            'description_ar'=>$this->description_ar,
            'price'=>$this->price,
            'number_of_container'=>$this->number_of_container,
            'container'=>$this->container,
            'category name'=>$this->category->name,
            'subcategory name'=>$this->Subcategory->name,
            'images'=>json_decode($this->images),
        ];
    }
}
