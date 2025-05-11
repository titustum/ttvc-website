<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;
use App\Models\Application;
use App\Models\Course; // Import the Course model
use Illuminate\Support\Facades\Storage;

new
#[Layout('layouts.admin-portal')]
#[Title('Manage Applicants')]
class  extends Component
{
    public $applicants;
    public $full_name = '';
    public $phone = '';
    public $alternative_phone = '';
    public $gender = '';
    public $id_number = '';
    public $course_id = '';
    public $start_term = '';
    public $high_school = '';
    public $high_school_grade = '';
    public $kcse_index_number = '';
    public $kcse_year = '';
    public $nemis_upi_number = '';
    public $parent_name = '';
    public $parent_phone = '';
    public $editingId = null;
    public $courses;  //added courses

    public function mount()
    {
        $this->applicants = Application::with('course')->get(); // Eager load the course
        $this->courses = Course::all(); // Fetch courses for the dropdown
    }

    public function save()
    {
        $this->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'alternative_phone' => 'nullable|string|max:20',
            'gender' => 'required|in:male,female,other',
            'id_number' => 'required|string|max:20',
            'course_id' => 'required|exists:courses,id', // Validate course_id
            'start_term' => 'required|string|max:255',
            'high_school' => 'required|string|max:255',
            'high_school_grade' => 'required|string|max:255',
            'kcse_index_number' => 'required|string|max:255',
            'kcse_year' => 'required|integer',
            'nemis_upi_number' => 'nullable|string|max:255',
            'parent_name' => 'required|string|max:255',
            'parent_phone' => 'required|string|max:20',
        ]);

        if ($this->editingId) {
            $applicant = Application::find($this->editingId);
        } else {
            $applicant = new Application();
        }

        $applicant->full_name = $this->full_name;
        $applicant->phone = $this->phone;
        $applicant->alternative_phone = $this->alternative_phone;
        $applicant->gender = $this->gender;
        $applicant->id_number = $this->id_number;
        $applicant->course_id = $this->course_id;
        $applicant->start_term = $this->start_term;
        $applicant->high_school = $this->high_school;
        $applicant->high_school_grade = $this->high_school_grade;
        $applicant->kcse_index_number = $this->kcse_index_number;
        $applicant->kcse_year = $this->kcse_year;
        $applicant->nemis_upi_number = $this->nemis_upi_number;
        $applicant->parent_name = $this->parent_name;
        $applicant->parent_phone = $this->parent_phone;
        $applicant->save();

        $this->resetInputFields();
        $this->mount(); // Refresh
        session()->flash('message', 'Applicant saved successfully.');
    }

    public function edit($id)
    {
        $applicant = Application::find($id);
        $this->editingId = $id;
        $this->full_name = $applicant->full_name;
        $this->phone = $applicant->phone;
        $this->alternative_phone = $applicant->alternative_phone;
        $this->gender = $applicant->gender;
        $this->id_number = $applicant->id_number;
        $this->course_id = $applicant->course_id;
        $this->start_term = $applicant->start_term;
        $this->high_school = $applicant->high_school;
        $this->high_school_grade = $applicant->high_school_grade;
        $this->kcse_index_number = $applicant->kcse_index_number;
        $this->kcse_year = $applicant->kcse_year;
        $this->nemis_upi_number = $applicant->nemis_upi_number;
        $this->parent_name = $applicant->parent_name;
        $this->parent_phone = $applicant->parent_phone;
    }

    public function delete($id)
    {
        Application::destroy($id);
        $this->mount(); // Refresh
        session()->flash('message', 'Applicant deleted successfully.');
    }

    public function resetInputFields()
    {
        $this->editingId = null;
        $this->full_name = '';
        $this->phone = '';
        $this->alternative_phone = '';
        $this->gender = '';
        $this->id_number = '';
        $this->course_id = '';
        $this->start_term = '';
        $this->high_school = '';
        $this->high_school_grade = '';
        $this->kcse_index_number = '';
        $this->kcse_year = '';
        $this->nemis_upi_number = '';
        $this->parent_name = '';
        $this->parent_phone = '';
    }

     
}
?>

<div>
    <main class="px-8 py-8 mx-auto bg-white rounded-md">
        <h1 class="mb-6 text-3xl font-bold text-orange-600">Manage Applicants</h1>

        @if (session('message'))
        <div class="relative px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
            {{ session('message') }}
        </div>
        @endif

        <form wire:submit.prevent="save" class="space-y-4">
            <div>
                <label for="full_name" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" id="full_name" wire:model="full_name"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('full_name') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" id="phone" wire:model="phone"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('phone') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="alternative_phone" class="block text-sm font-medium text-gray-700">Alternative Phone</label>
                <input type="text" id="alternative_phone" wire:model="alternative_phone"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('alternative_phone') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                <select id="gender" wire:model="gender"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
                @error('gender') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="id_number" class="block text-sm font-medium text-gray-700">ID Number</label>
                <input type="text" id="id_number" wire:model="id_number"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('id_number') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="course_id" class="block text-sm font-medium text-gray-700">Course</label>
                <select id="course_id" wire:model="course_id"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                    <option value="">Select Course</option>
                    @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
                @error('course_id') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="start_term" class="block text-sm font-medium text-gray-700">Start Term</label>
                <input type="text" id="start_term" wire:model="start_term"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('start_term') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="high_school" class="block text-sm font-medium text-gray-700">High School</label>
                <input type="text" id="high_school" wire:model="high_school"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('high_school') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="high_school_grade" class="block text-sm font-medium text-gray-700">High School Grade</label>
                <input type="text" id="high_school_grade" wire:model="high_school_grade"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('high_school_grade') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="kcse_index_number" class="block text-sm font-medium text-gray-700">KCSE Index Number</label>
                <input type="text" id="kcse_index_number" wire:model="kcse_index_number"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('kcse_index_number') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="kcse_year" class="block text-sm font-medium text-gray-700">KCSE Year</label>
                <input type="number" id="kcse_year" wire:model="kcse_year"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('kcse_year') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="nemis_upi_number" class="block text-sm font-medium text-gray-700">NEMIS UPI Number</label>
                <input type="text" id="nemis_upi_number" wire:model="nemis_upi_number"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('nemis_upi_number') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="parent_name" class="block text-sm font-medium text-gray-700">Parent Name</label>
                <input type="text" id="parent_name" wire:model="parent_name"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('parent_name') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="parent_phone" class="block text-sm font-medium text-gray-700">Parent Phone</label>
                <input type="text" id="parent_phone" wire:model="parent_phone"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('parent_phone') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <button type="submit"
                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-orange-600 border border-transparent rounded-md shadow-sm hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                Save Applicant
            </button>
            @if ($editingId)
            <button type="button" wire:click="resetInputFields"
                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 border border-transparent rounded-md shadow-sm hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                Cancel
            </button>
            @endif
        </form>

        <h2 class="mt-8 text-2xl font-semibold text-gray-800">Existing Applicants</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full mt-4 overflow-hidden leading-normal rounded-lg shadow-md">
                <thead class="text-gray-700 bg-gray-200">
                    <tr>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Full Name
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Phone
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Alternative Phone
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Gender
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            ID Number
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Course
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Start Term
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            High School
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            High School Grade
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            KCSE Index Number
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            KCSE Year
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            NEMIS UPI Number
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Parent Name
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Parent Phone
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($applicants as $applicant)
                    <tr>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $applicant->full_name }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $applicant->phone }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $applicant->alternative_phone ?? '-' }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $applicant->gender }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $applicant->id_number }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $applicant->course->name }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $applicant->start_term }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $applicant->high_school }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $applicant->high_school_grade }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $applicant->kcse_index_number }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $applicant->kcse_year }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $applicant->nemis_upi_number ?? '-' }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $applicant->parent_name }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">{{ $applicant->parent_phone }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <div class="flex space-x-2">
                                <button wire:click="edit({{ $applicant->id }})"
                                    class="px-3 py-1 text-xs font-medium text-white bg-yellow-500 rounded-md hover:bg-yellow-600">
                                    Edit
                                </button>
                                <button wire:click="delete({{ $applicant->id }})"
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