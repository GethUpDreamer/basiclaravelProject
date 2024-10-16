<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Contact;
class HomeController extends Controller
{
    // Show room details
    public function room_details($id)
    {

        $room = Room::find($id);

         return view('home.room_details',compact('room'));
    }

    // Add a booking for a room
    public function add_booking(Request $request, $id)
    {
        $request->validate([
            'startDate' => 'required|date',
            'endDate' => 'required|after:startDate',
        ]);


        // Store the booking
        $room= new Booking();
        $room->room_id = $id;
        $room->name = $request->name;
        $room->email = $request->email;
        $room->phone = $request->phone;

        $startDate = $request->startDate;
        $endDate = $request->endDate;


        $isBooked = Booking::where('room_id', $id)
         ->where('start_date', '<=', $endDate)
         ->where('start_end', '>=', $startDate) // 'end_date' instead of 'start_end'
         ->exists();
        if($isBooked){
            return redirect()->back()
            ->with('message', 'Room is already booked please try different date!');
        }else{
        $room->start_date = $request->startDate;
        $room->start_end = $request->endDate;

        $room->save();


        return redirect()->back()->with('message', 'Room booked successfully!');
        }




    }

    public function contact(Request $request)
    {
        // Validation for the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:15',
            'message' => 'required|string',
        ]);

        // Saving the contact information to the database
        $contact = new Contact();

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;

        $contact->save();

        // Redirecting back with a success message
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
