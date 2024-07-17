<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Models\Course;
use App\Models\Department;

new
#[Layout('layouts.admin-portal')]
class extends Component
{
    use WithFileUploads;

    public $departments;
    public $department_id = '';
    public $name = '';
    public $photo;
    public $requirement = '';
    public $duration = '';
    public $exam_body = '';

    public function mount()
    {
        $this->departments = Department::all();
    }

    public function save()
    {
        $this->validate([
            'department_id' => 'required|exists:departments,id',
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|max:1024',
            'requirement' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'exam_body' => 'required|string|max:255',
        ]);

        $course = new Course();
        $course->department_id = $this->department_id;
        $course->name = $this->name;
        $course->requirement = $this->requirement;
        $course->duration = $this->duration;
        $course->exam_body = $this->exam_body;

        if ($this->photo) {
            $course->photo = $this->photo->store('courses', 'public');
        }

        $course->save();

        $this->reset(['department_id', 'name', 'photo', 'requirement', 'duration', 'exam_body']);
        session()->flash('message', 'Course created successfully.');
    }
};

?>

<div class="p-3">
   <main class="container px-6 py-8 mx-auto my-8 bg-white rounded-md">
    <h1 class="mb-6 text-3xl font-bold text-orange-600">Create New Course</h1>

    @if (session('message'))
        <div class="relative px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="space-y-4">
        <div>
            <label for="department_id" class="block text-sm font-medium text-gray-700">Department</label>
            <select id="department_id" wire:model="department_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                <option value="">Select Department</option>
                @foreach ($this->departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
            @error('department_id') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Course Name</label>
            <input type="text" id="name" wire:model="name" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
            @error('name') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="photo" class="block text-sm font-medium text-gray-700">Photo (Optional)</label>
            <input type="file" id="photo" wire:model="photo" class="block w-full mt-1">
            @error('photo') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="requirement" class="block text-sm font-medium text-gray-700">Requirement</label>
            <input type="text" id="requirement" wire:model="requirement" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
            @error('requirement') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="duration" class="block text-sm font-medium text-gray-700">Duration</label>
            <input type="text" id="duration" wire:model="duration" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
            @error('duration') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="exam_body" class="block text-sm font-medium text-gray-700">Exam Body</label>
            <input type="text" id="exam_body" wire:model="exam_body" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
            @error('exam_body') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-orange-600 border border-transparent rounded-md shadow-sm hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                Create Course
            </button>
        </div>
    </form>
</main>
</div>


