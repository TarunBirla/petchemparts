<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pdf;

class PdfController extends Controller
{
    public function index()
    {
        $pdfs = Pdf::latest()->get();
        return view('backend.pdf.index', compact('pdfs'));
    }

    public function create()
    {
        return view('backend.pdf.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'required|mimes:pdf'
        ]);

        if ($request->hasFile('file')) {
            $fileName = time().'.'.$request->file->extension();
            $request->file->move(public_path('uploads/pdf'), $fileName);
        }

        Pdf::create([
            'title' => $request->title,
            'file' => 'uploads/pdf/'.$fileName,
            'status' => $request->status
        ]);

        return redirect()->route('pdf.index')->with('success','PDF Added');
    }

    public function edit($id)
    {
        $pdf = Pdf::findOrFail($id);
        return view('backend.pdf.edit', compact('pdf'));
    }

    public function update(Request $request, $id)
    {
        $pdf = Pdf::findOrFail($id);

        if ($request->hasFile('file')) {
            $fileName = time().'.'.$request->file->extension();
            $request->file->move(public_path('uploads/pdf'), $fileName);
            $pdf->file = 'uploads/pdf/'.$fileName;
        }

        $pdf->update([
            'title' => $request->title,
            'status' => $request->status
        ]);

        return redirect()->route('pdf.index')->with('success','Updated');
    }

    public function destroy($id)
    {
        Pdf::findOrFail($id)->delete();
        return back()->with('success','Deleted');
    }
}