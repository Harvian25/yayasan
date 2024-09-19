<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreDonationRequest;
use App\Http\Requests\UpdateDonationRequest;
use App\Notifications\DonationApproved;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($item_id)
    {
        $item = Item::find($item_id);
        return view('donations.create', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDonationRequest $request)
    {

        $validatedData = $request->validate([
            'donor_id' => 'required|exists:users,id',
            'item_id' => 'required|exists:items,id',
            'location' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
            'amount' => 'required|numeric',
            'image_selfie' => 'required|image|max:2048',
            'description' => 'nullable|string',
        ]);


        if ($request->hasFile('image')) {
            if ($request->oldImage) {
                unlink(public_path('storage/' . $request->oldImage));
            }

            $imageFile = $request->file('image');
            $ext = $imageFile->getClientOriginalExtension();
            $filename = "donatedItem-" . time() . "." . $ext;
            $imageFile->move(public_path('storage/'), $filename);
            $validatedData['image'] = $filename;
        }


        if ($request->hasFile('image_selfie')) {
            if ($request->oldImageSelfie) {
                unlink(public_path('storage/' . $request->oldImageSelfie));
            }

            $selfieImageFile = $request->file('image_selfie');
            $extSelfie = $selfieImageFile->getClientOriginalExtension();
            $selfieFilename = "selfie-" . time() . "." . $extSelfie;
            $selfieImageFile->move(public_path('storage/'), $selfieFilename);
            $validatedData['selfie_image'] = $selfieFilename;
        }


        $donation = Donation::create([
            'donor_id' => $validatedData['donor_id'],
            'item_id' => $validatedData['item_id'],
            'location' => $validatedData['location'],
            'image' => $validatedData['image'],
            'amount' => $validatedData['amount'],
            'selfie_image' => $validatedData['selfie_image'],
            'description' => $validatedData['description'] ?? null,
            'status' => 'disapproved',
        ]);

        return redirect('/donation/category')->with('success', 'Pengajuan berhasil, kami akan segera menghubungi lewat Whatsapp 😊');

    }

    public function sendAdminNotif(Donation $donation){
        $user = User::where('level', 'admin')->first();

        if ($user) {
            $user->notify(new DonationApproved($donation));
        }

        return view();
    }

    public function showDetailNotification($id)
    {
        $user = Auth::user();
        $notification = $user->notifications->where('id', $id)->first();


        if ($notification) {
            $donation = Donation::with(['item', 'donor'])->where('id', $notification->data['donation_id'])->first();


            if ($donation) {
                return view('donations.notification', compact('notification', 'donation'));
            } else {
                return redirect()->back()->with('error', 'Donasi tidak ditemukan');
            }
        } else {
            return redirect()->back()->with('error', 'Notifikasi tidak ditemukan');
        }
    }

    public function markAsReadNotification($id)
    {
        $user = Auth::user();
        $notification = $user->notifications->where('id', $id)->first();

        if ($notification && !$notification->read_at) {
            $notification->markAsRead();
        }

        return redirect('/donation/category');
    }


    /**
     * Display the specified resource.
     */
    public function show(Donation $donation)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Donation $donation)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDonationRequest $request, Donation $donation)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Donation $donation)
    {
    }
}
