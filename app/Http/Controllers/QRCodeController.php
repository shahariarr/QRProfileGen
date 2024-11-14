<?php

namespace App\Http\Controllers;
use App\Models\QRCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class QRCodeController extends Controller
{


    public function dashboard()
    {
        // Retrieve the first QR code record for the authenticated user
        $data = QRCode::where('user_id', Auth::id())->first();

        // Check if a QR code record exists
        if ($data) {
            return view('qr-code-result', compact('data'));
        } else {
            return view('qr-code');
        }
    }


    public function generate(Request $request)
    {
        $data = $request->all();

        // Add authenticated user ID to data
        $data['user_id'] = Auth::id();

        // Check if an image is provided
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            
            $data['image'] = $imageName;
        }

        // Store data in the database
        $qrCode = QRCode::create($data);

        // Redirect to the result page with the data
        return redirect()->route('qr-code-result', ['id' => $qrCode->id]);
    }


    public function qrCodeResult($id)
    {
        // Retrieve the QR code data from the database
        $qrCode = QRCode::find($id);

        // Check if the QR code exists and if the authenticated user owns it
        if ($qrCode && $qrCode->user_id === Auth::id()) {
            $data = $qrCode->toArray();
            return view('qr-code-result', compact('data'));
        } else {
            // Optionally, redirect or show a 403 error if the user doesn't own the QR code
            abort(403, 'Unauthorized access');
        }
    }

    public function edit($id)
    {
        // Retrieve the QR code data from the database
        $qrCode = QRCode::find($id);

        // Check if the QR code exists and if the authenticated user owns it
        if ($qrCode && $qrCode->user_id === Auth::id()) {
            $data = $qrCode->toArray();
            return view('qr-code-edit', compact('data'));
        } else {
            return redirect()->route('dashboard');

        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        // Retrieve the QR code data from the database
        $qrCode = QRCode::find($id);

        // Check if the QR code exists and if the authenticated user owns it
        if ($qrCode && $qrCode->user_id === Auth::id()) {
            // Check if an image is provided
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('profile_images'), $imageName);
                $data['image'] = $imageName;

                // Delete the old image
                Storage::delete('profile_images/' . $qrCode->image);
            }

            // Update the data in the database
            $qrCode->update($data);

            // Redirect to the result page with the updated data
            return redirect()->route('qr-code-result', ['id' => $qrCode->id]);
        } else {
            // Optionally, redirect or show a 403 error if the user doesn't own the QR code
            abort(403, 'Unauthorized access');
        }
    }








}
