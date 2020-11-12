<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'slug'=>$this->slug,
            'title'=>$this->title,
            'body'=>$this->body,
            'created_at'=>(string)$this->created_at,
            'updated_at'=>$this->updated_at,
            'user'=>new UserResource($this->user)

        ];
       // return parent::toArray($request);
    }
}
