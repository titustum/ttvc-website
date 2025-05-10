<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Models\HeroSlideContent;

new
#[Layout('layouts.admin-portal')]
#[Title('Manage Hero Slides')]
class extends Component
{
    use WithFileUploads;

    public $slides;
    public $image;
    public $title = '';
    public $subtitle = '';
    public $slogan = '';
    public $button_text = 'Join Us Now';
    public $button_link = '#';
    public $editingId = null;

    public function mount()
    {
        $this->slides = HeroSlideContent::all();
    }

    public function save()
    {
        $this->validate([
            'image' => $this->editingId ? 'nullable|image|max:2048' : 'required|image|max:2048', // 2MB max
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'slogan' => 'nullable|string|max:255',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
        ]);

        if ($this->editingId) {
            $slide = HeroSlideContent::find($this->editingId);
            if ($this->image) {
                $imagePath = $this->image->store('hero_slides', 'public');
                $slide->image = $imagePath;
            }
        } else {
            $imagePath = $this->image->store('hero_slides', 'public');
            $slide = new HeroSlideContent();
            $slide->image = $imagePath;
        }

        $slide->title = $this->title;
        $slide->subtitle = $this->subtitle;
        $slide->slogan = $this->slogan;
        $slide->button_text = $this->button_text;
        $slide->button_link = $this->button_link;
        $slide->save();

        $this->resetInputFields();
        $this->mount();  //refresh
        session()->flash('message', 'Hero slide saved successfully.');
    }

    public function edit($id)
    {
        $slide = HeroSlideContent::find($id);
        $this->editingId = $slide->id;
        $this->title = $slide->title;
        $this->subtitle = $slide->subtitle;
        $this->slogan = $slide->slogan;
        $this->button_text = $slide->button_text;
        $this->button_link = $slide->button_link;
    }

    public function delete($id)
    {
        HeroSlideContent::destroy($id);
        $this->mount(); //refresh
        session()->flash('message', 'Hero slide deleted successfully.');
    }

    public function resetInputFields()
    {
        $this->editingId = null;
        $this->image = null;
        $this->title = '';
        $this->subtitle = '';
        $this->slogan = '';
        $this->button_text = 'Join Us Now';
        $this->button_link = '#';
    }
}
?>


<div>
    <main class="px-8 py-8 mx-auto bg-white rounded-md">
        <h1 class="mb-6 text-3xl font-bold text-orange-600">Manage Hero Slides</h1>

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
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('title') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="subtitle" class="block text-sm font-medium text-gray-700">Subtitle</label>
                <input type="text" id="subtitle" wire:model="subtitle"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('subtitle') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="slogan" class="block text-sm font-medium text-gray-700">Slogan (Optional)</label>
                <input type="text" id="slogan" wire:model="slogan"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('slogan') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="button_text" class="block text-sm font-medium text-gray-700">Button Text
                    (Optional)</label>
                <input type="text" id="button_text" wire:model="button_text"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('button_text') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="button_link" class="block text-sm font-medium text-gray-700">Button Link
                    (Optional)</label>
                <input type="text" id="button_link" wire:model="button_link"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('button_link') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <button type="submit"
                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-orange-600 border border-transparent rounded-md shadow-sm hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                Save Slide
            </button>
            @if ($editingId)
            <button type="button" wire:click="resetInputFields"
                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 border border-transparent rounded-md shadow-sm hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                Cancel
            </button>
            @endif
        </form>

        <h2 class="mt-8 text-2xl font-semibold text-gray-800">Existing Slides</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full mt-4 overflow-hidden leading-normal rounded-lg shadow-md">
                <thead class="text-gray-700 bg-gray-200">
                    <tr>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Image
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Title
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Subtitle
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Slogan
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Button Text
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Button Link
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($slides as $slide)
                    <tr>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <img src="{{ Storage::url($slide->image) }}" alt="{{ $slide->title }}"
                                class="object-cover w-20 h-12 ">
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $slide->title }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $slide->subtitle }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $slide->slogan ?? '-' }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $slide->button_text }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $slide->button_link }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <div class="flex space-x-2">
                                <button wire:click="edit({{ $slide->id }})"
                                    class="px-3 py-1 text-xs font-medium text-white bg-yellow-500 rounded-md hover:bg-yellow-600">
                                    Edit
                                </button>
                                <button wire:click="delete({{ $slide->id }})"
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