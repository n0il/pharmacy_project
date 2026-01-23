{{-- resources/views/pdfs/index.blade.php --}}
<form method="POST" action="{{ route('pdfs.store') }}" enctype="multipart/form-data">
    @csrf
    <input type="file" name="document" accept=".pdf" class="border p-2">
    <button class="bg-blue-500 text-white px-4 py-2 rounded">Upload Prescription</button>
</form>

<div class="grid grid-cols-1 gap-4 mt-6">
    @foreach ($pdfs as $pdf)
        <div class="flex items-center justify-between p-4 bg-gray-50 rounded shadow">
            <div>
                <span class="text-red-500 font-bold">PDF:</span>
                <span class="ml-2">{{ $pdf->title ?? $pdf->original_name }}</span>
            </div>
            <div class="flex gap-2">
                {{-- Link to open PDF in new tab --}}
                <a href="{{ asset('storage/' . $pdf->path) }}" target="_blank">View PDF</a>
                
                {{-- Delete form --}}
                <form method="POST" action="{{ route('pdfs.destroy', $pdf) }}">
                    @csrf @method('DELETE')
                    <button class="text-red-600">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
</div>