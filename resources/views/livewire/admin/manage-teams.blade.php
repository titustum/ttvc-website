<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Models\TeamMember;
use App\Models\Department;
use App\Models\Role;
use Illuminate\Support\Facades\Storage;

new
#[Layout('layouts.admin-portal')]
#[Title('Manage Team Members')]
class extends Component
{
    use WithFileUploads;

    public $teamMembers;
    public $department_id;
    public $role_id;
    public $section_assigned; 
    public $name;
    public $photo;
    public $qualification;
    public $graduation_year = '2022';
    public $editingId = null;
    public $departments;
    public $roles;

    public function mount()
    {
        $this->teamMembers = TeamMember::with(['department', 'role'])->get();
        $this->departments = Department::all();
        $this->roles = Role::all();
    }

    public function save()
    {
        $this->validate([
            'department_id' => 'required|exists:departments,id',
            'role_id' => 'required|exists:roles,id',
            'section_assigned' => 'nullable|string|max:255', 
            'name' => 'required|string|max:255',
            'photo' => $this->editingId ? 'nullable|image|max:2048' : 'nullable|image|max:2048', // 2MB max
            'qualification' => 'required|string|max:255',
            'graduation_year' => 'required|string|max:255',
        ]);

        if ($this->editingId) {
            $teamMember = TeamMember::find($this->editingId);
             if ($this->photo) {
                // Delete the old photo
                Storage::disk('public')->delete($teamMember->photo);
                // Store the new photo
                $photoPath = $this->photo->store('team_members', 'public');
                $teamMember->photo = $photoPath;
            }
        } else {
            $photoPath = $this->photo->store('team_members', 'public');
            $teamMember = new TeamMember();
            $teamMember->photo = $photoPath;
        }

        $teamMember->department_id = $this->department_id;
        $teamMember->role_id = $this->role_id;
        $teamMember->section_assigned = $this->section_assigned; 
        $teamMember->name = $this->name;
        $teamMember->qualification = $this->qualification;
        $teamMember->graduation_year = $this->graduation_year;
        $teamMember->save();

        $this->resetInputFields();
        $this->mount();
        session()->flash('message', 'Team member saved successfully.');
    }

    public function edit($id)
    {
        $teamMember = TeamMember::find($id);
        $this->editingId = $id;
        $this->department_id = $teamMember->department_id;
        $this->role_id = $teamMember->role_id;
        $this->section_assigned = $teamMember->section_assigned; 
        $this->name = $teamMember->name;
        $this->qualification = $teamMember->qualification;
        $this->graduation_year = $teamMember->graduation_year;
    }

    public function delete($id)
    {
        $teamMember = TeamMember::find($id);
        Storage::disk('public')->delete($teamMember->photo);
        $teamMember->delete();
        $this->mount();
        session()->flash('message', 'Team member deleted successfully.');
    }

    public function resetInputFields()
    {
        $this->editingId = null;
        $this->department_id = null;
        $this->role_id = null;
        $this->section_assigned = '';
        $this->email = '';
        $this->name = '';
        $this->photo = null;
        $this->qualification = '';
        $this->graduation_year = '2022';
    }

     
}

?>


<div>
    <main class="px-8 py-8 mx-auto bg-white rounded-md">
        <h1 class="mb-6 text-3xl font-bold text-orange-600">Manage Team Members</h1>

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
                    @foreach ($departments as $department)
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
                    @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                @error('role_id') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="section_assigned" class="block text-sm font-medium text-gray-700">Section Assigned</label>
                <input type="text" id="section_assigned" wire:model="section_assigned"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('section_assigned') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

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
                <label for="qualification" class="block text-sm font-medium text-gray-700">Qualification/Course</label>
                <input type="text" id="qualification" wire:model="qualification"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('qualification') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="graduation_year" class="block text-sm font-medium text-gray-700">Graduation Year</label>
                <input type="text" id="graduation_year" wire:model="graduation_year"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('graduation_year') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <button type="submit"
                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-orange-600 border border-transparent rounded-md shadow-sm hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                Save Team Member
            </button>
            @if ($editingId)
            <button type="button" wire:click="resetInputFields"
                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 border border-transparent rounded-md shadow-sm hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                Cancel
            </button>
            @endif
        </form>

        <h2 class="mt-8 text-2xl font-semibold text-gray-800">Existing Team Members</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full mt-4 overflow-hidden leading-normal rounded-lg shadow-md">
                <thead class="text-gray-700 bg-gray-200">
                    <tr>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Department
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Role
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Section Assigned
                        </th>
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
                            Qualification
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Graduation Year
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($teamMembers as $member)
                    <tr>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $member->department?->name ?? 'N/A' }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $member->role?->name ?? 'N/A' }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $member->section_assigned ?? '-' }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $member->name }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            @if($member->photo)
                            <img src="{{ Storage::url($member->photo) }}" alt="{{ $member->name }}"
                                class="object-cover w-12 h-12 rounded-full">
                            @else
                            <span class="text-gray-500">No Photo</span>
                            @endif
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $member->qualification }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $member->graduation_year }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <div class="flex space-x-2">
                                <button wire:click="edit({{ $member->id }})"
                                    class="px-3 py-1 text-xs font-medium text-white bg-yellow-500 rounded-md hover:bg-yellow-600">
                                    Edit
                                </button>
                                <button wire:click="delete({{ $member->id }})"
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