<?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use App\Models\TeamMember;
use App\Models\Role;
use App\Models\Department;

new
#[Layout('layouts.guest')]
class extends Component
{
    public $search = '';
    public $department = '';
    public $roleOrder = [];
    public $departments = [];

    protected $queryString = [
        'search' => ['except' => ''],
        'department' => ['except' => ''],
    ];

    public function mount()
    {
        $this->departments = Department::pluck('name');
        $this->roleOrder = [
            'Principal',
            'Deputy Principal',
            'HOD',
            'Registrar',
            'Dean of Students',
            'Finance Officer',
            'Academic Officer',
            'Web Master',
            'Internal Auditor',
            'Research & Innovations Officer',
            'Trainer',
            'Others'
        ];
    }

    public function teamMembers()
    {
        return TeamMember::with(['role', 'department'])
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->when($this->department, function ($query) {
                $query->whereHas('department', function ($q) {
                    $q->where('name', $this->department);
                });
            })
            ->get()
            ->groupBy('role.name');
    }

}
?>

<section class="py-16 bg-gradient-to-br from-orange-100 to-orange-200 min-h-screen">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold text-orange-600 mb-8">Our Team</h1>

        <div class="mb-8 flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
            <div class="flex-grow">
                <input wire:model.debounce.300ms="search" type="text" placeholder="Search team members..."
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

        @foreach($roleOrder as $role)
            @if(isset($this->teamMembers()[$role]))
                <div class="mb-12">
                    <h2 class="text-2xl font-semibold text-orange-600 mb-6">
                        {{ $role }}@if($role != 'Others')s@endif
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach($this->teamMembers()[$role] as $member)
                            <div class="bg-white rounded-lg shadow-xl overflow-hidden">
                                @if($member->photo)
                                    <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}" class="w-full h-48 object-cover">
                                @else
                                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                        <span class="text-gray-500">No image available</span>
                                    </div>
                                @endif
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold text-orange-600 mb-2">{{ $member->name }}</h3>
                                    <p class="text-gray-600 mb-2"><strong>Department:</strong> {{ $member->department->name }}</p>
                                    <p class="text-gray-600 mb-2"><strong>Qualification:</strong> {{ $member->qualification }}</p>
                                    <p class="text-gray-600"><strong>Experience:</strong> {{ $member->experience }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</section>
