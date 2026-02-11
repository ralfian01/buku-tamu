<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GuestBook;

class GuestBookController extends Controller
{
    /**
     * Menampilkan halaman form buku tamu.
     */
    public function index()
    {
        return view('guest-book.index');
    }

    public function store(Request $request)
    {
        // 1. Validasi Input
        $validatedData = $request->validate([
            'email'           => 'required|email|max:255',
            'full_name'       => 'required|string|max:255',
            'position'        => 'required|string|max:255',
            'visit_date'      => 'required|date',
            'institution'     => 'required|string|max:255',
            'target_official' => 'required|string|max:255',
            'purpose'         => 'required|string',
            'feedback'        => 'required|string',
        ]);

        // 2. Simpan ke Database
        GuestBook::create($validatedData);

        // 3. Redirect kembali dengan pesan sukses
        return redirect()->route('guest-book.index')
            ->with('success', 'Jawaban Anda telah direkam.');
    }
}
