<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SignatureCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return ['data' => $this->collection->map(function ($signature) {
            return [
                'id' => $signature->id,
                'full_name' => $signature->full_name,
                'created_at' => $signature->created_at,
            ];
        })];

//        return parent::toArray($request);
    }
}
