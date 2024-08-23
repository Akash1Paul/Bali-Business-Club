<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Kreait\Firebase\Auth as FirebaseAuth;
use Kreait\Firebase\Auth\SignInResult\SignInResult;
use Kreait\Firebase\Exception\FirebaseException;
use Google\Cloud\Firestore\FirestoreClient;

class ServicesController extends Controller
{

    // api functions start
    public function services()
    {
        $services = Services::all()->toArray();
        return response()->json($services);
    }
    // api functions end
    public function index()
    {
        $services = Services::orderBy('id','desc')->get()->toArray();

        return view('services.services')->with(compact('services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'duration' => 'required|numeric',
            'promo_code' => 'required',
            'about' => 'required',
            'discount' => 'required|numeric',
        ]);
        $Services = new Services();
        
     
            $Services->name = $request->name;
            $Services->duration = $request->duration;
            $Services->promo_code = $request->promo_code;
            $Services->about = $request->about;
            $Services->discount = $request->discount;
            $Services->image = $request->imagepath;
            
            // if ($request->hasFile('photo')) {
            //     $file = $request->file('photo');
            //     $extension = $file->getClientOriginalExtension();
            //     $filename = time() . '.' . $extension;
            //     $directory = 'image'; // Specify the directory path where you want to store the image
            //     // Move the uploaded file to the specified directory
            //     $file->move(public_path($directory), $filename);
            //     // Set the image path in the database
            //     $Services->image = url($directory . '/' . $filename); // Generate the full URL of the image
            // }
            $Services->save();
        if ($Services) {
            return redirect('services');
        } else {
            return redirect()->back()->withErrors($validated);
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'duration' => 'required|numeric',
            'promo_code' => 'required',
            'about' => 'required',
            'discount' => 'required|numeric',
        ]);
        $Services =  Services::find($id);
        $Services->name = $request->name;
        $Services->duration = $request->duration;
        $Services->promo_code = $request->promo_code;
        $Services->about = $request->about;
        $Services->discount = $request->discount;
        $Services->popularity = $request->popularity;
        $Services->image = $request->imagepath;
        

        // if ($request->hasFile('photo')) {
        //     $file = $request->file('photo');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $extension;
        //     $directory = 'image'; // Specify the directory path where you want to store the image
        //     // Move the uploaded file to the specified directory
        //     $file->move(public_path($directory), $filename);
        //     // Set the image path in the database
        //     $Services->image = url($directory . '/' . $filename); // Generate the full URL of the image
        // }
        $Services->update();
       
        if ($Services) {
            return redirect('services');
        } else {
            return redirect()->back()->withErrors($validated);
        }
    }

    public function destroy($id)
    {
        $delete_service = Services::where('id', $id)->delete();

        if ($delete_service) {
            return redirect('services');
        }
        else{
            return back()->with('error', 'Some error occured in deleting service.');
        }
    }

    public function add_service()
    {

        // $categories = Category::all()->toArray();

        // return view('product.addd_Service')->with(compact('categories'));
        return view('services.add_service');
    }

    public function edit_service($id)
    {
        $service = Services::where('id', $id)->get()->toArray();

        return view('services.edit_service')->with(compact('service'));
    }
    public function getservicesbyid($id)
    {
        $Services =  Services::where('id', $id)->get()->toArray();

        if (count($Services) > 0) {

            array_walk_recursive($Services, function (&$item) {
                $item = null === $item ? '' : $item;
            });

            return response()->json(['data' => $Services], 200);
        } else {
            return response()->json(['message' => 'No Services found'], 200);
        }
    }
}
