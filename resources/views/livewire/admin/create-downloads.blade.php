<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Models\Download;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

new
#[Layout('layouts.admin-portal')]
#[Title('Add Download')]
class extends Component
{
    use WithFileUploads;

    public $name = '';
    public $file;
    public $type = '';
    public $category = '';
    public $size = 0;
    public $description = '';
    public $created_by;
    public $updated_by;

    public function mount()
    {
        // Set the created_by field to the current user's ID, if available
        $this->created_by = Auth::id();
    }


    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'file' => 'required|file|max:20480', // 20MB max, adjust as needed
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $file = $this->file;
        $fileName = $file->getClientOriginalName();
        $fileSize = $file->getSize();
        $fileType = $file->getClientMimeType();

        // Store the file
        $filePath = $file->store('downloads', 'public'); // Store in storage/app/public/downloads

        $download = new Download();
        $download->name = $this->name;
        $download->category = $this->category;
        $download->file = $filePath; // Store the path, not the file itself
        $download->type = $fileType;
        $download->size = $fileSize;
        $download->description = $this->description;
        $download->created_by = $this->created_by;
        $download->updated_by = Auth::id(); //update

        $download->save();

        $this->reset();
        session()->flash('message', 'Download added successfully.');
    }
 
}
?>

<div class="p-3">
    <main class="container px-8 py-8 mx-auto my-8 bg-white rounded-md">
        <h1 class="mb-6 text-3xl font-bold text-orange-600">Add a Download</h1>

        @if (session('message'))
        <div class="relative px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
            {{ session('message') }}
        </div>
        @endif

        <form wire:submit.prevent="save" class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" wire:model="name"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @error('name') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="file" class="block text-sm font-medium text-gray-700">File</label>
                <input type="file" id="file" wire:model="file" class="block w-full mt-1">
                @error('file') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Category i.e. Form,
                    Bronchure</label>
                <input type="text" id="category" wire:model="category"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @error('type') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description (Optional)</label>
                <textarea id="description" wire:model="description" rows="4"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                @error('description') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <button type="submit"
                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-orange-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Add Download
                </button>
            </div>
        </form>
    </main>
</div>