<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Event;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::where('roles',0)->count();
        $events = Event::count();
        $discounts = Discount::count();
        $services = Services::count();
        $dashboard = [
            'users' => $users,
            'events' => $events,
            'discounts' => $discounts,
            'services' => $services
        ];
        return view('dashboard')->with(compact('dashboard'));
    }
    public function index()
    {
        $users = User::where('roles',0)->orderBy('id','desc')->get()->toArray();
        return view('user.users')->with(compact('users'));
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email'
        ]);

        $edit_user = User::where('id', $id)->update([
            'name' => $request->first_name.' '.$request->last_name,
            'email' => $request->email,
            'roles' => $request->roles
        ]);

        if ($edit_user) {
            return redirect('users');
        } else {
            return redirect()->back()->withErrors($validated);
        }
    }
    public function destroy($id)
    {
        $delete_user = User::where('id', $id)->delete();
        $delete_user = UserDetail::where('user_id', $id)->delete();
        if ($delete_user) {
            return redirect('users');
        }
    }

    public function edit_user($id)
    {
        $user = User::where('id', $id)->get()->toArray();

        return view('user.edit_user')->with(compact('user'));
    }

    public function event()
    {
        $events = Event::orderBy('id','desc')->get()->toArray();
        return view('event.event')->with(compact('events'));
    }
    public function addevents()
    {
        return view('event.addevent');
    }
    public function saveevent(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required',
            'name' => 'required',
            'form' => 'required',
            'to' => 'required',
            'address' => 'required',
            'city' => 'required',
            'about' => 'required',
            'price' => 'required'
        ]);

        $Event = new Event();
        $Event->date =  $request->date;
        $Event->name =  $request->name;
        $Event->form =  $request->form;
        $Event->to =  $request->to;
        $Event->city =  $request->city;
        $Event->address =  $request->address;
        $Event->about =  $request->about;
        $Event->price =  $request->price;
        $Event->image = $request->imagepath;
        // if ($request->hasfile('photo')) {
        //     $file = $request->file('photo');
        //     $extension = $file->getclientoriginalExtension();
        //     $filename = time() . '.' . $extension;
        //     $file->move('image/', $filename);
        //     $Event->image = $filename;
          
        // }
        // if ($request->hasFile('photo')) {
        //     $file = $request->file('photo');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $extension;
        //     $directory = 'image'; // Specify the directory path where you want to store the image
        //     // Move the uploaded file to the specified directory
        //     $file->move(public_path($directory), $filename);
        //     // Set the image path in the database
        //     $Event->image = url($directory . '/' . $filename); // Generate the full URL of the image
        // }
        $Event->save();
      
        if ($Event) {
            return redirect('event');
        } else {
            return redirect()->back()->withErrors($validated);
        }
    }
    public function edit_event(Request $request, $id)
    {
        $events = Event::find($id);
        return view('event.editevent')->with(compact('events'));
    }
    public function saveeditevent(Request $request,$id)
    {
        $validated = $request->validate([
            'date' => 'required',
            'name' => 'required',
            'form' => 'required',
            'to' => 'required',
            'address' => 'required',
            'city' => 'required',
            'about' => 'required',
            'price' => 'required'
        ]);

        $Event = Event::find($id);
        $Event->date =  $request->date;
        $Event->name =  $request->name;
        $Event->form =  $request->form;
        $Event->to =  $request->to;
        $Event->city =  $request->city;
        $Event->address =  $request->address;
        $Event->about =  $request->about;
        $Event->price =  $request->price;
        $Event->image = $request->imagepath;
        // if ($request->hasfile('photo')) {
        //     $file = $request->file('photo');
        //     $extension = $file->getclientoriginalExtension();
        //     $filename = time() . '.' . $extension;
        //     $file->move('image/', $filename);
        //     $Event->image = $filename;
          
        // }
        // if ($request->hasFile('photo')) {
        //     $file = $request->file('photo');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $extension;
        //     $directory = 'image'; // Specify the directory path where you want to store the image
        //     // Move the uploaded file to the specified directory
        //     $file->move(public_path($directory), $filename);
        //     // Set the image path in the database
        //     $Event->image = url($directory . '/' . $filename); // Generate the full URL of the image
        // }
        $Event->update();
      
        if ($Event) {
            return redirect('event');
        } else {
            return redirect()->back()->withErrors($validated);
        }
    }
    public function delete_event($id)
    {
        $delete_user = Event::where('id', $id)->delete();
        if ($delete_user) {
            return redirect('event');
        }
    }
    public function discount()
    {
        $discounts = Discount::orderBy('id','desc')->get()->toArray();
        return view('discounts.discount')->with(compact('discounts'));
    }
    public function add_discount()
    {
        $events=Event::all();
        return view('discounts.add_discount')->with(compact('events'));
    }
    public function savediscount(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'promo_code' => 'required',
            'discount' => 'required',
            'event_id'=> 'required'
        ]);

        $Discount = new Discount();
        $Discount->event_id =  $request->event_id;
        $Discount->name =  $request->name;
        $Discount->promo_code =  $request->promo_code;
        $Discount->discount =  $request->discount;
        $Discount->save();

        if ($Discount) {
            return redirect('discount');
        } else {
            return redirect()->back()->withErrors($validated);
        }
    }
    public function edit_discount(Request $request, $id)
    {
        $discounts = Discount::find($id);
        $events=Event::all();
        return view('discounts.editdiscount')->with(compact('discounts','events'));
    }
    public function saveeditdiscount(Request $request,$id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'promo_code' => 'required',
            'discount' => 'required',
            'event_id'=> 'required'

        ]);

        $Discount = Discount::find($id);
        $Discount->event_id =  $request->event_id;
        $Discount->name =  $request->name;
        $Discount->promo_code =  $request->promo_code;
        $Discount->discount =  $request->discount;
        $Discount->update();
      
        if ($Discount) {
            return redirect('discount');
        } else {
            return redirect()->back()->withErrors($validated);
        }
    }
    public function delete_discount($id)
    {
        $delete_discount = Discount::where('id', $id)->delete();
        if ($delete_discount) {
            return redirect('discount');
        }
    }
}
