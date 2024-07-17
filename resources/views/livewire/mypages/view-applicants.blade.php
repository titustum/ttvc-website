<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use App\Models\Application;
use Livewire\WithPagination;

new #[Layout('layouts.guest')] class extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function with(): array
    {
        return [
            'applicants' => Application::query()
                ->when($this->search, function ($query, $search) {
                    return $query->search($search);
                })
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate(10),
        ];
    }
}; ?>

<div class="py-12 bg-gray-100">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        View Applicants
                    </h2>
                    <div class="flex items-center">
                        <input wire:model.debounce.300ms="search" type="text" placeholder="Search applicants..." class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>

                <div class="mt-8">
                    <div class="overflow-x-auto relative">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3 px-6 cursor-pointer" wire:click="sortBy('first_name')">
                                        Name
                                        @if ($sortField === 'first_name')
                                            <span class="ml-1">{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                                        @endif
                                    </th>
                                    <th scope="col" class="py-3 px-6 cursor-pointer" wire:click="sortBy('email')">
                                        Email
                                        @if ($sortField === 'email')
                                            <span class="ml-1">{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                                        @endif
                                    </th>
                                    <th scope="col" class="py-3 px-6 cursor-pointer" wire:click="sortBy('phone')">
                                        Phone
                                        @if ($sortField === 'phone')
                                            <span class="ml-1">{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                                        @endif
                                    </th>
                                    <th scope="col" class="py-3 px-6 cursor-pointer" wire:click="sortBy('course_id')">
                                        Course
                                        @if ($sortField === 'course_id')
                                            <span class="ml-1">{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                                        @endif
                                    </th>
                                    <th scope="col" class="py-3 px-6 cursor-pointer" wire:click="sortBy('start_term')">
                                        Start Term
                                        @if ($sortField === 'start_term')
                                            <span class="ml-1">{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                                        @endif
                                    </th>
                                    <th scope="col" class="py-3 px-6 cursor-pointer" wire:click="sortBy('high_school')">
                                        High School
                                        @if ($sortField === 'high_school')
                                            <span class="ml-1">{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                                        @endif
                                    </th>
                                    <th scope="col" class="py-3 px-6 cursor-pointer" wire:click="sortBy('created_at')">
                                        Applied On
                                        @if ($sortField === 'created_at')
                                            <span class="ml-1">{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                                        @endif
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($applicants as $applicant)
                                    <tr class="bg-white border-b hover:bg-gray-50">
                                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $applicant->first_name }} {{ $applicant->last_name }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $applicant->email }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $applicant->phone }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $applicant->course->name }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $applicant->start_term }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $applicant->high_school }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $applicant->created_at->format('Y-m-d H:i') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mt-4">
                    {{ $applicants->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
