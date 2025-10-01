<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guest;

class GuestController extends Controller
{
    /**
     * GET /api/guests → Ambil semua data tamu
     */
    public function index()
    {
        return response()->json(Guest::all(), 200);
    }

    /**
     * GET /api/guests/{id} → Ambil data tamu berdasarkan ID
     */
    public function show($id)
    {
        $guest = Guest::find($id);

        if (!$guest) {
            return response()->json(['message' => 'Guest not found'], 404);
        }

        return response()->json($guest, 200);
    }

    /**
     * POST /api/guests → Tambah data tamu baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'nullable|email|unique:guests,email', // opsional
        ]);

        $guest = Guest::create($validated);

        return response()->json($guest, 201);
    }

    /**
     * PUT /api/guests/{id} → Update data tamu
     */
    public function update(Request $request, $id)
    {
        $guest = Guest::find($id);

        if (!$guest) {
            return response()->json(['message' => 'Guest not found'], 404);
        }

        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'nullable|email|unique:guests,email,' . $guest->id,
        ]);

        $guest->update($validated);

        return response()->json($guest, 200);
    }

    /**
     * DELETE /api/guests/{id} → Hapus data tamu
     */
    public function destroy($id)
    {
        $guest = Guest::find($id);

        if (!$guest) {
            return response()->json(['message' => 'Guest not found'], 404);
        }

        $guest->delete();

        return response()->json(['message' => 'Guest deleted successfully'], 200);
    }
}
