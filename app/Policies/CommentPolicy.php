<?php

namespace App\Policies;

use App\Models\Model\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function editComment(User $user, Comment $comment)
    {
        if($comment->user_id == $user->id)
        {
            return true;
        }
        return false;
    }
}
