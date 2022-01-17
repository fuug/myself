<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;

class DeleteThumbController
{
    public function __invoke(User $user)
    {
        $user->update(array(
            'thumbnail' => 'images/guest.png',
        ));
        return redirect()->route('admin.user.show', $user->id);
    }
}
