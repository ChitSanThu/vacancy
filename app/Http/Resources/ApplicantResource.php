<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplicantResource extends JsonResource
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
            'id'=>$this->id,
            'position'=>$this->position->name??"",
            'name'=>$this->name,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'birthday'=>$this->birthday,
            'address'=>$this->address,
            'image'=>asset($this->image),
            'resume'=>asset($this->resume),
            'interview'=>$this->interview,
            'status'=>$this->status,
            'resumeFileName'=>explode('/',$this->resume)[count(explode('/',$this->resume))-1]
        ];
    }
}
