<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UpToDateTrack;

class UpToDateTrackController extends Controller
{
    public function index($id)
    {
        // Get the date from the database
        $date = UpToDateTrack::where('id', $id)->get();
        return response()->json($date);
    }
}
