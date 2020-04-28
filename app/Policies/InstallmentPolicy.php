<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Installment;
use App\Models\User;

class InstallmentPolicy
{
    use HandlesAuthorization;

    public function own(User $user, Installment $installment) {
        return $installment->user_id == $user->id;
    }
}
