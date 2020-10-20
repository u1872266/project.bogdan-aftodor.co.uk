<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    public function findWithUserUpdates($id){
        return $this->leftJoin('users','cities.updated_by','=','users.id')
                    ->where('cities.id',$id)
                    ->first(['users.name','cities.*']);
    }
}
