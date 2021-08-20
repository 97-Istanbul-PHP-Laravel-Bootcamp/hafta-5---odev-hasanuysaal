<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "room";

    protected $casts = [
        'info_s' => 'array'
    ];

    public static function getRoomFeatures(){

        $data_ = [
            'game_cons' => [
                'name' => 'game_cons',
                'title' => 'Oyun Konsolu'

            ],
            'case' => [
                'name' => 'case',
                'title' => 'Kasa'

            ],
            'minibar' => [
                'name' => 'minibar',
                'title' => 'Minibar'

            ],
            'tv' => [
                'name' => 'tv',
                'title' => 'Televizyon'

            ],
            'projc' => [
                'name' => 'projc',
                'title' => 'Projeksiyon'
            ],
        ];

        return $data_;

    }

    public function isChecked($data){
        if (isset($this->info_s[$data["name"]])){
            return "checked";
        }else{
            return "";
        }
    }
}
