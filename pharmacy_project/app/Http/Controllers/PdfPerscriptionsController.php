<?php

namespace App\Http\Controllers;

use App\Models\PdfPerscriptions;
use Illuminate\Http\Request;

class PdfPerscriptionsController extends Controller
{
    
    public function index()
    {
        $pdfs = PdfPerscriptions::latest()->get();
        return view('pdfs.index', compact('pdfs'));
    }

    
    public function create()
    {
        return "THE CONTROLLER IS WORKING";
        // return view('pdfs.create');
    }

    
    public function store(Request $request)
    {
        
        $request->validate([
            'patient_name' => 'required|string|max:255',
            'document' => 'required|mimes:pdf|max:10000', 
        ]);
        
        
        if ($request->hasFile('document')) {
            $file = $request->file('document');
            
            
            $path = $file->store('prescriptions', 'public');
            $originalName = $file->getClientOriginalName();

            
            \App\Models\PdfPerscriptions::create([
                'title' => $request->patient_name,
                'path' => $path,
                'original_name' => $originalName,
            ]);
            return redirect()->route('pdfs.index')->with('success', 'Prescription uploaded successfully!');
        }

        return back()->withErrors(['document' => 'File not found in request.']);
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
