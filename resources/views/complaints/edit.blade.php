<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Complaint') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('dashboard.complaints.update', $complaint) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label for="unique_code" class="block text-sm font-medium text-gray-700">Tracking Code</label>
                                <input type="text" id="unique_code" value="{{ $complaint->unique_code }}" disabled class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 p-2">
                            </div>
                            <div>
                                <label for="student_name" class="block text-sm font-medium text-gray-700">Student Name</label>
                                <input type="text" id="student_name" value="{{ $complaint->student_name }}" disabled class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 p-2">
                            </div>
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200 p-2 border">
                                    <option value="pending" {{ $complaint->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="processed" {{ $complaint->status == 'processed' ? 'selected' : '' }}>Processed</option>
                                    <option value="resolved" {{ $complaint->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
                                </select>
                            </div>
                            <div>
                                <label for="admin_notes" class="block text-sm font-medium text-gray-700">Admin Notes</label>
                                <textarea name="admin_notes" id="admin_notes" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200 p-2 border">{{ $complaint->admin_notes }}</textarea>
                            </div>
                        </div>
                        <div class="mt-6 flex justify-end">
                            <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-6 rounded-lg transition duration-300">Update Complaint</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>