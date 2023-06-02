<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Brian2694\Toastr\Facades\Toastr;
use DB;

class RoomsController extends Controller
{
    // index Page
    public function allrooms(){
        $allRooms = DB::table('rooms')->get();
        return view('room.allroom',compact('allrooms'));
    }

    //--------------------------------------------------------------------

        // Add Room
    public function addRoom(){
        $data = DB::table('room_types')->get();
        $user = DB::table('users')->get();
        return view('room.addroom',compact('user', 'data'));
    }


    //--------------------------------------------------------------------

        // Edit Room
    public function editRoom($bkg_room_id){
        $roomEdit = DB::table('rooms')->where('Bkg_room_id', $bkg_room_id)->first();
        $data = DB::table('room_types')->get();
        $user = DB::table('users')->get();
        return view('room.editroom', compact('user','data','roomEdit'));
    }

    //--------------------------------------------------------------------

        // Save Record Room
    public function saveRecordRoom(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'room_type' => 'required|string|max:255',
            'ac_non_ac' => 'required|string|max:255',
            'bed_count' => 'required|string|max:255',
            'charges_for_cancellation' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'message' => 'required|string|max:255',

        ]);

        DB::beginTransaction();
        try {

            $room = new Room;
            $room->name = $request->name;
            $room->room_type = $request->room_type;
            $room->ac_non_ac = $request->ac_non_ac;
            $room->bed_count = $request->bed_count;
            $room->charges_for_cancellation = $request->charges_for_cancellation;
            $room->phone_number = $request->phone_number;
            $room->message = $request->message;
            $room->save();

            DB::commit();
            Toastr::success('Create new room successfully:', 'Success');
            return redirect()->route('form/allrooms/page');

        } catch(\Exception $e){
            DB::rollback();
            Toastr::error('Add Room Fail:', 'Error');
            return redirect()->back();
        }
    }

    //--------------------------------------------------------------------

        // Update Record Room
    public function updateRecord(Request $request){

        DB::beginTransaction();
        try {

            $update = [
                'bkg_room_id' => $request->bkg_room_id,
                'name' => $request->name,
                'room_type' => $request->room_type,
                'ac_non_ac' => $request->ac_non_ac,
                'bed_count' => $request->bed_count,
                'charges_for_cancellation' => $request->charges_for_cancellation,
                'phone_number' => $request->phone_number,
                'message' => $request->message,

            ];

            Room::where('bkg_room_id',$request->bkg_room_id)->update($update);

            DB::commit();
            Toastr::success('Update room successfully:', 'Success');
            return redirect()->back();

        } catch(\Exception $e){
            DB::rolback();
            Toastr::error('Update room fail:', 'Error');
            return redirect()->back();
        }
    }

    //--------------------------------------------------------------------

        // Delete Record Room
    public function deleteRecord(Request $request){
        try{

            Room::destroy($request->id);
            Toastr::success('Room Deleted successfully:', 'Success');
            return redirect()->back();

        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Room Delete Fail:', 'Error');
            return redirect()->back();
        }
    }

}
