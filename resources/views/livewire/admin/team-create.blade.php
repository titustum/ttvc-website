<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Models\TeamMember;
use App\Models\Department;
use App\Models\Role;

new
#[Layout('layouts.admin-portal')]
class extends Component
{
    use WithFileUploads;
    public $roles;
    public $departments;
    public $department_id = '';
    public $role_id = '';
    public $name = '';
    public $photo;
    public $qualification = '';
    public $experience = '4+ years experience';

    public function mount()
    {
        $this->departments = Department::all();
        $this->roles = Role::all();
    }

    public function save()
    {
        $this->validate([
            'department_id' => 'required|exists:departments,id',
            'role_id' => 'required|exists:roles,id',
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|max:1024',
            'qualification' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
        ]);

        $teamMember = new TeamMember();
        $teamMember->department_id = $this->department_id;
        $teamMember->role_id = $this->role_id;
        $teamMember->name = $this->name;
        $teamMember->qualification = $this->qualification;
        $teamMember->experience = $this->experience;

        if ($this->photo) {
            $teamMember->photo = $this->photo->store('team_members', 'public');
        }

        $teamMember->save();

        $this->reset(['department_id', 'role_id', 'name', 'photo', 'qualification', 'experience']);
        $this->experience = '4+ years experience'; // Reset to default value
        session()->flash('message', 'Team member added successfully.');
    }
};

?>



<div class="p-3">

    <main class="container px-4 py-8 mx-auto my-8 bg-white rounded-md">
        <h1 class="mb-6 text-3xl font-bold text-orange-600">Add New Team Member</h1>

        @if (session('message'))
        <div class="relative px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
            {{ session('message') }}
        </div>
        @endif

        <form wire:submit.prevent="save" class="space-y-4">
            <div>
                <label for="department_id" class="block text-sm font-medium text-gray-700">Department</label>
                <select id="department_id" wire:model="department_id"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                    <option value="">Select Department</option>
                    @foreach ($this->departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
                @error('department_id') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="role_id" class="block text-sm font-medium text-gray-700">Role</label>
                <select id="role_id" wire:model="role_id"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                    <option value="">Select Role</option>
                    @foreach ($this->roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                @error('role_id') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" id="name" wire:model="name"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('name') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="photo" class="block text-sm font-medium text-gray-700">Photo (Optional)</label>
                <input type="file" id="photo" wire:model="photo" class="block w-full mt-1">
                @error('photo') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="qualification" class="block text-sm font-medium text-gray-700">Qualification</label>
                <input type="text" id="qualification" wire:model="qualification"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('qualification') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="experience" class="block text-sm font-medium text-gray-700">Experience</label>
                <input type="text" id="experience" wire:model="experience"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('experience') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <button type="submit"
                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-orange-600 border border-transparent rounded-md shadow-sm hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                    Add Team Member
                </button>
            </div>
        </form>
    </main>

</div>
