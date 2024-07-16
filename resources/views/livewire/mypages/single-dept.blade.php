<?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use App\Models\Department;

new #[Layout('layouts.guest')] class extends Component
{
    public $department;

    public function mount($deptname)
    {
        $this->department = Department::where('name', $deptname)->firstOrFail();
    }
};
?>

<section class="py-16 bg-gray-100 to-orange-200 min-h-screen">
    <div class="container mx-auto px-4">
        @if($department)
            <h1 class="text-4xl font-bold text-orange-600 mb-8">{{ $department->name }}</h1>

            <div class="bg-white shadow-xl rounded-lg overflow-hidden mb-8">
                @if($department->banner_pic)
                    <img src="{{ asset('storage/' . $department->banner_pic) }}" alt="{{ $department->name }}" class="w-full h-64 object-cover">
                @endif

                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="md:col-span-2">
                            <h2 class="text-2xl font-semibold text-gray-800 mb-4">About the Department</h2>
                            <p class="text-gray-600 mb-4">{{ $department->full_desc }}</p>
                        </div>

                        <div>
                            @if($department->photo)
                                <img src="{{ asset('storage/' . $department->photo) }}" alt="{{ $department->name }} Photo" class="w-full rounded-lg shadow-md mb-4">
                            @endif

                            <div class="bg-orange-100 rounded-lg p-4">
                                <h3 class="text-xl font-semibold text-orange-600 mb-2">Quick Facts</h3>
                                <p class="text-gray-700">{{ $department->short_desc }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-xl rounded-lg overflow-hidden mb-8">
                <div class="p-6">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Courses Offered</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($department->courses as $course)
                            <div class="bg-gray-50 rounded-lg p-4 shadow">
                                @if($course->photo)
                                    <img src="{{ asset('storage/' . $course->photo) }}" alt="{{ $course->name }}" class="w-full h-40 object-cover rounded-lg mb-4">
                                @endif
                                <h3 class="text-xl font-semibold text-orange-600 mb-2">{{ $course->name }}</h3>
                                <ul class="text-gray-600 space-y-2">
                                    <li><strong>Requirement:</strong> {{ $course->requirement }}</li>
                                    <li><strong>Duration:</strong> {{ $course->duration }}</li>
                                    <li><strong>Exam Body:</strong> {{ $course->exam_body }}</li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-xl rounded-lg overflow-hidden">
                <div class="p-6">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Our Team</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach($department->teamMembers as $member)
                            <div class="bg-gray-50 rounded-lg p-4 text-center shadow">
                                @if($member->photo)
                                    <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}" class="w-24 h-24 rounded-full mx-auto mb-2 object-cover">
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
