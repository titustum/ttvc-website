<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Models\Gallery;
use App\Models\GalleryItem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

// --- Manage Galleries Component ---
new
#[Layout('layouts.admin-portal')]
#[Title('Manage Galleries and Items')]
class extends Component
{
    use WithFileUploads;

    public $galleries;
    public $name = '';
    public $slug = '';
    public $category = '';
    public $description = '';
    public $image;
    public $editingGalleryId = null;

    public $galleryItems = []; // For managing items within a gallery
    public $itemName = '';
    public $itemSlug = '';
    public $itemCategory = '';
    public $itemDescription = '';
    public $itemImage;
    public $editingItemId = null;
    public $selectedGalleryId = null;

    public function mount()
    {
        $this->galleries = Gallery::all();
    }

    // --- Gallery Management ---
    public function saveGallery()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:galleries,slug,' . $this->editingGalleryId,
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => $this->editingGalleryId ? 'nullable|image|max:2048' : 'required|image|max:2048', // 2MB max
        ]);

        if ($this->editingGalleryId) {
            $gallery = Gallery::find($this->editingGalleryId);
            if ($this->image) {
                Storage::disk('public')->delete($gallery->image);
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

        $this->resetGalleryInputs();
        $this->mount(); // Refresh
        session()->flash('message', 'Gallery saved successfully.');
    }

    public function editGallery($id)
    {
        $gallery = Gallery::find($id);
        $this->editingGalleryId = $gallery->id;
        $this->name = $gallery->name;
        $this->slug = $gallery->slug;
        $this->category = $gallery->category;
        $this->description = $gallery->description;
    }

    public function deleteGallery($id)
    {
        $gallery = Gallery::find($id);
        Storage::disk('public')->delete($gallery->image);
        $gallery->delete();
        $this->mount(); // Refresh
        session()->flash('message', 'Gallery deleted successfully.');
    }

    public function resetGalleryInputs()
    {
        $this->editingGalleryId = null;
        $this->name = '';
        $this->slug = '';
        $this->category = '';
        $this->description = '';
        $this->image = null;
    }

    // --- Gallery Item Management ---
     public function loadGalleryItems($galleryId)
    {
        $this->selectedGalleryId = $galleryId;
        $this->galleryItems = GalleryItem::where('gallery_id', $galleryId)->get();
    }

    public function saveGalleryItem()
    {
        $this->validate([
            'itemName' => 'required|string|max:255',
            'itemSlug' => 'required|string|unique:gallery_items,slug,' . $this->editingItemId,
            'itemCategory' => 'required|string|max:255',
            'itemDescription' => 'nullable|string',
            'itemImage' => $this->editingItemId ? 'nullable|image|max:2048' : 'required|image|max:2048', // 2MB max
            'selectedGalleryId' => 'required|exists:galleries,id',
        ]);

        if ($this->editingItemId) {
            $item = GalleryItem::find($this->editingItemId);
             if ($this->itemImage) {
                Storage::disk('public')->delete($item->image);
                $imagePath = $this->itemImage->store('gallery_items', 'public');
                $item->image = $imagePath;
            }
        } else {
            $imagePath = $this->itemImage->store('gallery_items', 'public');
            $item = new GalleryItem();
            $item->image = $imagePath;
            $item->gallery_id = $this->selectedGalleryId;
        }

        $item->name = $this->itemName;
        $item->slug = $this->itemSlug;
        $item->category = $this->itemCategory;
        $item->description = $this->itemDescription;
        $item->save();

        $this->resetItemInputs();
        $this->loadGalleryItems($this->selectedGalleryId); // Refresh Item list
        session()->flash('message', 'Gallery item saved successfully.');
    }

    public function editGalleryItem($id)
    {
        $item = GalleryItem::find($id);
        $this->editingItemId = $item->id;
        $this->itemName = $item->name;
        $this->itemSlug = $item->slug;
        $this->itemCategory = $item->category;
        $this->itemDescription = $item->description;
        $this->selectedGalleryId = $item->gallery_id;
    }

    public function deleteGalleryItem($id)
    {
        $item = GalleryItem::find($id);
        Storage::disk('public')->delete($item->image);
        $item->delete();
        $this->loadGalleryItems($this->selectedGalleryId); // Refresh Item list
        session()->flash('message', 'Gallery item deleted successfully.');
    }

    public function resetItemInputs()
    {
        $this->editingItemId = null;
        $this->itemName = '';
        $this->itemSlug = '';
        $this->itemCategory = '';
        $this->itemDescription = '';
        $this->itemImage = null;
    }


     
}

?>


<div>
    <main class="px-8 py-8 mx-auto bg-white rounded-md">
        <h1 class="mb-6 text-3xl font-bold text-orange-600">Manage Galleries</h1>

        @if (session('message'))
        <div class="relative px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
            {{ session('message') }}
        </div>
        @endif

        {{-- --- Gallery Management Form --- --}}
        <form wire:submit.prevent="saveGallery" class="mb-8 space-y-4">
            <h2 class="text-2xl font-semibold text-gray-800">
                {{ $editingGalleryId ? 'Edit Gallery' : 'Add New Gallery' }}
            </h2>
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" wire:model="name"
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
            <div class="flex gap-2">
                <button type="submit"
                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-orange-600 border border-transparent rounded-md shadow-sm hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                    Save Gallery
                </button>
                @if ($editingGalleryId)
                <button type="button" wire:click="resetGalleryInputs"
                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 border border-transparent rounded-md shadow-sm hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    Cancel
                </button>
                @endif
            </div>
        </form>

        {{-- --- Gallery List --- --}}
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
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Items
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
                                <button wire:click="editGallery({{ $gallery->id }})"
                                    class="px-3 py-1 text-xs font-medium text-white bg-yellow-500 rounded-md hover:bg-yellow-600">
                                    Edit
                                </button>
                                <button wire:click="deleteGallery({{ $gallery->id }})"
                                    class="px-3 py-1 text-xs font-medium text-white bg-red-500 rounded-md hover:bg-red-600">
                                    Delete
                                </button>
                            </div>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <button wire:click="loadGalleryItems({{ $gallery->id }})"
                                class="px-3 py-1 text-xs font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">
                                View Items
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- --- Gallery Item Management Form --- --}}
        @if ($selectedGalleryId)
        <div class="mt-8">
            <h2 class="mb-6 text-2xl font-bold text-orange-600">Manage Gallery Items</h2>
            <form wire:submit.prevent="saveGalleryItem" class="mb-8 space-y-4">
                <h3 class="text-lg font-semibold text-gray-800">
                    {{ $editingItemId ? 'Edit Gallery Item' : 'Add New Gallery Item' }}
                </h3>
                <div>
                    <label for="itemName" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="itemName" wire:model="itemName"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                    @error('itemName') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="itemSlug" class="block text-sm font-medium text-gray-700">Slug</label>
                    <input type="text" id="itemSlug" wire:model="itemSlug"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                    @error('itemSlug') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="itemCategory" class="block text-sm font-medium text-gray-700">Category</label>
                    <input type="text" id="itemCategory" wire:model="itemCategory"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                    @error('itemCategory') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="itemDescription" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="itemDescription" wire:model="itemDescription" rows="4"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500"></textarea>
                    @error('itemDescription') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="itemImage" class="block text-sm font-medium text-gray-700">Image</label>
                    <input type="file" id="itemImage" wire:model="itemImage" class="block w-full mt-1">
                    @error('itemImage') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                </div>

                <input type="hidden" wire:model="selectedGalleryId">

                <div class="flex gap-2">
                    <button type="submit"
                        class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-orange-600 border border-transparent rounded-md shadow-sm hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                        Save Item
                    </button>
                    @if ($editingItemId)
                    <button type="button" wire:click="resetItemInputs"
                        class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 border border-transparent rounded-md shadow-sm hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        Cancel
                    </button>
                    @endif
                </div>
            </form>

            {{-- --- Gallery Item List --- --}}
            <h3 class="mt-8 text-xl font-semibold text-gray-800">Gallery Items</h3>
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
                        @foreach ($galleryItems as $item)
                        <tr>
                            <td class="px-5 py-5 text-sm border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $item->name }}</p>
                            </td>
                            <td class="px-5 py-5 text-sm border-b border-gray-200">
                                <p class="text-gray-600 whitespace-no-wrap">{{ $item->slug }}</p>
                            </td>
                            <td class="px-5 py-5 text-sm border-b border-gray-200">
                                <p class="text-gray-600 whitespace-no-wrap">{{ $item->category }}</p>
                            </td>
                            <td class="px-5 py-5 text-sm border-b border-gray-200">
                                <p class="text-gray-600 whitespace-no-wrap">{{ $item->description ?? '-' }}</p>
                            </td>
                            <td class="px-5 py-5 text-sm border-b border-gray-200">
                                <img src="{{ Storage::url($item->image) }}" alt="{{ $item->name }}"
                                    class="object-cover w-20 h-12">
                            </td>
                            <td class="px-5 py-5 text-sm border-b border-gray-200">
                                <div class="flex space-x-2">
                                    <button wire:click="editGalleryItem({{ $item->id }})"
                                        class="px-3 py-1 text-xs font-medium text-white bg-yellow-500 rounded-md hover:bg-yellow-600">
                                        Edit
                                    </button>
                                    <button wire:click="deleteGalleryItem({{ $item->id }})"
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
        </div>
        @endif
    </main>
</div>