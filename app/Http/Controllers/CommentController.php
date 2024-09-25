<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    public function store(Request $request, $postId)
    {
        $userid = Auth::id(); // Get the authenticated user's ID

        $request->validate([
            'body' => 'required|string',
        ]);

        // Create the comment with the correct user_id
        Comment::create([
            'post_id' => $postId,
            'body' => $request->body,
            'user_id' => $userid, // Use the authenticated user's ID
        ]);

        return redirect()->back()->with('success', 'Comment added successfully!');
    }
}
