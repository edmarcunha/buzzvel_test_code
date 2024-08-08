<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Holiday;
use App\Http\Requests\HolidayRequest;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $holidays = Holiday::all();
        return response()->json($holidays);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HolidayRequest $request)
    {
        $holiday = Holiday::create($request->validated());
        return response()->json($holiday, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $holiday = Holiday::find($id);

        if (!$holiday) {
            return response()->json([
                'message' => 'Holiday not found'
            ], 404);
        }

        return response()->json($holiday);
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(string $id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(HolidayRequest $request, Holiday $holiday)
    {
        $holiday->update($request->validated());
        return response()->json($holiday);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Holiday $holiday)
    {
        $holiday->delete();
        return response()->json(['message' => 'Holiday deleted successfully.']);
    }
}
