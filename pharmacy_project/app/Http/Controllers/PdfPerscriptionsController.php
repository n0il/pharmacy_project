<?php

namespace App\Http\Controllers;

use App\Models\PdfPerscriptions;
use Illuminate\Http\Request;

class PdfPerscriptionsController extends Controller
{
    
    public function index()
    {
        $perscriptions = PdfPerscriptions::latest()->get();
        return view('pdfs.index', compact('perscriptions'));
    }

    
    public function create()
    {
        return view('pdfs.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'perscription' => 'required|mimes:pdf|max:10240', 
            'title' => 'nullable|string|max:255',
        ]);

        $path = $request->file('perscription')->store('pdfs', 'public');
        PdfPerscriptions::create([
            'path' => $path,
            'title' => $request->title
        ]);
    }
    

    public function edit(PdfPerscriptions $pdfPerscriptions)
    {
        return view('pdfs.edit', compact('pdfPerscriptions'));
    }
    public function update(Request $request, PdfPerscriptions $pdfPerscriptions)
    {
        $request->validate([
        'patient_name' => 'required|string|max:255',
        'prescription_file' => 'nullable|mimes:pdf|max:10240', 
        ]);

        
        $prescription->patient_name = $request->patient_name;

        
        if ($request->hasFile('prescription_file')) {
            
            Storage::disk('public')->delete($prescription->path);

            
            $path = $request->file('prescription_file')->store('prescriptions', 'public');
            $prescription->path = $path;
        }

        $prescription->save();

        return redirect()->route('prescriptions.index')
                        ->with('success', 'Prescription updated successfully!');
    }

    public function destroy(PdfPerscriptions $pdfPerscriptions)
    {
        Storage::disk('public')->delete($pdfPerscriptions->path);
        $pdfPerscriptions->delete();

        return back();
    }
}
