<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    /**
     * Generate a PDF for a specific holiday.
     */
    public function generate($id)
    {
        $holiday = Holiday::find($id);

        if (!$holiday) {
            return response()->json(['message' => 'Holiday not found'], 404);
        }

        $holiday->participants = is_array($holiday->participants) ? implode(', ', $holiday->participants) : $holiday->participants;

        $pdf = Pdf::loadView('pdf.holiday', compact('holiday'));
        return $pdf->download('holiday.pdf');
    }
}
