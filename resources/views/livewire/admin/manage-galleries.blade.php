<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

new
#[Layout('layouts.admin-portal')]
#[Title('Manage Galleries')]
class extends Component
{
    use WithFileUploads;

    public $galleries;
    public $name = '';
    public $slug = '';
    public $category = '';
    public $description = '';
    public $image;
    public $editingId = null;

    public $isEditing = false;

    public function mount()
    {
        $this->galleries = Gallery::all();
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:galleries,slug,' . ($this->editingId ?? 'NULL'),
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => $this->editingId ? 'nullable|image|max:2048' : 'required|image|max:2048', // 2MB max
        ]);

        if ($this->editingId) {
            $gallery = Gallery::find($this->editingId);
            if ($this->image) {
                // Delete the old image
                Storage::disk('public')->delete($gallery->image);
                // Store the new image
                $imagePath = $this->image->store('galleries', 'public');
                $gallery->image = $imagePath;
            }
        } else {
            $imagePath = $this->image->store('galleries', 'public');
            $gallery = new Gallery();
            $gallery->image = $imagePath;
        }

        $gallery->name = $this->name;
        $gallery->slug = $this->slug;
        $gallery->category = $this->category;
        $gallery->description = $this->description;
        $gallery->save();

        $this->resetInputFields();
        $this->mount(); // Refresh
        session()->flash('message', 'Gallery saved successfully.');
    }

    public function edit($id)
    { 
        $gallery = Gallery::find($id);
        $this->editingId = $gallery->id;
        $this->name = $gallery->name;
        $this->slug = $gallery->slug;
        $this->category = $gallery->category;
        $this->description = $gallery->description;
        
        $this->isEditing = true; // force update
    }

    public function delete($id)
    {
        $gallery = Gallery::find($id);
        Storage::disk('public')->delete($gallery->image);
        $gallery->delete();
        $this->mount(); // Refresh
        session()->flash('message', 'Gallery deleted successfully.');
    }

    public function resetInputFields()
    {
        $this->editingId = null;
        $this->name = '';
        $this->slug = '';
        $this->category = '';
        $this->description = '';
        $this->image = null;
    }

     
}


?>


<div>
    <main class="px-8 py-8 mx-auto bg-white rounded-md">

        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold text-orange-600">Manage Galleries</h1>
            <a href="{{ route('admin.gallery.items.manage') }}"
                class="px-4 py-2 text-sm font-medium text-white bg-orange-500 rounded-md hover:bg-orange-600">
                Manage Gallery Items
            </a>
        </div>

        @if (session('message'))
        <div class="relative px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
            {{ session('message') }}
        </div>
        @endif

        <form wire:submit.prevent="save" class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" wire:model="name" key="{{ $isEditing ? 'editing' : 'creating' }}"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('name') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                <input type="text" id="slug" wire:model="slug"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('slug') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <input type="text" id="category" wire:model="category"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('category') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" wire:model="description" rows="4"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500"></textarea>
                @error('description') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" id="image" wire:model="image" class="block w-full mt-1">
                @error('image') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <button type="submit"
                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-orange-600 border border-transparent rounded-md shadow-sm hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                Save Gallery
            </button>
            @if ($editingId)
            <button type="button" wire:click="resetInputFields"
                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 border border-transparent rounded-md shadow-sm hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                Cancel
            </button>
            @endif
        </form>

        <h2 class="mt-8 text-2xl font-semibold text-gray-800">Existing Galleries</h2>
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
                            Slug
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Category
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Description
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Image
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($galleries as $gallery)
                    <tr>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $gallery->name }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $gallery->slug }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $gallery->category }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $gallery->description ?? '-' }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">

                            <img src="{{ Storage::url($gallery->image) }}" alt="{{ $gallery->name }}"
                                class="object-cover w-20 h-12">
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <div class="flex space-x-2">
                                <button wire:click="edit({{ $gallery->id }})"
                                    class="px-3 py-1 text-xs font-medium text-white bg-yellow-500 rounded-md hover:bg-yellow-600">
                                    Edit
                                </button>
                                <button wire:click="delete({{ $gallery->id }})"
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