<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GuestBook;
use Illuminate\Support\Facades\File;

class GuestBookController extends Controller
{
    /**
     * Menampilkan halaman form buku tamu.
     */
    public function index()
    {
        $jsonPath = storage_path('app/json/officials.json');

        if (File::exists($jsonPath)) {
            $jsonContent = File::get($jsonPath);
            // Data sekarang berisi array grup
            $officialGroups = json_decode($jsonContent, true);
        } else {
            $officialGroups = [];
        }

        // Kita kirim variable $officialGroups ke view
        return view('guest-book.index', compact('officialGroups'));
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
