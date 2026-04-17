<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Handle the contact form submission.
     * Validates input, sends email to admin, and returns with status message.
     */
    public function handleContactForm(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string|max:2000',
        ]);

        try {
            // Ganti email tujuan di sini jika diperlukan
            $adminEmail = 'Khususonline78@gmail.com';

            Mail::to($adminEmail)->send(
                new ContactMessageMail(
                    $validated['name'],
                    $validated['email'],
                    $validated['message']
                )
            );

            return redirect()->back()->with('success', 'Pesan Anda berhasil dikirim! Kami akan segera menghubungi Anda.');

        } catch (\Exception $e) {
            // Log the error for debugging
            \Illuminate\Support\Facades\Log::error('Contact form email failed: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Maaf, terjadi kesalahan saat mengirim pesan. Silakan coba lagi nanti.')
                ->withInput();
        }
    }
}
