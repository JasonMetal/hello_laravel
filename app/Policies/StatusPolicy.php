<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use App\Models\Status;

/**
 * Notes:该授权策略
 * Class StatusPolicy
 * @package App\Policies
 * Time: 2018/8/20/020 23:32
 */
class StatusPolicy
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
    public function destroy(User $user,Status $status){
        return $user->id === $status->user_id;
    }
}
