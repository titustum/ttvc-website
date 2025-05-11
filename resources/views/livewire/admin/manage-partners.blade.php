<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Models\Partner;
use Illuminate\Support\Facades\Storage;

new
#[Layout('layouts.admin-portal')]
#[Title('Manage Partners')]
class extends Component
{
    use WithFileUploads;

    public $partners;
    public $name = '';
    public $logo;
    public $website = '';
    public $editingId = null;

    public function mount()
    {
        $this->partners = Partner::all();
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'logo' => $this->editingId ? 'nullable|image|max:2048' : 'required|image|max:2048', // 2MB max
            'website' => 'nullable|url|max:255',
        ]);

        if ($this->editingId) {
            $partner = Partner::find($this->editingId);
             if ($this->logo) {
                // Delete the old logo
                Storage::disk('public')->delete($partner->logo);
                $logoPath = $this->logo->store('partners', 'public');
                $partner->logo = $logoPath;
            }
        } else {
            $logoPath = $this->logo->store('partners', 'public');
            $partner = new Partner();
            $partner->logo = $logoPath;
        }

        $partner->name = $this->name;
        $partner->website = $this->website;
        $partner->save();

        $this->resetInputFields();
        $this->mount();
        session()->flash('message', 'Partner saved successfully.');
    }

    public function edit($id)
    {
        $partner = Partner::find($id);
        $this->editingId = $id;
        $this->name = $partner->name;
        $this->website = $partner->website;
    }

    public function delete($id)
    {
        $partner = Partner::find($id);
        Storage::disk('public')->delete($partner->logo);
        $partner->delete();
        $this->mount();
        session()->flash('message', 'Partner deleted successfully.');
    }

    public function resetInputFields()
    {
        $this->editingId = null;
        $this->name = '';
        $this->logo = null;
        $this->website = '';
    }

 }
?>


<div>
    <main class="px-8 py-8 mx-auto bg-white rounded-md">
        <h1 class="mb-6 text-3xl font-bold text-orange-600">Manage Partners</h1>

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

            <button type="submit"
                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-orange-600 border border-transparent rounded-md shadow-sm hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                Save Partner
            </button>
            @if ($editingId)
            <button type="button" wire:click="resetInputFields"
                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 border border-transparent rounded-md shadow-sm hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                Cancel
            </button>
            @endif
        </form>

        <h2 class="mt-8 text-2xl font-semibold text-gray-800">Existing Partners</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full mt-4 overflow-hidden leading-normal rounded-lg shadow-md">
                <thead class="text-gray-700 bg-gray-200">
                    <tr>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Name
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Logo
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Website
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left uppercase border-b-2 border-gray-200">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($partners as $partner)
                    <tr>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $partner->name }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}"
                                class="object-contain w-20 h-12 ">
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-600 whitespace-no-wrap">
                                @if($partner->website)
                                <a href="{{ $partner->website }}" target="_blank"
                                    class="text-blue-600 hover:text-blue-800">{{ $partner->website }}</a>
                                @else
                                -
                                @endif
                            </p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <div class="flex space-x-2">
                                <button wire:click="edit({{ $partner->id }})"
                                    class="px-3 py-1 text-xs font-medium text-white bg-yellow-500 rounded-md hover:bg-yellow-600">
                                    Edit
                                </button>
                                <button wire:click="delete({{ $partner->id }})"
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