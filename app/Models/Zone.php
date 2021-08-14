<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Zone extends Model
{
    use HasFactory;

    protected $table = "zone";

    protected $guarded = [];

    public $timestamps  = false;

    public static function getCountry_()
    {
        $res = DB::select('select * from country');
        foreach ($res as $row) {
            $country_[$row->id] = trim($row->name);
        }

        return $country_;
    }
}
