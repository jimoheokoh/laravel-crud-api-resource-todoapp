<?php

namespace App\Http\Resources;

use App\Http\Resources\ListResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'due' => $this->due,
            'completed' => $this->completed,
            'list' => ListResource::make($this->todoList),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
