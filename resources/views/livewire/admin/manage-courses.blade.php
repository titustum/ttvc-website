<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Models\Course;
use App\Models\Department;
use Illuminate\Support\Facades\Storage;

new
#[Layout('layouts.admin-portal')]
#[Title('Manage Courses')]
class extends Component
{
    use WithFileUploads;

    public $courses;
    public $department_id;
    public $name;
    public $photo;
    public $requirement;
    public $duration;
    public $exam_body;
    public $editingId = null;
    public $departments;

    public function mount()
    {
        $this->courses = Course::with('department')->get();
        $this->departments = Department::all();
    }

    public function save()
    {
        $this->validate([
            'department_id' => 'required|exists:departments,id',
            'name' => 'required|string|max:255',
            'photo' => $this->editingId ? 'nullable|image|max:2048' : 'nullable|image|max:2048', // 2MB max
            'requirement' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'exam_body' => 'required|string|max:255',
        ]);

        if ($this->editingId) {
            $course = Course::find($this->editingId);
            if ($this->photo) {
                // Delete the old photo
                Storage::disk('public')->delete($course->photo);
                // Store the new photo
                $photoPath = $this->photo->store('courses', 'public');
                $course->photo = $photoPath;
            }
        } else {
            //if there is file to upload
            $photoPath = $this->photo->store('courses', 'public');
            $course = new Course();
            $course->photo = $photoPath;
        }

        $course->department_id = $this->department_id;
        $course->name = $this->name;
        $course->requirement = $this->requirement;
        $course->duration = $this->duration;
        $course->exam_body = $this->exam_body;
        $course->save();

        $this->resetInputFields();
        $this->mount();
        session()->flash('message', 'Course saved successfully.');
    }

    public function edit($id)
    {
        $course = Course::find($id);
        $this->editingId = $id;
        $this->department_id = $course->department_id;
        $this->name = $course->name;
        $this->requirement = $course->requirement;
        $this->duration = $course->duration;
        $this->exam_body = $course->exam_body;
    }

    public function delete($id)
    {
        $course = Course::find($id);
        Storage::disk('public')->delete($course->photo);
        $course->delete();
        $this->mount();
        session()->flash('message', 'Course deleted successfully.');
    }

    public function resetInputFields()
    {
        $this->editingId = null;
        $this->department_id = null;
        $this->name = '';
        $this->photo = null;
        $this->requirement = '';
        $this->duration = '';
        $this->exam_body = '';
    }
 
}

?>


<div>
    <main class="px-8 py-8 mx-auto bg-white rounded-md">
        <h1 class="mb-6 text-3xl font-bold text-orange-600">Manage Courses</h1>

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
                <label for="requirement" class="block text-sm font-medium text-gray-700">Requirement</label>
                <input type="text" id="requirement" wire:model="requirement"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('requirement') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="duration" class="block text-sm font-medium text-gray-700">Duration</label>
                <input type="text" id="duration" wire:model="duration"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('duration') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="exam_body" class="block text-sm font-medium text-gray-700">Exam Body</label>
                <input type="text" id="exam_body" wire:model="exam_body"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('exam_body') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <button type="submit"
                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-orange-600 border border-transparent rounded-md shadow-sm hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                Save Course
            </button>
            @if ($editingId)
            <button type="button" wire:click="resetInputFields"
                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 border border-transparent rounded-md shadow-sm hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                Cancel
            </button>
            @endif
        </form>

        <h2 class="mt-8 text-2xl font-semibold text-gray-800">Existing Courses</h2>
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
                            Name
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Photo
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Requirement
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Duration
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Exam Body
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($courses as $course)
                    <tr>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $course->department->name }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $course->name }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            @if($course->photo)
                            <img src="{{ Storage::url($course->photo) }}" alt="{{ $course->name }}"
                                class="object-cover w-12 h-12 rounded-full">
                            @else
                            <span class="text-gray-500">No Photo</span>
                            @endif
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $course->requirement }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $course->duration }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $course->exam_body }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <div class="flex space-x-2">
                                <button wire:click="edit({{ $course->id }})"
                                    class="px-3 py-1 text-xs font-medium text-white bg-yellow-500 rounded-md hover:bg-yellow-600">
                                    Edit
                                </button>
                                <button wire:click="delete({{ $course->id }})"
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