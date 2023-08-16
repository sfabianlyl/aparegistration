<?php

namespace App\Models;

class Role extends \TCG\Voyager\Models\Role
{
    // ...
    public function scopeSecretariat($query){
        if(auth()->user()->role_id==1) return $query;
        return $query->whereIn('id', [3,4,5]);
    }
}