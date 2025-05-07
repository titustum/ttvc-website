<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Models\HeroSlideContent;

new
#[Layout('layouts.admin-portal')]
#[Title('Add Hero Slide')]
class extends Component
{
    use WithFileUploads;

    public $image;
    public $title = '';
    public $subtitle = '';
    public $slogan = '';
    public $button_text = 'Join Us Now';
    public $button_link = '#';

    public function save()
    {
        $this->validate([
            'image' => 'required|image|max:2048', // 2MB max
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'slogan' => 'nullable|string|max:255',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
        ]);

        $imagePath = $this->image->store('hero_slides', 'public');

        $slide = new HeroSlideContent();
        $slide->image = $imagePath;
        $slide->title = $this->title;
        $slide->subtitle = $this->subtitle;
        $slide->slogan = $this->slogan;
        $slide->button_text = $this->button_text;
        $slide->button_link = $this->button_link;
        $slide->save();

        $this->reset();
        session()->flash('message', 'Hero slide added successfully.');
    }
}

?>


<div class="p-3">
    <main class="container px-8 py-8 mx-auto my-8 bg-white rounded-md">
        <h1 class="mb-6 text-3xl font-bold text-orange-600">Add Hero Slide</h1>

        @if (session('message'))
        <div class="relative px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
            {{ session('message') }}
        </div>
        @endif

        <form wire:submit.prevent="save" class="space-y-4">
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" id="image" wire:model="image" class="block w-full mt-1">
                @error('image') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" id="title" wire:model="title"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-amber-500 focus:ring-amber-500">
                @error('title') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="subtitle" class="block text-sm font-medium text-gray-700">Subtitle</label>
                <input type="text" id="subtitle" wire:model="subtitle"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-amber-500 focus:ring-amber-500">
                @error('subtitle') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="slogan" class="block text-sm font-medium text-gray-700">Slogan (Optional)</label>
                <input type="text" id="slogan" wire:model="slogan"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-amber-500 focus:ring-amber-500">
                @error('slogan') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="button_text" class="block text-sm font-medium text-gray-700">Button Text
                    (Optional)</label>
                <input type="text" id="button_text" wire:model="button_text"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-amber-500 focus:ring-amber-500">
                @error('button_text') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="button_link" class="block text-sm font-medium text-gray-700">Button Link
                    (Optional)</label>
                <input type="text" id="button_link" wire:model="button_link"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-amber-500 focus:ring-amber-500">
                @error('button_link') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <button type="submit"
                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-orange-600 border border-transparent rounded-md shadow-sm hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                    Add Hero Slide
                </button>
            </div>
        </form>
    </main>
</div>