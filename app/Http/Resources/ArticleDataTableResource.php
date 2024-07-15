<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleDataTableResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'approval_status' => $this->approval_status,
            'publication_status' => $this->whenHas($this->publication_status, function () {
                return  $this->publication_status;
            }),
            'author_name' => $this->author->name,
            'image' => asset('assets/img/articles' . $this->image),
        ];
    }
}