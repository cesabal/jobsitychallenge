<?php

namespace App\Policies;

use App\User;
use App\Entry;
use Illuminate\Auth\Access\HandlesAuthorization;

class EntryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the entry.
     *
     * @param  \App\User  $user
     * @param  \App\Entry  $entry
     * @return mixed
     */
    public function view(User $user, Entry $entry)
    {
        // All users have permision to see Entries
        return true;
    }

    /**
     * Determine whether the user can create entries.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        // Check if user 
        if ($user->id) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the entry.
     *
     * @param  \App\User  $user
     * @param  \App\Entry  $entry
     * @return mixed
     */
    public function update(User $user, Entry $entry)
    {
        // Check if user is the post author
        if ($user->id === $entry->author) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the entry.
     *
     * @param  \App\User  $user
     * @param  \App\Entry  $entry
     * @return mixed
     */
    public function delete(User $user, Entry $entry)
    {
        // Check if user is the post author
        if ($user->id === $entry->author) {
            return true;
        }

        return false;
    }
}
