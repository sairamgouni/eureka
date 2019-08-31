<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Carbon\Traits\Date;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ChallengeResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $response = [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'image' => $this->image,
            'status' => $this->status,
            'description' => $this->description,
            'likes' => $this->likers()->count(),
            'comments' => $this->comments()->count(),
            'ideas_count' => $this->comments()->where('created_at', '>=', $this->start_date)
                ->where('created_at', '<=', $this->end_date)->count(),
            'otherUsersLiked' => $this->likers()->count(),
            'user' => new ChallengeOwnerResource($this->user),
            'created_at' => $this->created_at->diffForHumans(),
        ];


        if (Auth::check()) {
            $user = Auth::user();
            $response['isUserLiked'] = (int)$user->hasLiked($this->resource);
            $response['isAuthor'] = ($user->id == $this->created_by) ? 1 : 0;
        }

        return $response;
    }
}
