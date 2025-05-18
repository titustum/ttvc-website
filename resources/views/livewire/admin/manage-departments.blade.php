<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Models\Department;
use Illuminate\Support\Facades\Storage;

new
#[Layout('layouts.admin-portal')]
#[Title('Manage Departments')]
class extends Component
{
    use WithFileUploads;

    public $departments;
    public $name = '';
    public $photo;
    public $short_desc = '';
    public $full_desc = '';
    public $banner_pic;
    public $facility_pic;
    public $facility_pic2;
    public $editingId = null;

    public function mount()
    {
        $this->departments = Department::all();
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'photo' => $this->editingId ? 'nullable|image|max:2048' : 'required|image|max:2048', // 2MB max
            'short_desc' => 'required|string|max:255',
            'full_desc' => 'required|string',
            'banner_pic' => $this->editingId ? 'nullable|image|max:2048' : 'required|image|max:2048', // 2MB max
            'facility_pic' => 'nullable|image|max:2048', // 2MB max
            'facility_pic2' => 'nullable|image|max:2048', // 2MB max
        ]);

        if ($this->editingId) {
            $department = Department::find($this->editingId);

            if ($this->photo) {
                Storage::disk('public')->delete($department->photo);
                $photoPath = $this->photo->store('departments', 'public');
                $department->photo = $photoPath;
            }
            if ($this->banner_pic) {
                Storage::disk('public')->delete($department->banner_pic);
                $bannerPath = $this->banner_pic->store('departments', 'public');
                $department->banner_pic = $bannerPath;
            }
             if ($this->facility_pic) {
                Storage::disk('public')->delete($department->facility_pic);
                $facilityPicPath = $this->facility_pic->store('departments', 'public');
                $department->facility_pic = $facilityPicPath;
            }
            if ($this->facility_pic2) {
                Storage::disk('public')->delete($department->facility_pic2);
                $facilityPic2Path = $this->facility_pic2->store('departments', 'public');
                $department->facility_pic2 = $facilityPic2Path;
            }
        } else {
            $photoPath = $this->photo->store('departments', 'public');
            $bannerPath = $this->banner_pic->store('departments', 'public');
            $department = new Department();
            $department->photo = $photoPath;
            $department->banner_pic = $bannerPath;

            if($this->facility_pic){
                $facilityPicPath = $this->facility_pic->store('departments', 'public');
                $department->facility_pic = $facilityPicPath;
            }
            if($this->facility_pic2){
                $facilityPic2Path = $this->facility_pic2->store('departments', 'public');
                $department->facility_pic2 = $facilityPic2Path;
            }
        }

        $department->name = $this->name;
        $department->short_desc = $this->short_desc;
        $department->full_desc = $this->full_desc;
       
        $department->save();

        $this->resetInputFields();
        $this->mount();
        session()->flash('message', 'Department saved successfully.');
    }

    public function edit($id)
    {
        $department = Department::find($id);
        $this->editingId = $id;
        $this->name = $department->name;
        $this->photo = $department->photo;
        $this->short_desc = $department->short_desc;
        $this->full_desc = $department->full_desc;
        $this->banner_pic = $department->banner_pic;
        $this->facility_pic  =  $department->facility_pic;
        $this->facility_pic2 = $department->facility_pic2;
    }

    public function delete($id)
    {
        $department = Department::find($id);
        Storage::disk('public')->delete($department->photo);
        Storage::disk('public')->delete($department->banner_pic);
        Storage::disk('public')->delete($department->facility_pic);
        Storage::disk('public')->delete($department->facility_pic2);
        $department->delete();
        $this->mount();
        session()->flash('message', 'Department deleted successfully.');
    }

    public function resetInputFields()
    {
        $this->editingId = null;
        $this->name = '';
        $this->photo = null;
        $this->short_desc = '';
        $this->full_desc = '';
        $this->banner_pic = null;
        $this->facility_pic = null;
        $this->facility_pic2 = null;
    }


}

?>

<div>
    <main class="px-8 py-8 mx-auto bg-white rounded-md">
        <h1 class="mb-6 text-3xl font-bold text-orange-600">Manage Departments</h1>

        @if (session('message'))
        <div class="relative px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
            {{ session('message') }}
        </div>
        @endif

        <form wire:submit.prevent="save" class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
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
                <textarea id="short_desc" wire:model="short_desc" rows="2"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500"></textarea>
                @error('short_desc') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="full_desc" class="block text-sm font-medium text-gray-700">Full Description</label>
                <textarea id="full_desc" wire:model="full_desc" rows="4"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500"></textarea>
                @error('full_desc') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="banner_pic" class="block text-sm font-medium text-gray-700">Banner Photo</label>
                <input type="file" id="banner_pic" wire:model="banner_pic" class="block w-full mt-1">
                @error('banner_pic') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <button type="submit"
                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-orange-600 border border-transparent rounded-md shadow-sm hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                Save Department
            </button>
            @if ($editingId)
            <button type="button" wire:click="resetInputFields"
                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 border border-transparent rounded-md shadow-sm hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                Cancel
            </button>
            @endif
        </form>

        <h2 class="mt-8 text-2xl font-semibold text-gray-800">Existing Departments</h2>
        <div class="w-full overflow-x-auto">
            <table class="min-w-full mt-4 overflow-hidden leading-normal rounded-lg shadow-md ">
                <thead class="text-gray-700 bg-gray-200">
                    <tr>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Name
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Photo
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Short Description
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Full Description
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Banner Photo
                        </th>

                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($departments as $department)
                    <tr>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $department->name }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            @if($department->photo)
                            <img src="{{ Storage::url($department->photo) }}" alt="{{ $department->name }}"
                                class="object-cover w-20 h-12 rounded-full">
                            @else
                            <span class="text-gray-500">No Photo</span>
                            @endif
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $department->short_desc }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $department->full_desc }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            @if($department->banner_pic)
                            <img src="{{ Storage::url($department->banner_pic) }}" alt="{{ $department->name }}"
                                class="object-cover w-12 h-12 rounded-full">
                            @else
                            <span class="text-gray-500">No Banner Photo</span>
                            @endif
                        </td>

                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <div class="flex space-x-2">
                                <button wire:click="edit({{ $department->id }})"
                                    class="px-3 py-1 text-xs font-medium text-white bg-yellow-500 rounded-md hover:bg-yellow-600">
                                    Edit
                                </button>
                                <button wire:click="delete({{ $department->id }})"
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