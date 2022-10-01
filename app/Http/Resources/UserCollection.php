<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
   public $collects=UserResource::class;

    public function toArray($request)
    {
        return [
            'status'=>true,
            'users'=>$this->collection
        ];
    }
}
