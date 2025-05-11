<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Models\Gallery;
use App\Models\GalleryItem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

new
#[Layout('layouts.admin-portal')]
#[Title('Manage Gallery Items')]
class extends Component
{
    use WithFileUploads;

    public $galleryItems;
    public $gallery_id;
    public $name = '';
    public $image;
    public $editingId = null;
    public $galleries;

    public function mount()
    {
        $this->galleries = Gallery::all();
        $this->galleryItems = GalleryItem::with('gallery')->get();
    }

    public function save()
    {
        $this->validate([
            'gallery_id' => 'required|exists:galleries,id',
            'name' => 'required|string|max:255',
            'image' => $this->editingId ? 'nullable|image|max:2048' : 'required|image|max:2048', // 2MB max
        ]);

        if ($this->editingId) {
            $galleryItem = GalleryItem::find($this->editingId);
            if ($this->image) {
                // Delete the old image
                Storage::disk('public')->delete($galleryItem->image);
                // Store the new image
                $imagePath = $this->image->store('gallery_items', 'public');
                $galleryItem->image = $imagePath;
            }
        } else {
            $imagePath = $this->image->store('gallery_items', 'public');
            $galleryItem = new GalleryItem();
            $galleryItem->image = $imagePath;
        }

        $galleryItem->gallery_id = $this->gallery_id;
        $galleryItem->name = $this->name;
        $galleryItem->save();

        $this->resetInputFields();
        $this->mount();
        session()->flash('message', 'Gallery item saved successfully.');
    }

    public function edit($id)
    {
        $galleryItem = GalleryItem::find($id);
        $this->editingId = $galleryItem->id;
        $this->gallery_id = $galleryItem->gallery_id;
        $this->name = $galleryItem->name;
    }

    public function delete($id)
    {
        $galleryItem = GalleryItem::find($id);
        Storage::disk('public')->delete($galleryItem->image);
        $galleryItem->delete();
        $this->mount();
        session()->flash('message', 'Gallery item deleted successfully.');
    }

    public function resetInputFields()
    {
        $this->editingId = null;
        $this->gallery_id = null;
        $this->name = '';
        $this->image = null;
    }

}


?>

<div>
    <main class="px-8 py-8 mx-auto bg-white rounded-md">
        <h1 class="mb-6 text-3xl font-bold text-orange-600">Manage Gallery Items</h1>

        @if (session('message'))
        <div class="relative px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
            {{ session('message') }}
        </div>
        @endif

        <form wire:submit.prevent="save" class="space-y-4">
            <div>
                <label for="gallery_id" class="block text-sm font-medium text-gray-700">Gallery</label>
                <select id="gallery_id" wire:model="gallery_id"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                    <option value="">Select Gallery</option>
                    @foreach ($galleries as $gallery)
                    <option value="{{ $gallery->id }}">{{ $gallery->name }}</option>
                    @endforeach
                </select>
                @error('gallery_id') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" wire:model="name"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('name') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" id="image" wire:model="image" class="block w-full mt-1">
                @error('image') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <button type="submit"
                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-orange-600 border border-transparent rounded-md shadow-sm hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                Save Gallery Item
            </button>
            @if ($editingId)
            <button type="button" wire:click="resetInputFields"
                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 border border-transparent rounded-md shadow-sm hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                Cancel
            </button>
            @endif
        </form>

        <h2 class="mt-8 text-2xl font-semibold text-gray-800">Existing Gallery Items</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full mt-4 overflow-hidden leading-normal rounded-lg shadow-md">
                <thead class="text-gray-700 bg-gray-200">
                    <tr>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Gallery
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Name
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
                    @foreach ($galleryItems as $item)
                    <tr>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $item->gallery->name }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $item->name }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <img src="{{ Storage::url($item->image) }}" alt="{{ $item->name }}"
                                class="object-cover w-20 h-12">
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <div class="flex space-x-2">
                                <button wire:click="edit({{ $item->id }})"
                                    class="px-3 py-1 text-xs font-medium text-white bg-yellow-500 rounded-md hover:bg-yellow-600">
                                    Edit
                                </button>
                                <button wire:click="delete({{ $item->id }})"
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