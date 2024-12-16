<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AnswerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'body' => $this->body,
            'votes_count' => $this->votes_count,
            'question_id' => $this->question_id,
            'user' => UserResource::make($this->user),
            'created_at' => DateTimeResource::make($this->created_at)
        ];
    }
}
