<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{

    public function toArray($request)
    {
      return[

        'id'=>$this->id,
        'title'=>$this->title,
        'slug'=>$this->slug,
        'image'=>$this->image,
        'description'=>$this->description,
        'price'=>$this->price,
        'created_at'=>(new \DateTime($this->created_at))->format('Y-m-d H:i:s'),
        'updated_at'=>(new \DateTime($this->updated_at))->format('Y-m-d H:i:s'),

      ];
    }
}
