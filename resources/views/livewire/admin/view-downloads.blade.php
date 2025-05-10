<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Models\Download;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

new
#[Layout('layouts.admin-portal')]
#[Title('Manage Downloads')]
class extends Component
{
    use WithFileUploads;

    public $downloads;
    public $name = '';
    public $file;
    public $type = '';
    public $category = ''; // Added category
    public $size = 0;
    public $description = '';
    public $created_by;
    public $updated_by;
    public $editingId = null;

    
    public function mount()
    {
        $this->downloads = Download::all();
        $this->created_by = Auth::id();
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'file' => $this->editingId ? 'nullable|file|max:20480' : 'required|file|max:20480', // 20MB max, adjust as needed
            'type' => 'required|string|max:255',
            'category' => 'required|string|max:255', // Validate category
            'description' => 'nullable|string',
        ]);

        $file = $this->file;
        $fileSize = $file ? $file->getSize() : 0;
        $fileType = $file ? $file->getClientMimeType() : '';


        if ($this->editingId) {
            $download = Download::find($this->editingId);
            if ($this->file) {
                // Delete the old file
                Storage::disk('public')->delete($download->file);
                // Store the new file
                $filePath = $file->store('downloads', 'public');
                $download->file = $filePath;
            }
        } else {
            $filePath = $file->store('downloads', 'public');
            $download = new Download();
            $download->file = $filePath; // Store the path, not the file itself
            $download->created_by = $this->created_by;
        }

        $download->name = $this->name;
        $download->type = $fileType;
        $download->size = $fileSize;
        $download->category = $this->category; // Assign category
        $download->description = $this->description;
        $download->updated_by = Auth::id();
        $download->save();

        $this->resetInputFields();
        $this->mount(); // Refresh
        session()->flash('message', 'Download saved successfully.');
    }

    public function edit($id)
    {
        $download = Download::find($id);
        $this->editingId = $download->id;
        $this->name = $download->name;
        $this->type = $download->type;
        $this->category = $download->category; // Load category
        $this->size = $download->size;
        $this->description = $download->description;
    }

    public function delete($id)
    {
        $download = Download::find($id);
        Storage::disk('public')->delete($download->file);
        $download->delete();
        $this->mount(); // Refresh
        session()->flash('message', 'Download deleted successfully.');
    }

    public function resetInputFields()
    {
        $this->editingId = null;
        $this->name = '';
        $this->file = null;
        $this->type = '';
        $this->category = ''; // Reset category
        $this->size = 0;
        $this->description = '';
    }

    public function formatBytes($bytes, $precision = 2) {
        $size = ['B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
        $factor = floor(log($bytes, 1024));
        return number_format($bytes / pow(1024, $factor), $precision) . ' ' . $size[$factor];
    }

    
}
?>


<div>
    <main class="px-8 py-8 mx-auto bg-white rounded-md">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold text-orange-600">Manage Downloads</h1>
            <a href="{{ route('admin.downloads.create') }}"
                class="px-4 py-2 text-sm font-medium text-white bg-orange-500 rounded-md hover:bg-orange-600">
                Add Download
            </a>
        </div>

        <div>
            @if (session('message'))
            <div class="relative px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded"
                role="alert">
                {{ session('message') }}
            </div>
            @endif
        </div>

        <form wire:submit.prevent="save" class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" wire:model="name"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('name') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="file" class="block text-sm font-medium text-gray-700">File</label>
                <input type="file" id="file" wire:model="file" class="block w-full mt-1">
                @error('file') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                <input type="text" id="type" wire:model="type"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('type') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <input type="text" id="category" wire:model="category"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('category') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description (Optional)</label>
                <textarea id="description" wire:model="description" rows="4"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500"></textarea>
                @error('description') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <button type="submit"
                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-orange-600 border border-transparent rounded-md shadow-sm hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                Save Download
            </button>
            @if ($editingId)
            <button type="button" wire:click="resetInputFields"
                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 border border-transparent rounded-md shadow-sm hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                Cancel
            </button>
            @endif
        </form>

        <h2 class="mt-8 text-2xl font-semibold text-gray-800">Existing Downloads</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full mt-4 overflow-hidden leading-normal rounded-lg shadow-md">
                <thead class="text-gray-700 bg-gray-200">
                    <tr>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Name
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            File
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Type
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Category
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Size
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Description
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($downloads as $download)
                    <tr>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $download->name }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <a href="{{ Storage::url($download->file) }}" target="_blank"
                                class="text-blue-600 whitespace-no-wrap hover:text-blue-800">
                                {{ basename($download->file) }}
                            </a>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $download->type }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $download->category }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $this->formatBytes($download->size) }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $download->description ?? '-' }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <div class="flex space-x-2">
                                <button wire:click="edit({{ $download->id }})"
                                    class="px-3 py-1 text-xs font-medium text-white bg-yellow-500 rounded-md hover:bg-yellow-600">
                                    Edit
                                </button>
                                <button wire:click="delete({{ $download->id }})"
                                    class="px-3 py-1 text-xs font-medium text-white bg-red-500 rounded-md hover:bg-red-600">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</div>