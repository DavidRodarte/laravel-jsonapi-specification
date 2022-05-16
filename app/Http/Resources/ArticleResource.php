<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        return [
            'type' => 'articles',
            'id' => (string)$this->getRouteKey(),
            'attributes' => [
                'title' => $this->title,
                'slug' => $this->slug,
                'content' => $this->content
            ],
            'links' => [
                'self' => url('/api/v1/articles/' . $this->getRouteKey())
            ]
        ];
    }

    /*     Override toResponse method to add headers */
    public function toResponse($request)
    {
        return parent::toResponse($request)->withHeaders([
            'Location' => route('api.v1.articles.show', $this->resource)
        ]);
    }
}
