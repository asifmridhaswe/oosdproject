<?php

namespace App\Http\Controllers\Admin;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reservation;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservation.index', compact('reservations'));
    }

    public function status($id){
        $reservation = Reservation::find($id);
        $reservation->status = true;
        $reservation-> save();
        Toastr::success('Reservation successfully Confirmed', 'Success',
            ["positionClass"=>"toast-top-right"]);
        return redirect()->back();
    }

    public function destroy($id)
    {
        Reservation::find($id)->delete();
        Toastr::success('Reservation successfully deleted. We will confirm you soon',
            'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
