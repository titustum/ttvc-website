<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Models\Department;

new
#[Layout('layouts.admin-portal')]
#[Title('Add Department')]
class extends Component
{
    use WithFileUploads;

    public $name = '';
    public $photo;
    public $short_desc = '';
    public $full_desc = '';
    public $banner_pic;
    public $facility_pic;
    public $facility_pic2;

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'photo' => 'required|image|max:1024',
            'short_desc' => 'required|string|max:255',
            'full_desc' => 'required|string',
            'banner_pic' => 'nullable|image|max:1024',
            'facility_pic' => 'nullable|image|max:1024',
            'facility_pic2' => 'nullable|image|max:1024',
        ]);

        $department = new Department();
        $department->name = $this->name; 
        $department->short_desc = $this->short_desc;
        $department->full_desc = $this->full_desc;

        if ($this->photo) {
            $department->photo = $this->photo->store('departments/photos', 'public');
        }
        if ($this->banner_pic) {
            $department->banner_pic = $this->banner_pic->store('departments/banners', 'public');
        }
        if ($this->facility_pic) {
            $department->facility_pic = $this->facility_pic->store('departments/facilities', 'public');
        }
        if ($this->facility_pic2) {
            $department->facility_pic2 = $this->facility_pic2->store('departments/facilities', 'public');
        }

        $department->save();

        $this->reset();
        session()->flash('message', 'Department created successfully.');
    }
};

?>


<div>

    <main class="px-8 py-8 mx-auto bg-white rounded-md">
        <h1 class="mb-6 text-3xl font-bold text-orange-600">Create New Department</h1>

        @if (session('message'))
        <div class="relative px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
            {{ session('message') }}
        </div>
        @endif

        <form wire:submit.prevent="save" class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Department Name</label>
                <input type="text" id="name" wire:model="name"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('name') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
                <input type="file" id="photo" wire:model="photo" class="block w-full mt-1">
                @error('photo') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="short_desc" class="block text-sm font-medium text-gray-700">Short Description</label>
                <input type="text" id="short_desc" wire:model="short_desc"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('short_desc') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="full_desc" class="block text-sm font-medium text-gray-700">Full Description</label>
                <textarea id="full_desc" wire:model="full_desc" rows="4"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500"></textarea>
                @error('full_desc') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="banner_pic" class="block text-sm font-medium text-gray-700">Banner Picture
                    (Optional)</label>
                <input type="file" id="banner_pic" wire:model="banner_pic" class="block w-full mt-1">
                @error('banner_pic') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="facility_pic" class="block text-sm font-medium text-gray-700">Facility Picture 1
                    (Optional)</label>
                <input type="file" id="facility_pic" wire:model="facility_pic" class="block w-full mt-1">
                @error('facility_pic') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="facility_pic2" class="block text-sm font-medium text-gray-700">Facility Picture 2
                    (Optional)</label>
                <input type="file" id="facility_pic2" wire:model="facility_pic2" class="block w-full mt-1">
                @error('facility_pic2') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <button type="submit"
                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-orange-600 border border-transparent rounded-md shadow-sm hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                    Create Department
                </button>
            </div>
        </form>
    </main>

</div>