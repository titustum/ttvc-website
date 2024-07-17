<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use App\Models\Application;
use Livewire\WithPagination;

new #[Layout('layouts.admin-portal')] class extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    public $perPage = 10;

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function with(): array
    {
        return [
            'applicants' => Application::query()
                ->when($this->search, function ($query, $search) {
                    return $query->search($search);
                })
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate($this->perPage),
        ];
    }
}; ?>

<div class="py-12 bg-gray-100">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200 sm:px-20">
                <div class="flex flex-col items-center justify-between mb-6 space-y-4 md:flex-row md:space-y-0">
                    <h2 class="text-2xl font-bold text-gray-800">
                        View Applications
                    </h2>
                    <div class="flex flex-col w-full space-y-4 md:flex-row md:space-y-0 md:space-x-4 md:w-auto">
                        <input wire:model.debounce.300ms="search" type="text" placeholder="Search applications..." class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                        <select wire:model.live="perPage" class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500 sm:text-sm md:w-auto">
                            <option value="10">10 per page</option>
                            <option value="25">25 per page</option>
                            <option value="50">50 per page</option>
                            <option value="100">100 per page</option>
                        </select>
                    </div>
                </div>

                <!-- Desktop view -->
                <div class="hidden overflow-x-auto bg-white rounded-lg shadow md:block">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-orange-100">
                            <tr>
                                @php
                                    $headers = [
                                        'first_name' => 'Name',
                                        'email' => 'Email',
                                        'phone' => 'Phone',
                                        'course_id' => 'Course',
                                        'start_term' => 'Start Term',
                                        'high_school' => 'High School',
                                        'created_at' => 'Applied On'
                                    ];
                                @endphp

                                @foreach ($headers as $field => $label)
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer" wire:click="sortBy('{{ $field }}')">
                                        {{ $label }}
                                        @if ($sortField === $field)
                                            <span class="ml-1">{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                                        @endif
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($applicants as $applicant)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="font-medium text-gray-900">{{ $applicant->first_name }} {{ $applicant->last_name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-gray-500">{{ $applicant->email }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-gray-500">{{ $applicant->phone }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-gray-500">{{ $applicant->course->name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-gray-500">{{ $applicant->start_term }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-gray-500">{{ $applicant->high_school }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-gray-500">{{ $applicant->created_at->format('Y-m-d H:i') }}</div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                        No applications found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Mobile view -->
                <div class="space-y-4 md:hidden">
                    @forelse ($applicants as $applicant)
                        <div class="p-4 bg-white rounded-lg shadow">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $applicant->first_name }} {{ $applicant->last_name }}</h3>
                            <p class="text-gray-600">{{ $applicant->email }}</p>
                            <p class="text-gray-600">{{ $applicant->phone }}</p>
                            <p class="text-gray-600">Course: {{ $applicant->course->name }}</p>
                            <p class="text-gray-600">Start Term: {{ $applicant->start_term }}</p>
                            <p class="text-gray-600">High School: {{ $applicant->high_school }}</p>
                            <p class="mt-2 text-sm text-gray-500">Applied on: {{ $applicant->created_at->format('Y-m-d H:i') }}</p>
                        </div>
                    @empty
                        <div class="py-4 text-center text-gray-500">
                            No applications found.
                        </div>
                    @endforelse
                </div>

                <div class="mt-4">
                    {{ $applicants->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
