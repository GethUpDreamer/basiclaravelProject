<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Gallery;
use App\Models\Contact;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification; 
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    // Dashboard index method
    public function index()
    {
        if (Auth::check()) {
            // Retrieve the authenticated user's type
            $userType = Auth::user()->usertype;

            // Redirect based on user type
            if ($userType == 'user') {
                $rooms = Room::all();
                $gallary = Gallery::all();
                return view('home.index', compact('rooms','gallary'));
            } elseif ($userType == 'admin') {
                return view('admin.index');
            } else {
                return redirect()->back()->with('error', 'Unauthorized access.');
            }
        }

        // Redirect to login if not authenticated
        return redirect()->route('login')->with('error', 'You need to log in first.');
    }

    // Home page method
    public function home()
    {
        $rooms = Room::all();
        $gallary = Gallery::all();
        return view('home.index', compact('rooms','gallary'));
    }

    // Create room form method
    public function create_room()
    {
        return view('admin.create_room');
    }

    // Store room method
    public function add_room(Request $request)
    {
        // Validate the request data
        $request->validate([
            'room_title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'room_type' => 'required|string',
            'wifi' => 'required|boolean',
        ]);

        $room = new Room();
        $room->fill($request->only(['room_title', 'description', 'price', 'room_type', 'wifi']));

        // Handle the image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $uploadPath = public_path('Upload_image');

            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true);
            }

            $request->file('image')->move($uploadPath, $imageName);
            $room->image = $imageName;
        }

        // Save the room
        $room->save();

        return redirect()->back()->with('success', 'Room created successfully!');
    }


    // View room method
    public function view_room()
    {
        // Retrieve all rooms from the database
        $rooms = Room::all();

        // Pass the rooms data to the view
        return view('admin.view_room', compact('rooms'));
    }

    // Delete room method
    public function room_delete($id)
    {
        // Find the room by ID
        $room = Room::findOrFail($id);

        // Delete the room's image from the server if it exists
        if (File::exists(public_path('Upload_image/' . $room->image))) {
            File::delete(public_path('Upload_image/' . $room->image));
        }

        // Delete the room from the database
        $room->delete();

        // Redirect back to the rooms list with a success message
        return redirect()->back()->with('success', 'Room deleted successfully.');
    }

    // Update room form method
    public function update_room($id)
    {
        // Retrieve the room by ID
        $room = Room::find($id);

        // Return the view with the room data
        return view('admin.update_room', compact('room'))->with('success', 'Room Updated successfully!');
    }

    // Edit room method
    public function edit_room(Request $request, $id)
    {
        // Find the room by ID
        $room = Room::findOrFail($id);

        // Validate input data
        $request->validate([
            'room_title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'room_type' => 'required|string',
            'wifi' => 'required|boolean',

        ]);

        // Update the room details
        $room->room_title = $request->room_title;
        $room->description = $request->description;
        $room->price = $request->price;
        $room->room_type = $request->room_type;
        $room->wifi = $request->wifi;

        // Handle image upload if new image is uploaded
        $image = $request->file('image'); // Use 'file' method to retrieve file
        if ($image) {
            // Generate a unique image name using the current timestamp and the file extension
            $imageName = time().'.'.$image->getClientOriginalExtension();

            // Move the image to the 'Upload_image' directory
            $image->move(public_path('Upload_image'), $imageName);

            // Assign the image name to the room model (or whatever model you're working with)
            $room->image = $imageName;
        }



        // Save the updated room data
        $room->save();

        return redirect()->back()->with('success', 'Room updated successfully!');
    }

    public function bookings()
    {
        $room=Booking::all();
    return view('admin.booking',compact('room'));
    }

    public function delete_booking($id)
    {
        $room=Booking::findOrFail($id);
        if (File::exists(public_path('Upload_image/' . $room->room->image))) {
            File::delete(public_path('Upload_image/' . $room->room->image));
        }

        // Delete the room from the database
        $room->delete();

        // Redirect back to the rooms list with a success message
        return redirect()->back()->with('success', 'Booking deleted successfully.');

    }
    public function approve_book($id){
      $booking = Booking::Find($id);
      $booking->status='approve';
      $booking->save();
      return redirect()->back();

    }

    public function reject_book($id){
        $booking = Booking::Find($id);
        $booking->status='rejected';
        $booking->save();
        return redirect()->back();

      }
      public function view_gallary()

    {
        $gallary = Gallery::all();
        return view('admin.gallery',compact('gallary')); // Make sure you have a view at resources/views/admin/gallery.blade.php
    }

    // Handle the image upload
    public function upload_gallary(Request $request)
    {
        $room = new Gallery();
        // Validate the request
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust rules as needed
        ]);

        // Create a new instance of Gallery


        // Handle the image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('Upload_image'), $imageName); // Save image to public/Upload_images directory

            // Set the image name in the database
            $room->image = $imageName;
        }

        // Save the new gallery entry
        $room->save();

        // Return a response or redirect with success message
        return redirect()->back()->with('success', 'Image uploaded successfully!');
    }
    public function delete_gallary($id){

        $gallary = Gallery::findOrFail($id);
        //   // Delete the room's image from the server if it exists
        //   if (File::exists(public_path('Upload_image/' . $gallary->image))) {
        //     File::delete(public_path('Upload_image/' . $gallary->image));
        // }

        // Delete the room from the database
        $gallary->delete();

        // Redirect back to the rooms list with a success message
        return redirect()->back()->with('success', 'Room deleted successfully.');

    }
    public function all_messages() {
        $contact = Contact::all(); // Display 10 messages per page
        return view('admin.all_message', compact('contact'));
    }

    public function send_mail($id) {
        $data = Contact::find($id);
    
        if (!$data) {
            return redirect()->back()->with('error', 'Contact not found.'); // Redirect or show an error message
        }
    
        return view('admin.send_mail', compact('data'));
    }
    
    public function mail(Request $request, $id) {
        $data = Contact::find($id);
    
        if (!$data) {
            return redirect()->back()->with('error', 'Contact not found.');
        }
    
        // Corrected $details array
        $details = [
            'greeting' => $request->greeting, // Correct assignment with =>
            'body' => $request->body,
            'action_text' => $request->action_text, // Only one key for 'action_text'
            'action_url' => $request->action_url,  // Assuming action_url was intended
            'endline' => $request->endline,
        ];
    
        // Send the notification
        Notification::send($data, new SendEmailNotification($details));
    
        return redirect()->back()->with('success', 'Email sent successfully.');
    }
    
    
    
}
