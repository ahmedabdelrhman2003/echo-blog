<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
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
            'approval_status' => $this->approval_status,
            'description' => $this->description,
            'post' => $this->post,
            'image' => $this->asset('assets/images/articles/' . $this->image),
            'content' => $this->whenHas('content', function () {
                return $this->content;
            }),
            'author_name' => $this->author->name,
            // 'updated_at' => $this->updated_at,
            // 'created_at' => $this->created_at,
        ];
    }
}