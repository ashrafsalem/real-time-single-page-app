<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Reply;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpCache\ResponseCacheStrategy;

class LikeController extends Controller
{
    public function likeIt(Reply $reply)
    {
        $reply->likes()->create([
            'user_id' => '1'
        ]);

        return response('created', Response::HTTP_CREATED);

    }

    public function unLikeIt(Reply $reply)
    {
        $reply->likes()->where('user_id', '1')->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
