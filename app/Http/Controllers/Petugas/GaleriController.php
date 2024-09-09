<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest()->paginate(10);
        return view('petugas.galeri.index', compact('galeris'));
    }

    public function create()
    {
        return view('petugas.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_media' => 'required|string|max:255',
            'jenis_media' => 'required|in:foto,video',
            'file.*' => 'required|file|mimes:jpeg,png,jpg,mp4,mkv|max:20480',
            'publish' => 'nullable|boolean',
        ]);

        $files = [];
        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/galeri'), $filename);
                $files[] = $filename;
            }
        }

        Galeri::create([
            'nama_media' => $request->nama_media,
            'slug' => Str::slug($request->nama_media),
            'jenis_media' => $request->jenis_media,
            'file' => $files,
            'publish' => $request->has('publish') ? 1 : 0,
        ]);

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function show($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('petugas.galeri.show', compact('galeri'));
    }

    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('petugas.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        // Validasi input
        $request->validate([
            'nama_media' => 'required|string|max:255',
            'jenis_media' => 'required|in:foto,video',
            'file.*' => 'nullable|mimes:jpeg,jpg,png,mp4|max:20480',
            'replace_file.*' => 'nullable|mimes:jpeg,jpg,png,mp4|max:20480',
        ]);

        // Update data galeri
        $galeri->nama_media = $request->nama_media;
        $galeri->jenis_media = $request->jenis_media;
        $galeri->publish = $request->has('publish') ? 1 : 0;

        // Proses file baru (jika ada)
        if ($request->hasFile('file')) {
            $newFiles = [];
            foreach ($request->file('file') as $uploadedFile) {
                $fileName = time() . '_' . $uploadedFile->getClientOriginalName();
                $uploadedFile->move(public_path('uploads/galeri'), $fileName);
                $newFiles[] = $fileName;
            }
            $galeri->file = array_merge($galeri->file ?? [], $newFiles);
        }

        // Ganti file yang sudah ada
        if ($request->has('replace_file')) {
            foreach ($request->replace_file as $oldFile => $newFile) {
                if ($newFile) {
                    // Hapus file lama
                    $filePath = public_path('uploads/galeri/' . $oldFile);
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }

                    // Simpan file baru
                    $fileName = time() . '_' . $newFile->getClientOriginalName();
                    $newFile->move(public_path('uploads/galeri'), $fileName);

                    // Ganti di database
                    $files = $galeri->file;
                    $key = array_search($oldFile, $files);
                    if ($key !== false) {
                        $files[$key] = $fileName;
                    }
                    $galeri->file = $files;
                }
            }
        }

        $galeri->save();

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);
        $galeri->delete();

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil dihapus.');
    }

    public function deleteFile($galeriId, $fileName)
    {
        $galeri = Galeri::findOrFail($galeriId);

        // Hapus file dari folder
        $filePath = public_path('uploads/galeri/' . $fileName);
        if (file_exists($filePath)) {
            unlink($filePath); // Hapus file
        }

        // Hapus file dari array `file` di database
        $files = $galeri->file;
        $newFiles = array_filter($files, function ($file) use ($fileName) {
            return $file != $fileName;
        });

        $galeri->file = array_values($newFiles); // Reset array
        $galeri->save();

        return redirect()->back()->with('success', 'File berhasil dihapus.');
    }
}