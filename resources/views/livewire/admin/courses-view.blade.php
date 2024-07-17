<?php

use Livewire\Volt\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use App\Models\Course;
use App\Models\Department;

new #[Layout('layouts.admin-portal')] class extends Component
{
    use WithPagination;

    public $search = '';
    public $department = '';
    public $sortField = 'name';
    public $sortDirection = 'asc';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function with(): array
    {
        $query = Course::query()
            ->when($this->search, fn ($query) =>
                $query->where('name', 'like', '%'.$this->search.'%')
                    ->orWhere('description', 'like', '%'.$this->search.'%')
            )
            ->when($this->department, fn ($query) =>
                $query->where('department_id', $this->department)
            )
            ->orderBy($this->sortField, $this->sortDirection);

        return [
            'courses' => $query->paginate(10),
            'departments' => Department::all(),
        ];
    }
}; ?>

<div class="px-3 py-12 lg:px-0">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <h1 class="mb-6 text-3xl font-bold text-gray-800">Courses</h1>

        <!-- Search and Filter -->
        <div class="mb-6 space-y-4 md:space-y-0 md:flex md:items-center md:justify-between">
            <div class="flex-1 md:mr-4">
                <input wire:model.live="search" type="text" placeholder="Search courses..." class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
            </div>
            <div class="flex-1 md:mr-4">
                <select wire:model.live="department" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
                    <option value="">All Departments</option>
                    @foreach($departments as $dept)
                        <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <a href="{{ route('course.create') }}" class="inline-block px-4 py-2 font-bold text-white bg-orange-600 rounded-md hover:bg-orange-700">Add New Course</a>
            </div>
        </div>

        <!-- Courses Table -->
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="w-full table-auto">
                <thead>
                    <tr class="text-left bg-orange-100">
                        <th class="p-4 cursor-pointer" wire:click="sortBy('name')">
                            Name
                            @if ($sortField === 'name')
                                <span class="ml-1">{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                            @endif
                        </th>
                        <th class="p-4 cursor-pointer" wire:click="sortBy('department_id')">
                            Department
                            @if ($sortField === 'department_id')
                                <span class="ml-1">{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                            @endif
                        </th>
                        <th class="p-4 cursor-pointer" wire:click="sortBy('duration')">
                            Duration
                            @if ($sortField === 'duration')
                                <span class="ml-1">{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                            @endif
                        </th>
                        <th class="p-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                        <tr class="border-t border-gray-200">
                            <td class="p-4">{{ $course->name }}</td>
                            <td class="p-4">{{ $course->department->name }}</td>
                            <td class="p-4">{{ $course->duration }}</td>
                            <td class="p-4">
                                <a href="#" class="text-blue-600 hover:underline">Edit</a>
                                <button wire:click="deleteCourse({{ $course->id }})" class="ml-2 text-red-600 hover:underline">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $courses->links() }}
        </div>
    </div>
</div>
