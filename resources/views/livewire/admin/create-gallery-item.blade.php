<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Models\GalleryItem;
use Illuminate\Support\Str; // Import the Str class for generating slugs


new
#[Layout('layouts.admin-portal')]
#[Title('Add Gallery Item')]
class extends Component
{
    use WithFileUploads;

    public $name = '';
    public $category = '';
    public $description = '';
    public $image;


    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'image' => 'required|image|max:2048', // 2MB max for gallery images
            'description' => 'nullable|string',
        ]);

        $image = $this->image;
        $imagePath = $image->store('gallery', 'public');
        $slug = Str::slug($this->name);


        $galleryItem = new GalleryItem();
        $galleryItem->name = $this->name;
        $galleryItem->category = $this->category;
        $galleryItem->slug = $slug;
        $galleryItem->description = $this->description;
        $galleryItem->image = $imagePath;
        $galleryItem->save();

        $this->reset();
        session()->flash('message', 'Gallery item added successfully.');
    }
 
}

?>

<div class="p-3">
    <main class="container px-8 py-8 mx-auto my-8 bg-white rounded-md">
        <h1 class="mb-6 text-3xl font-bold text-orange-600">Add Gallery Item</h1>

        @if (session('message'))
        <div class="relative px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
            {{ session('message') }}
        </div>
        @endif

        <form wire:submit.prevent="save" class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" wire:model="name"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring-purple-500">
                @error('name') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <select id="category" wire:model="category"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring-purple-500">
                    <option value="">Select a category</option>
                    <option value="Sports">Sports</option>
                    <option value="Technology">Technology</option>
                    <option value="Arts">Arts</option>
                    <option value="Science">Science</option>
                    </ul>
                </select>
                @error('category') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" id="image" wire:model="image" class="block w-full mt-1">
                @error('image') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description (Optional)</label>
                <textarea id="description" wire:model="description" rows="4"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring-purple-500"></textarea>
                @error('description') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <button type="submit"
                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-orange-600 border border-transparent rounded-md shadow-sm hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                    Add Gallery Item
                </button>
            </div>
        </form>
    </main>
</div>