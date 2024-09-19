<?php

namespace App\Http\Controllers;

use App\Models\DonatedItem;
use App\Models\Donation;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\DonationApproved;

class DashboardController extends Controller
{
    public function index(){
        $donations = Donation::all();

        return view('admin.dashboard', compact('donations'));
    }

    public function approveDonation(Donation $donation)
    {
        

    if ($donation) {
        $donation->status = 'approved';
        $donation->approved_at = now();
        $donation->save();

        $user = User::find($donation->donor_id);

        if ($user) {
            $user->notify(new DonationApproved($donation));
        }

        return redirect()->back()->with('success', 'Donasi telah disetujui dan notifikasi telah dikirim.');
    }

    return redirect()->back()->with('error', 'Donasi tidak ditemukan.');
    }
    public function disapproveDonation(Donation $donation)
    {
        $donation->update([
            'status' => 'disapproved',
        ]);

        return redirect('/dashboard')
            ->with('warning', 'Permintaan Hibah batal disetujui');
    }

}
