<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class DocterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "email" => $this->email,
            "phone" => $this->phone,
            "photo" => $this->photo === null ? null : url($this->photo),
            "images" => DocterImageResource::collection($this->images),
            "description" => $this->description,
            "address" => $this->address,
            "status_opration" => $this->status_opration === 1 ? true : false,
            "save_by_you" => $this->save_by_you === 1 ? true : false,
            "category" => new CategoryResource($this->category),
            "subdistrict" => new SubdistrictResource($this->subdistrict),
        ];
    }
}
