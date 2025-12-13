<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class VenueController extends Controller
{
    public function index()
    {
        $venues = Venue::latest()->paginate(10);
        return view('admin.venues.index', compact('venues'));
    }

    public function create()
    {
        return view('admin.venues.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'type' => 'required',
            'price_per_hour' => 'required|numeric',
            'description' => 'nullable',
            'venue_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Default image jika upload gagal (opsional)
        $imageUrl = null;

        // Proses Upload ke Supabase
        if ($request->hasFile('venue_image')) {
            $imageUrl = $this->uploadToSupabase($request->file('venue_image'));

            if (!$imageUrl) {
                return back()->with('error', 'Gagal mengupload gambar ke server.');
            }
        }

        Venue::create([
            'name' => $request->name,
            'location' => $request->location,
            'type' => $request->type,
            'price_per_hour' => $request->price_per_hour,
            'description' => $request->description,
            'venue_image' => $imageUrl, // Simpan URL Supabase
        ]);

        return redirect()->route('admin.venues.index')->with('success', 'Venue berhasil ditambahkan');
    }

    public function edit($id)
    {
        $venue = Venue::findOrFail($id);
        return view('admin.venues.edit', compact('venue'));
    }

    public function update(Request $request, $id)
    {
        $venue = Venue::findOrFail($id);
        
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'type' => 'required',
            'price_per_hour' => 'required|numeric',
            'venue_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Nullable karena edit
        ]);

        // Ambil semua data request kecuali gambar
        $data = $request->except(['venue_image']);

        // Jika ada file gambar baru yang diupload
        if ($request->hasFile('venue_image')) {
            // 1. Upload gambar baru ke Supabase
            $newImageUrl = $this->uploadToSupabase($request->file('venue_image'));

            if ($newImageUrl) {
                $data['venue_image'] = $newImageUrl;

                // (Opsional) TODO: Hapus gambar lama di Supabase untuk menghemat storage
                // Logikanya: Ambil nama file dari URL lama -> Hit API DELETE Supabase
            } else {
                return back()->with('error', 'Gagal mengupload gambar baru.');
            }
        }

        // Update database
        $venue->update($data);

        return redirect()->back()->with('success', 'Informasi Venue berhasil diperbarui');
    }

    public function destroy($id)
    {
        Venue::destroy($id);
        return back();
    }

    private function uploadToSupabase($file)
    {
        $bucket = env('SUPABASE_BUCKET');
        $url = env('SUPABASE_URL');
        $key = env('SUPABASE_KEY');

        // Buat nama file unik & aman (hapus spasi)
        $filename = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());

        // Hit endpoint upload Supabase
        $response = Http::withHeaders([
            'apikey' => $key,
            'Authorization' => 'Bearer ' . $key,
        ])
            ->attach(
                'file', // key form-data yang diminta Supabase
                file_get_contents($file->getRealPath()), // ambil konten file
                $filename,
            )
            ->post("$url/storage/v1/object/$bucket/$filename");

        // Cek sukses atau gagal
        if ($response->successful()) {
            // Return Public URL
            return "$url/storage/v1/object/public/$bucket/$filename";
        }

        // Jika gagal, log errornya (opsional) dan return null
        Log::error('Supabase Upload Failed: ' . $response->body());
        return null;
    }
}
