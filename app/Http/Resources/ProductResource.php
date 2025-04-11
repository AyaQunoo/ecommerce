<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "product_id"=>$this->id,
            "produc_name"=>$this->name,
            "product_desc"=>$this->desc,
            "product_image"=> asset("storage") . "/". $this->image,
            "product_price"=>$this->price,

        ];
    }
}
