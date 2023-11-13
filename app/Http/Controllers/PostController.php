<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class PostController extends Controller
{
    public function index()
    {
        return PostResource::collection(Post::all());
    }

    public function filterPosts(Request $request)
    {
        $query = Post::query();
    
        // Filtering based on the social network
        if ($request->has('network') && $request->network != '') {
            $query->where('social_network', $request->network);
        }
    
        // Filtering based on a date range
        if (
            $request->has('startDate') && $request->startDate != '' &&
            $request->has('endDate') && $request->endDate != ''
        ) {
            $query->whereBetween('date_posted', [$request->startDate, $request->endDate]);
        }
    
        // Filtering based on the content text of the post
        if ($request->has('text') && $request->text != '') {
            $query->where('content', 'like', '%' . $request->text . '%');
        }
    
        // Retrieve the filtered posts
        $posts = $query->get();
        
        // Return the posts as a collection of PostResource
        return PostResource::collection($posts);
    }
    

}
