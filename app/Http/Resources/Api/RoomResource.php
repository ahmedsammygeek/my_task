<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Storage;
class RoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id , 
            'name' => $this->name , 
            'price' => $this->price , 
            'description' => $this->description , 
            'type' => $this->roomsTypesAsText() , 
            'area' => new AreaResource($this->area) , 
            'image' => Storage::url('rooms/'.$this->image),
        ];
    }
}
