<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;
use App\Models\Department;

new
#[Layout('layouts.admin-portal')]
#[Title('View Departments')]
class extends Component
{
    public $departments;

    public function mount()
    {
        $this->departments = Department::all();
    }

     
}?>

<div>
    <main class="px-8 py-8 mx-auto bg-white rounded-md">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold text-orange-600">Departments</h1>
            <a href="{{ route('admin.departments.create') }}"
                class="px-4 py-2 text-sm font-medium text-white bg-orange-500 rounded-md hover:bg-orange-600">
                Add Department
            </a>
        </div>

        <div>
            @if (session('message'))
            <div class="relative px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded"
                role="alert">
                {{ session('message') }}
            </div>
            @endif
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full overflow-hidden leading-normal rounded-lg shadow-md">
                <thead class="text-gray-700 bg-gray-200">
                    <tr>
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
                            Short Description
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($departments as $department)
                    <tr>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $department->name }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <img src="{{ Storage::url($department->photo) }}" alt="{{ $department->name }}"
                                class="object-cover w-16 h-16 rounded-full">
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $department->short_desc }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <div class="flex space-x-2">
                                <a href="{{ url('/admin/departments/edit/' . $department->id) }}"
                                    class="px-3 py-1 text-xs font-medium text-white bg-yellow-500 rounded-md hover:bg-yellow-600">
                                    Edit
                                </a>
                                <form action="{{ url('/admin/departments/delete/' . $department->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this department?')"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 text-xs font-medium text-white bg-red-500 rounded-md hover:bg-red-600">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </main>
</div>