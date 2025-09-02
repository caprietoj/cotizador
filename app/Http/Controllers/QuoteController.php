<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

class QuoteController extends Controller
{
    public function index()
    {
        return view('quote.form');
    }

    public function calculatePrice(Request $request)
    {
        $data = $request->all();
        $price = Quote::calculatePrice($data);
        
        return response()->json([
            'price' => number_format($price, 0, ',', '.'),
            'raw_price' => $price
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'website_type' => 'required|in:landing,corporate,ecommerce,blog,portfolio,custom',
            'pages' => 'required|integer|min:1|max:100',
            'has_domain' => 'boolean',
            'needs_cms' => 'boolean',
            'needs_hosting' => 'boolean',
            'seo_level' => 'required|in:none,basic,advanced',
            'social_integration' => 'boolean',
            'google_analytics' => 'boolean',
            'backup_system' => 'boolean',
            'ssl_certificate' => 'boolean',
            'maintenance' => 'boolean',
            'multilanguage' => 'boolean',
            'additional_notes' => 'nullable|string|max:1000'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $request->all();
        $data['total_price'] = Quote::calculatePrice($data);

        // Crear la cotización
        $quote = Quote::create($data);

        // Generar PDF
        $pdf = Pdf::loadView('quote.pdf', compact('quote'));
        
        // Enviar correo al cliente
        Mail::send('quote.email', compact('quote'), function ($message) use ($quote, $pdf) {
            $message->to($quote->email, $quote->name)
                    ->cc('admin@caprietoj.com')
                    ->subject('Cotización para desarrollo de sitio web')
                    ->attachData($pdf->output(), 'cotizacion-' . $quote->id . '.pdf');
        });

        return response()->json([
            'success' => true,
            'message' => 'Cotización enviada exitosamente a su correo electrónico.',
            'quote_id' => $quote->id
        ]);
    }

    public function downloadPdf($id)
    {
        $quote = Quote::findOrFail($id);
        $pdf = Pdf::loadView('quote.pdf', compact('quote'));
        
        return $pdf->download('cotizacion-' . $quote->id . '.pdf');
    }
}
