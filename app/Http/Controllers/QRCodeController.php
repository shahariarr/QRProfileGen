<?php

namespace App\Http\Controllers;
use App\Models\QRCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QRCodeController extends Controller
{
    public function index()
    {
        return view('qr-code');
    }

    public function generate(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/images');
            $data['image'] = basename($path); // Store only the filename
        }

        // Store data in the database
        $qrCode = QRCode::create($data);

        // Redirect to the result page with the data
        return redirect()->route('qr-code-result', ['id' => $qrCode->id]);
    }

    public function qrCodeResult($id)
    {
        // Retrieve the QR code data from the database
        $qrCode = QRCode::findOrFail($id);
        $data = $qrCode->toArray();

        return view('qr-code-result', compact('data'));
    }
}
