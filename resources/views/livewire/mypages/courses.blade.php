<?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use App\Models\Course;
use App\Models\Department;

new #[Layout('layouts.guest')] class extends Component
{
    public $search = '';
    public $department = '';
    public $page = 1;

    protected $queryString = [
        'search' => ['except' => ''],
        'department' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function updatingSearch()
    {
        $this->page = 1;
    }

    public function updatingDepartment()
    {
        $this->page = 1;
    }

    public function courses()
    {
        return Course::with('department')
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->when($this->department, function ($query) {
                $query->whereHas('department', function ($q) {
                    $q->where('name', $this->department);
                });
            })
            ->paginate(12, ['*'], 'page', $this->page);
    }

    public function departments()
    {
        return Department::pluck('name');
    }
};
?>

<section class="py-16 bg-gray-100 to-orange-200 min-h-screen">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold text-orange-600 mb-8">All Courses</h1>

        <div class="mb-8 flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
            <div class="flex-grow">
                <input wire:model.debounce.300ms="search" type="text" placeholder="Search courses..."
                       class="w-full px-4 py-2 rounded-lg border-gray-300 focus:border-orange-500 focus:ring-orange-500">
            </div>
            <div>
                <select wire:model="department"
                        class="w-full px-4 py-2 rounded-lg border-gray-300 focus:border-orange-500 focus:ring-orange-500">
                    <option value="">All Departments</option>
                    @foreach($this->departments() as $dept)
                        <option value="{{ $dept }}">{{ $dept }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($this->courses() as $course)
                <div data-aos="fade-up" class="bg-white rounded-lg shadow-xl overflow-hidden">
                    @if($course->photo)
                        <img src="{{ asset('storage/' . $course->photo) }}" alt="{{ $course->name }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-500">No image available</span>
                        </div>
                    @endif
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-orange-600 mb-2">{{ $course->name }}</h3>
                        <p class="text-gray-600 mb-2"><strong>Department:</strong> {{ $course->department->name }}</p>
                        <ul class="text-gray-600 space-y-2">
                            <li><strong>Requirement:</strong> {{ $course->requirement }}</li>
                            <li><strong>Duration:</strong> {{ $course->duration }}</li>
                            <li><strong>Exam Body:</strong> {{ $course->exam_body }}</li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $this->courses()->links() }}
        </div>
    </div>
</section>
