<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Models\SuccessStory;

new
#[Layout('layouts.admin-portal')]
#[Title('Add Success Story')]
class extends Component
{
    use WithFileUploads;

    public $name = '';
    public $photo;
    public $course = '';
    public $year = '';
    public $occupation = '';
    public $company = '';
    public $statement = '';

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'photo' => 'required|image|max:1024',
            'course' => 'required|string|max:255',
            'year' => 'required|string|max:4', // Assuming year is a 4-digit string
            'occupation' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'statement' => 'required|string',
        ]);

        $successStory = new SuccessStory();
        $successStory->name = $this->name;
        $successStory->photo = $this->photo->store('success-stories', 'public');
        $successStory->course = $this->course;
        $successStory->year = $this->year;
        $successStory->occupation = $this->occupation;
        $successStory->company = $this->company;
        $successStory->statement = $this->statement;
        $successStory->save();

        $this->reset();
        session()->flash('message', 'Success story added successfully.');
    }
}
?>

<div>

    <main class="px-8 py-8 mx-auto bg-white rounded-md">
        <h1 class="mb-6 text-3xl font-bold text-orange-600">Add a Success Story</h1>

        @if (session('message'))
        <div class="relative px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
            {{ session('message') }}
        </div>
        @endif

        <form wire:submit.prevent="save" class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Student Name</label>
                <input type="text" id="name" wire:model="name"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                @error('name') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="photo" class="block text-sm font-medium text-gray-700">Student Photo</label>
                <input type="file" id="photo" wire:model="photo" class="block w-full mt-1">
                @error('photo') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="course" class="block text-sm font-medium text-gray-700">Course Taken</label>
                <input type="text" id="course" wire:model="course"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                @error('course') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="year" class="block text-sm font-medium text-gray-700">Year of Graduation</label>
                <input type="text" id="year" wire:model="year"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                @error('year') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="occupation" class="block text-sm font-medium text-gray-700">Occupation</label>
                <input type="text" id="occupation" wire:model="occupation"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                @error('occupation') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
                <input type="text" id="company" wire:model="company"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                @error('company') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="statement" class="block text-sm font-medium text-gray-700">Student Statement</label>
                <textarea id="statement" wire:model="statement" rows="4"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500"></textarea>
                @error('statement') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <button type="submit"
                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-orange-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Add Success Story
                </button>
            </div>
        </form>
    </main>
</div>