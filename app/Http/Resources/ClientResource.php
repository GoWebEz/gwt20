<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
        return [
            'id' => $this->id,
            'name'           =>$this->name ,
            'opening_hour'          =>$this->opening_hour,
            'startup_hour'         =>$this->startup_hour ,
            'closing_hour'          =>$this->closing_hour ,
            'shutdown_hour'        =>$this->shutdown_hour ,
            'measurement'           =>$this->measurement,
            'cost_per_measurement'  =>$this->cost_per_measurement ,
        ];
    }
}
