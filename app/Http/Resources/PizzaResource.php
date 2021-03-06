<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class PizzaResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => Url::to('/image/' . $this->image),
            'size' => $this->size,
            'weight' => $this->weight,
            'price' => $this->price,
            'base' => $this->base,
            'hint' => $this->hint,
            'like' => $this->like,
            'vegan' => $this->vegan,
            'ingredients' => $this->ingredients
        ];
    }
}
