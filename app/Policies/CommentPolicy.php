<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Customer;
use App\Models\Comment;

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

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function changeComment(Customer $customer, Comment $comment)
    {
        return $customer->id === $comment->customer_id;
    }
}
