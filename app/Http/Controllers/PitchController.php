<?php

namespace App\Http\Controllers;

use App\Models\Pitch;
use App\Models\PitchType;
use Illuminate\Http\Request;

class PitchController extends Controller
{
    /**
     * Display a listing of the pitches.
     */
    public function index(Request $request)
    {
        // Get all pitch types for filtering
        $pitchTypes = PitchType::all();

        // Get selected pitch type code from query parameter
        $selectedType = $request->query('type');

        // Fetch pitches with their pitch type
        $query = Pitch::with('pitchType');
        if ($selectedType) {
            $query->where('pitch_type_code', $selectedType);
        }
        $pitches = $query->get();

        return view('pitches.index', compact('pitches', 'pitchTypes', 'selectedType'));
    }

    /**
     * Display the specified pitch.
     */
    public function show($code)
    {
        // Fetch pitch details with pitch type
        $pitch = Pitch::with('pitchType')->findOrFail($code);

        return view('pitches.show', compact('pitch'));
    }
}
