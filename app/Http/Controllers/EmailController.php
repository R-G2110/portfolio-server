<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log; 
use App\Mail\ContactMail;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        // Valida i dati in ingresso
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string',
        ]);

        // Invia l'email
        try {
            Mail::to(config('mail.from.address'))->send(new ContactMail($data));
            return response()->json(['message' => 'Email sent successfully'], 200);
        } catch (\Exception $e) {
            Log::error('Errore nell\'invio dell\'email: ' . $e->getMessage());
            return response()->json([
                'message' => 'Failed to send email',
                'error'   => $e->getMessage()
            ], 500);
        }
    }
}
