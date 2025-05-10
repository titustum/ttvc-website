<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Models\Partner;

new
#[Layout('layouts.admin-portal')]
#[Title('Add Partner')]
class extends Component
{
    use WithFileUploads;

    public $name = '';
    public $logo;
    public $website = '';

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|max:2048', // 2MB max
            'website' => 'nullable|url|max:255',
        ]);

        $logoPath = $this->logo->store('partners', 'public');

        $partner = new Partner();
        $partner->name = $this->name;
        $partner->logo = $logoPath;
        $partner->website = $this->website;
        $partner->save();

        $this->reset();
        session()->flash('message', 'Partner added successfully.');
    }
}

?>

<div>

    <main class="px-8 py-8 mx-auto bg-white rounded-md">
        <h1 class="mb-6 text-3xl font-bold text-orange-600">Add Partner</h1>

        @if (session('message'))
        <div class="relative px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
            {{ session('message') }}
        </div>
        @endif

        <form wire:submit.prevent="save" class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Partner Name</label>
                <input type="text" id="name" wire:model="name"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('name') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="logo" class="block text-sm font-medium text-gray-700">Partner Logo</label>
                <input type="file" id="logo" wire:model="logo" class="block w-full mt-1">
                @error('logo') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="website" class="block text-sm font-medium text-gray-700">Partner Website (Optional)</label>
                <input type="text" id="website" wire:model="website"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('website') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <button type="submit"
                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-orange-600 border border-transparent rounded-md shadow-sm hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                    Add Partner
                </button>
            </div>
        </form>
    </main>
</div>