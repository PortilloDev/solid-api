<?php

namespace App\Http\Resources\Book;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'type' => 'book',
            'attributes' => [
                'title' => $this->title,
                'category' => $this->category->name,
                'authors' => $this->authors,
                'pages' => $this->pages,
                'description' => $this->description,
                'read' => $this->read ? true : false,
                'summary' => $this->summary,
                'isbn_10' => $this->isbn_10,
                'isbn_13' => $this->isbn_13,
                'slug' => $this->slug,
                'image_smallThumbnail' => $this->image_smallThumbnail,
                'image_thumbnail' => $this->image_thumbnail,
                'tags' => $this->tags->pluck('name')->implode(', '),

            ]
        ];
    }
}
