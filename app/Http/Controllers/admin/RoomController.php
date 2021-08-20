<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{

    public function edit(Request $request)
    {
        $data_ = [
            'title' => "Oda Ekle/Düzenle",
            'room' => new Room()
        ];

        if ($request->get('room_id')) {
            $data_['room'] = Room::where('id' , $request->get('room_id'))->where('hotel_id', $request->get('hotel_id'))->first();
        }

        return view('admin.room.edit', $data_);
    }

    public function save(Request $request)
    {
        Room::updateOrCreate(
            ['id' => $request->id],
            [
                'hotel_id' => $request->hotel_id,
                'name' => $request->name,
                'adt_cnt' => $request->adt_cnt,
                'kid_cnt' => $request->kid_cnt,
                'stock' => $request->stock,
                'info_s' => $request->info_s,
            ]
        );

        return redirect()->route('admin.hotel');
    }

    public function delete(Request $request){
       $room = Room::findOrFail($request->get('id'));
       $room->delete();

       return redirect()->route('admin.hotel');
    }

}
