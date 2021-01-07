<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserBook extends Pivot
{
    // $attributes = [
    //     'date_added' => 
    //     //php date.now,
    //     'date_started' => null,
    //     'date_completed' => null,
    //     'status' => '',
    // ];
    protected $table = 'user_books';
}