<?php

namespace App\Policies;

use App\Models\Model\Section;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SectionPolicy
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

    public function before(User $user)
    {
        if ($user->role == 'admin') {
            return true;
        }
    }

    public function controlPost(User $user, Section $section)
    {
        if ($user->id == $section->admin) {
            return true;
        }
        return false;
    }
}
