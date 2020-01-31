<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'salary_mxn' => $this->salary_mxn,
            'salary_usd' => $this->salary_usd,
            'address' => $this->address,
            'city' => $this->city,
            'enabled' => $this->enabled,
        ];
    }
}
