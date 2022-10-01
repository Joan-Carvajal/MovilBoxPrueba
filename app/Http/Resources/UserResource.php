<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
   
    public static $wrap = 'users';

    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'email' => $this->email,
            'profile_id' =>$this->profile_id,
            'state'=> $this->state
        ];
    }
}
