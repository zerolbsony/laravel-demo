<?php

namespace Nero\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class BookResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'author' => $this->author,
//            'comments' => CommentResource::collection($this->comments),//不受控制器中是否使用with预关联comments
            'comments' => CommentResource::collection($this->whenLoaded('comments')),//依赖控制器里用with关联comments模型，否则不会返回这个键值给页面
        ];
    }

    public function withResponse($request, $response)
    {
        $response->header('X-Value', 'True');
    }
}