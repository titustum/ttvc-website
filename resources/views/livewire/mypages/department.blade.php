<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;
use App\Models\Department;

new
#[Title('Department')]
#[Layout('layouts.guest')]
class extends Component
{
    public $department;

    public function mount($deptname)
    {
        $this->department = Department::where('name', $deptname)->firstOrFail();
    }

};
?>

<section class="min-h-screen py-16 bg-gray-100 to-orange-200">
    <div class="container px-4 mx-auto">
        @if($department)
            <h1 class="mb-8 text-4xl font-bold text-orange-600">{{ $department->name }}</h1>

            <div class="mb-8 overflow-hidden bg-white rounded-lg shadow-xl">
                @if($department->banner_pic)
                    <img src="{{ asset('storage/' . $department->banner_pic) }}" alt="{{ $department->name }}" class="object-cover w-full h-64">
                @endif

                <div class="p-6">
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                        <div class="md:col-span-2">
                            <h2 class="mb-4 text-2xl font-semibold text-gray-800">About the Department</h2>
                            <p class="mb-4 text-gray-600">{{ $department->full_desc }}</p>
                        </div>

                        <div>
                            @if($department->photo)
                                <img src="{{ asset('storage/' . $department->photo) }}" alt="{{ $department->name }} Photo" class="w-full mb-4 rounded-lg shadow-md">
                            @endif

                            <div class="p-4 bg-orange-100 rounded-lg">
                                <h3 class="mb-2 text-xl font-semibold text-orange-600">Quick Facts</h3>
                                <p class="text-gray-700">{{ $department->short_desc }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-8 overflow-hidden bg-white rounded-lg shadow-xl">
                <div class="p-6">
                    <h2 class="mb-6 text-2xl font-semibold text-gray-800">Courses Offered</h2>


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
                                @foreach($department->courses as $course)
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

            <div class="overflow-hidden bg-white rounded-lg shadow-xl">
                <div class="p-6">
                    <h2 class="mb-6 text-2xl font-semibold text-gray-800">Our Team</h2>
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                        @foreach($department->teamMembers as $member)
                            <div class="p-4 text-center rounded-lg shadow bg-gray-50">
                                @if($member->photo)
                                    <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}" class="object-cover w-24 h-24 mx-auto mb-2 rounded-full">
                                @endif
                                <h4 class="font-semibold text-gray-800">{{ $member->name }}</h4>
                                <p class="text-sm text-orange-600">{{ $member->role->name }}</p>
                                <p class="text-xs text-gray-500">{{ $member->qualification }}</p>
                                <p class="text-xs text-gray-500">{{ $member->experience }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @else
            <p class="text-xl text-center text-gray-800">Department not found.</p>
        @endif
    </div>
</section>
