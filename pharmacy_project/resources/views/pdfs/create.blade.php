<x-app-layout>
    <div class="max-w-2xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">📄 Add New Prescription</h2>

        <form action="{{ route('prescriptions.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Patient Name</label>
                <input type="text" name="patient_name" 
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500" 
                       placeholder="Enter patient's full name" required>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Upload PDF Prescription</label>
                <input type="file" name="prescription_file" accept=".pdf" 
                       class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            </div>

            <div class="flex items-center justify-end gap-4">
                <a href="{{ route('prescriptions.index') }}" class="text-gray-600 hover:text-gray-900">Cancel</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition">
                    Save Prescription
                </button>
            </div>
        </form>
    </div>
</x-app-layout>