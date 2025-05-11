<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;
use App\Models\Role;

new
#[Layout('layouts.admin-portal')]
#[Title('Manage Roles')]
class extends Component
{
    public $roles;
    public $name = '';
    public $editingId = null;

    public function mount()
    {
        $this->roles = Role::all();
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . ($this->editingId ?? 'NULL'),
        ]);

        if ($this->editingId) {
            $role = Role::find($this->editingId);
            $role->name = $this->name;
            $role->save();
        } else {
            $role = new Role();
            $role->name = $this->name;
            $role->save();
        }

        $this->resetInputFields();
        $this->mount();
        session()->flash('message', 'Role saved successfully.');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $this->editingId = $id;
        $this->name = $role->name;
    }

    public function delete($id)
    {
        Role::find($id)->delete();
        $this->mount();
        session()->flash('message', 'Role deleted successfully.');
    }

    public function resetInputFields()
    {
        $this->editingId = null;
        $this->name = '';
    }
 
}

?>

<div>
    <main class="px-8 py-8 mx-auto bg-white rounded-md">
        <h1 class="mb-6 text-3xl font-bold text-orange-600">Manage Roles</h1>

        @if (session('message'))
        <div class="relative px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
            {{ session('message') }}
        </div>
        @endif

        <form wire:submit.prevent="save" class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" wire:model="name"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                @error('name') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <button type="submit"
                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-orange-600 border border-transparent rounded-md shadow-sm hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                Save Role
            </button>
            @if ($editingId)
            <button type="button" wire:click="resetInputFields"
                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 border border-transparent rounded-md shadow-sm hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                Cancel
            </button>
            @endif
        </form>

        <h2 class="mt-8 text-2xl font-semibold text-gray-800">Existing Roles</h2>
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
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($roles as $role)
                    <tr>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $role->name }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                            <div class="flex space-x-2">
                                <button wire:click="edit({{ $role->id }})"
                                    class="px-3 py-1 text-xs font-medium text-white bg-yellow-500 rounded-md hover:bg-yellow-600">
                                    Edit
                                </button>
                                <button wire:click="delete({{ $role->id }})"
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