<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Models\SuccessStory;
use App\Models\Department;
use Illuminate\Support\Facades\Storage;

new
#[Layout('layouts.admin-portal')]
#[Title('Manage Success Stories')]
class extends Component
{
    use WithFileUploads;

        public $stories;
        public $name = '';
        public $photo;
        public $course = '';
        public $year = '';
        public $occupation = '';
        public $company = '';
        public $statement = '';
        public $editingId = null;
        public $department_id = '';
        public $departments = [];

        public function mount()
    {
        $this->loadStories();
        $this->departments = Department::all();
    }

    public function loadStories()
    {
        $this->stories = SuccessStory::all();
    }


    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'photo' => $this->editingId ? 'nullable|image|max:2048' : 'required|image|max:2048',
            'course' => 'required|string|max:255',
            'year' => 'required|string|max:255',
            'occupation' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'statement' => 'required|string',
            'department_id' => 'required|exists:departments,id',
        ]);

        if ($this->editingId) {
            $story = SuccessStory::find($this->editingId);
            if ($this->photo) {
                Storage::disk('public')->delete($story->photo);
                $photoPath = $this->photo->store('success_stories', 'public');
                $story->photo = $photoPath;
            }
        } else {
            $photoPath = $this->photo->store('success_stories', 'public');
            $story = new SuccessStory();
            $story->photo = $photoPath;
        }

        $story->name = $this->name;
        $story->course = $this->course;
        $story->year = $this->year;
        $story->occupation = $this->occupation;
        $story->company = $this->company;
        $story->statement = $this->statement;
        $story->department_id = $this->department_id;
        $story->save();

        $this->resetInputFields();
        $this->loadStories(); // Refresh the list without calling mount()
        $this->mount();
        session()->flash('message', 'Success story saved successfully.');
    }

    public function edit($id)
    {
        $story = SuccessStory::find($id);
        $this->editingId = $id;
        $this->name = $story->name;
        $this->photo = null;
        $this->course = $story->course;
        $this->year = $story->year;
        $this->occupation = $story->occupation;
        $this->company = $story->company;
        $this->statement = $story->statement;
        $this->department_id = $story->department_id;
    }

    public function resetInputFields()
    {
        $this->reset([
            'editingId', 'name', 'photo', 'course', 'year',
            'occupation', 'company', 'statement', 'department_id'
        ]);
    }
}

?>

<div>
    <main class="px-8 py-8 mx-auto bg-white rounded-md">
        <h1 class="mb-6 text-3xl font-bold text-orange-600">Manage Success Stories</h1>

        @if (session('message'))
        <div class="relative px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
            {{ session('message') }}
        </div>
        @endif

        <form wire:submit="save" class="space-y-4">
            <div>
                <label for="department_id" class="block text-sm font-medium text-gray-700">Department</label>
                <select id="department_id" wire:model="department_id"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                    <option value="">-- Select Department --</option>
                    @foreach ($departments as $dept)
                    <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                    @endforeach
                </select>
                @error('department_id') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
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
                <label for="course" class="block text-sm font-medium text-gray-700">Course</label>
                <input type="text" id="course" wire:model="course"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('course') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="year" class="block text-sm font-medium text-gray-700">Year of Graduation</label>
                <input type="text" id="year" wire:model="year"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('year') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="occupation" class="block text-sm font-medium text-gray-700">Occupation</label>
                <input type="text" id="occupation" wire:model="occupation"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('occupation') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
                <input type="text" id="company" wire:model="company"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('company') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="statement" class="block text-sm font-medium text-gray-700">Statement</label>
                <textarea id="statement" wire:model="statement" rows="4"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500"></textarea>
                @error('statement') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <button type="submit"
                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-orange-600 border border-transparent rounded-md shadow-sm hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                Save Story
            </button>
            @if ($editingId)
            <button type="button" wire:click="resetInputFields"
                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 border border-transparent rounded-md shadow-sm hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                Cancel
            </button>
            @endif
        </form>

        <h2 class="mt-8 text-2xl font-semibold text-gray-800">Existing Stories</h2>
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
                            Photo
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Course
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Year
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Occupation
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Company
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Statement
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($stories as $story)
                    <tr>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $story->name }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <img src="{{ Storage::url($story->photo) }}" alt="{{ $story->name }}"
                                class="object-cover w-20 h-12 ">
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $story->course }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $story->year }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $story->occupation }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $story->company }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-pre-line">{{ $story->statement }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <div class="flex space-x-2">
                                <button wire:click="edit({{ $story->id }})"
                                    class="px-3 py-1 text-xs font-medium text-white bg-yellow-500 rounded-md hover:bg-yellow-600">
                                    Edit
                                </button>
                                <button wire:click="delete({{ $story->id }})"
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