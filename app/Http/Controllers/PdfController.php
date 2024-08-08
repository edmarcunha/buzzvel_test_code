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
        // Encontra o holiday com o ID fornecido
        $holiday = Holiday::find($id);

        if (!$holiday) {
            return response()->json(['message' => 'Holiday not found'], 404);
        }

        // Converte 'participants' para uma string
        $holiday->participants = is_array($holiday->participants) ? implode(', ', $holiday->participants) : $holiday->participants;

        // Carrega a view com os dados do holiday
        $pdf = Pdf::loadView('pdf.holiday', compact('holiday'));

        // Retorna o PDF como uma resposta para download
        return $pdf->download('holiday.pdf');
    }
}
