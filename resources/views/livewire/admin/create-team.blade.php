<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Models\Department;
use App\Models\Role;
use App\Models\TeamMember;

new
#[Layout('layouts.admin-portal')]
#[Title('Create Team Member')]
class extends Component
{
    use WithFileUploads;

    public $department_id;
    public $role_id;
    public $section_assigned = '';
    public $email = '';
    public $name = '';
    public $photo;
    public $qualification = '';
    public $years_of_experience = '4';

    public $departments;
    public $roles;

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
            'section_assigned' => 'nullable|string|max:255',
            'email' => 'required|email|unique:team_members,email',
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|max:1024',
            'qualification' => 'required|string|max:255',
            'years_of_experience' => 'nullable|string|max:255',
        ]);

        $teamMember = new TeamMember();
        $teamMember->department_id = $this->department_id;
        $teamMember->role_id = $this->role_id;
        $teamMember->section_assigned = $this->section_assigned;
        $teamMember->email = $this->email;
        $teamMember->name = $this->name;
        $teamMember->qualification = $this->qualification;
        $teamMember->years_of_experience = $this->years_of_experience;

        if ($this->photo) {
            $teamMember->photo = $this->photo->store('team-members', 'public');
        }

        $teamMember->save();

        $this->reset();
        session()->flash('message', 'Team member created successfully.');
    }
}

?>


<div>

    <main class="px-8 py-8 mx-auto bg-white rounded-md">
        <h1 class="mb-6 text-3xl font-bold text-orange-600">Create New Team Member</h1>

        @if (session('message'))
        <div class="relative px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
            {{ session('message') }}
        </div>
        @endif

        <form wire:submit.prevent="save" class="space-y-4">
            <div>
                <label for="department_id" class="block text-sm font-medium text-gray-700">Department</label>
                <select id="department_id" wire:model="department_id"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="">Select Department</option>
                    @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
                @error('department_id') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="role_id" class="block text-sm font-medium text-gray-700">Role</label>
                <select id="role_id" wire:model="role_id"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="">Select Role</option>
                    @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                @error('role_id') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="section_assigned" class="block text-sm font-medium text-gray-700">Section Assigned
                    (Optional)</label>
                <input type="text" id="section_assigned" wire:model="section_assigned"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                @error('section_assigned') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" wire:model="email"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                @error('email') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" id="name" wire:model="name"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                @error('name') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="photo" class="block text-sm font-medium text-gray-700">Profile Photo (Optional)</label>
                <input type="file" id="photo" wire:model="photo" class="block w-full mt-1">
                @error('photo') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="qualification" class="block text-sm font-medium text-gray-700">Qualification</label>
                <input type="text" id="qualification" wire:model="qualification"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                @error('qualification') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="years_of_experience" class="block text-sm font-medium text-gray-700">Years of
                    Experience</label>
                <input type="text" id="years_of_experience" wire:model="years_of_experience"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                @error('years_of_experience') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <button type="submit"
                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-orange-600 border border-transparent rounded-md shadow-sm hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Create Team Member
                </button>
            </div>
        </form>
    </main>

</div>