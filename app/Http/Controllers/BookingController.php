<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Booking;
use DB;

class BookingController extends Controller
{
    // view page all booking
    public function allbooking()
    {
        $allBookings = DB::table('bookings')->get();
        return view('formbooking.allbooking',compact('allBookings'));
    }

    // booking add
    public function bookingAdd()
    {
        $data = DB::table('room_types')->get();
        $user = DB::table('users')->get();
        return view('formbooking.bookingadd',compact('data','user'));
    }

    // booking edit
    public function bookingEdit($bkg_id)
    {
        $bookingEdit = DB::table('bookings')->where('bkg_id',$bkg_id)->first();
        return view('formbooking.bookingedit',compact('bookingEdit'));
    }

    // booking save record
    public function saveRecord(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'room_type'     => 'required|string|max:255',
            'arrival_date'  => 'required|string|max:255',
            'depature_date' => 'required|string|max:255',
            'email'      => 'required|string|max:255',
            'phone_number'  => 'required|string|max:255',
            'message'    => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        try {

            $booking = new Booking;
            $booking->name = $request->name;
            $booking->room_type     = $request->room_type;
            $booking->total_numbers  = $request->total_numbers;
            $booking->arrival_date   = $request->arrival_date;
            $booking->depature_date  = $request->depature_date;
            $booking->email       = $request->email;
            $booking->ph_number   = $request->phone_number;
            $booking->message     = $request->message;
            $booking->save();

            DB::commit();
            Toastr::success('Create new booking successfully :)','Success');
            return redirect()->route('form/allbooking');

        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Add Booking fail :)','Error');
            return redirect()->back();
        }
    }

    // update record
    public function updateRecord(Request $request)
    {
        DB::beginTransaction();
        try {


            $update = [
                'bkg_id' => $request->bkg_id,
                'name'   => $request->name,
                'room_type'  => $request->room_type,
                'total_numbers' => $request->total_numbers,
                'arrival_date'   => $request->arrival_date,
                'depature_date'  => $request->depature_date,
                'email'   => $request->email,
                'ph_number' => $request->phone_number,
                'message'   => $request->message,
            ];

            Booking::where('bkg_id',$request->bkg_id)->update($update);

            DB::commit();
            Toastr::success('Updated booking successfully :)','Success');
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Update booking fail :)','Error');
            return redirect()->back();
        }
    }
    
    // delete record booking
    public function deleteRecord(Request $request)
    {
        try {

            Booking::destroy($request->id);
            unlink('assets/upload/'.$request->fileupload);
            Toastr::success('Booking deleted successfully :)','Success');
            return redirect()->back();

        } catch(\Exception $e) {

            DB::rollback();
            Toastr::error('Booking delete fail :)','Error');
            return redirect()->back();
        }
    }

}
