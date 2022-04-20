<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Mail\BookinfMail;
use Mail;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function specialities()
    {
        return view ('frontend.pages.specialities');
    }

    // public function table()
    // {
    //     return view('admin.pages.booking');
    // }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function booking(Request $request)
    {
            $booking = new Booking;
            $booking-> full_name  = $request->full_name;
            $booking-> booking_seat = $request->booking_seat;
            $booking-> booking_email = $request->booking_email;
            $booking-> booking_phone = $request->booking_phone;
            $booking-> booking_date = $request->booking_date;
            $booking-> time = $request->booking_status;
            $booking-> booking_status = "pending";
            $save = $booking->save();

            if($save){
                \Mail::to($request->booking_email)->send(new \App\Mail\BookinfMail($booking));
                return back()->with('success','Table reservation success! ');
            }else{
                return back()->with('fail','Something went wrong, try again later');
            }
    }


    public function VerifyReservation(Request $request){
        $data = Booking::findOrFail($request->rId);
        $data->booking_status = $request->status;
        $data->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function table(Booking $booking)
    {
        $breadcrum = "Table Booking";
        $items = Booking::orderBy('created_at', 'desc')->paginate(8);
        return view('admin.pages.booking',["table"=>$items, 'breadcrum'=>$breadcrum]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function tableDestroy($id)
    {
        Booking::find($id)->delete();
        return back()->with('success','Data removed!');
    }
}
