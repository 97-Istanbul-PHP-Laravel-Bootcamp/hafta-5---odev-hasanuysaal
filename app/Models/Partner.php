<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $table = "partner";

    protected $fillable = [
        'name',
        'cname',
        'mpno',
        'email',
    ];


    public function statusCode()
    {
        $arr_ = [
            'a' => 'success',
            'p' => 'danger',
            't' => 'warning'
        ];

        return $arr_[$this->status];
    }
}
