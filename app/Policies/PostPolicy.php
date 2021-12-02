<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
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
    public function checkkaryawan(User $user)
    {
        return ($user->status ==''
            ? Response::allow()
            : Response::deny('Hanya karyawan / Admin yang dapat mengakses')
        );
    }
    public function delete(User $user)
    {
        return ($user->status =='Admin'
            ? Response::allow()
            : Response::deny('Hanya admin yang bisa')
        );
    }
}
