<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Models\Department;

new
#[Layout('layouts.admin-portal')]
class extends Component
{
    use WithFileUploads;

    public $name = '';
    public $photo;
    public $short_desc = '';
    public $full_desc = '';
    public $banner_pic;

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'photo' => 'required|image|max:1024',
            'short_desc' => 'required|string|max:255',
            'full_desc' => 'required|string',
            'banner_pic' => 'nullable|image|max:1024',
        ]);

        $department = new Department();
        $department->name = $this->name;
        $department->photo = $this->photo->store('departments', 'public');
        $department->short_desc = $this->short_desc;
        $department->full_desc = $this->full_desc;

        if ($this->banner_pic) {
            $department->banner_pic = $this->banner_pic->store('departments', 'public');
        }

        $department->save();

        $this->reset();
        session()->flash('message', 'Department created successfully.');
    }
};

?>


<div class="p-3">

<main class="container px-8 py-8 mx-auto my-8 bg-white rounded-md">
    <h1 class="mb-6 text-3xl font-bold text-orange-600">Create New Department</h1>

    @if (session('message'))
        <div class="relative px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="space-y-4">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Department Name</label>
            <input type="text" id="name" wire:model="name" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
            @error('name') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
            <input type="file" id="photo" wire:model="photo" class="block w-full mt-1">
            @error('photo') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="short_desc" class="block text-sm font-medium text-gray-700">Short Description</label>
            <input type="text" id="short_desc" wire:model="short_desc" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
            @error('short_desc') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="full_desc" class="block text-sm font-medium text-gray-700">Full Description</label>
            <textarea id="full_desc" wire:model="full_desc" rows="4" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500"></textarea>
            @error('full_desc') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="banner_pic" class="block text-sm font-medium text-gray-700">Banner Picture (Optional)</label>
            <input type="file" id="banner_pic" wire:model="banner_pic" class="block w-full mt-1">
            @error('banner_pic') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-orange-600 border border-transparent rounded-md shadow-sm hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                Create Department
            </button>
        </div>
    </form>
</main>

</div>
