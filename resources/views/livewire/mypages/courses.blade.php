<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;
use App\Models\Course;
use App\Models\Department;

new
#[Title('Courses')]
#[Layout('layouts.guest')]
class extends Component
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

<section class="min-h-screen py-16 bg-gray-100 to-orange-200">
    <div class="container px-4 mx-auto">
        <h1 class="mb-8 text-4xl font-bold text-orange-600">All Courses</h1>

        <div class="flex flex-col mb-8 space-y-4 sm:flex-row sm:space-y-0 sm:space-x-4">
            <div class="flex-grow">
                <input wire:model.debounce.300ms="search" type="text" placeholder="Search courses..."
                       class="w-full px-4 py-2 border-gray-300 rounded-lg focus:border-orange-500 focus:ring-orange-500">
            </div>
            <div>
                <select wire:model="department"
                        class="w-full px-4 py-2 border-gray-300 rounded-lg focus:border-orange-500 focus:ring-orange-500">
                    <option value="">All Departments</option>
                    @foreach($this->departments() as $dept)
                        <option value="{{ $dept }}">{{ $dept }}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="mb-8 overflow-hidden bg-white rounded-lg shadow-xl">
            <div class="p-6">
                {{-- <h2 class="mb-6 text-2xl font-semibold text-gray-800">Available Courses</h2> --}}

                <div class="mb-12 overflow-x-auto">
                    <table class="w-full overflow-hidden bg-white rounded-lg shadow-md">
                        <thead class="text-white bg-orange-600">
                            <tr>
                                <th class="px-2 py-2 text-left sm:px-4 sm:py-3">Course</th>
                                <th class="hidden px-2 py-2 text-left sm:px-4 sm:py-3 sm:table-cell">Requirements</th>
                                <th class="hidden px-2 py-2 text-left sm:px-4 sm:py-3 md:table-cell">Duration</th>
                                <th class="hidden px-2 py-2 text-left sm:px-4 sm:py-3 md:table-cell">Exam Body</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($this->courses() as $course)
                            <tr class="border-b">
                                <td class="px-2 py-2 sm:px-4 sm:py-3">
                                    <div class="font-medium">{{$course->name}}</div>
                                    <div class="text-sm text-gray-500 sm:hidden">{{$course->requirement}}</div>
                                    <div class="text-sm text-gray-500 sm:hidden md:hidden">{{$course->duration}} | {{$course->exam_body}}</div>
                                </td>
                                <td class="hidden px-2 py-2 sm:px-4 sm:py-3 sm:table-cell">{{$course->requirement}}</td>
                                <td class="hidden px-2 py-2 sm:px-4 sm:py-3 md:table-cell">{{$course->duration}}</td>
                                <td class="hidden px-2 py-2 sm:px-4 sm:py-3 md:table-cell">{{$course->exam_body}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>



            </div>
        </div>




        <div class="mt-8">
            {{ $this->courses()->links() }}
        </div>
    </div>
</section>
