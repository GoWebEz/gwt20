<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        $fullName = $this->first_name . ' ' . $this->last_name;
        return [
            'id'                => $this->id,
            'name'              => $this->name,
            'first_name'        => $this->first_name,
            'last_name'         => $this->last_name,
            'full_name'         => $fullName,
            'email'             => $this->email,
            'phone'             => $this->phone,
            'role_name'         => $this->role->name,
            'designation_name'  => $this->designation->name,
        ];
    }
}
