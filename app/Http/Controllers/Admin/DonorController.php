<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;

class DonorController extends Controller
{
    public function index()
    {
        $donors = Donation::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.recent-donors.index', compact('donors'));
    }



public function destroy(Donation $recent_donor)
{
    $recent_donor->delete();
    return redirect()->route('admin.recent-donors.index')
                     ->with('success', 'Donor deleted successfully.');
}


}
