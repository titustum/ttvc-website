<?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use App\Models\Role;
use App\Models\TeamMember;

new #[Layout('layouts.guest')] class extends Component
{
    public $principals;
    public $deputies;
    public $hos;
    public $hod;
    public $trainers;
    public $others;

    public function mount(){
        $this->principals = TeamMember::whereHas('role', function ($query) {
            $query->where('name', 'Principal');
        })->get();

        $this->deputies = TeamMember::whereHas('role', function ($query) {
            $query->where('name', 'Deputy Principal');
        })->get();

        $this->hod = TeamMember::whereHas('role', function ($query) {
            $query->where('name', 'HOD');
        })->get();

        // $this->hos = TeamMember::whereHave('role', function ($query) {
        //     $query->where('name', 'HOD');
        // })->get();

        $this->hos = TeamMember::whereDoesntHave('role', function ($query) {
            $query->whereIn('name', ['Principal', 'Deputy Principal', 'HOD', 'Trainer', 'Others']);
        })->get();

        $this->trainers = TeamMember::whereHas('role', function ($query) {
            $query->where('name', 'Trainer');
        })->get();

        $this->others = TeamMember::whereHas('role', function ($query) {
            $query->where('name', 'others');
        })->get();

    }
};
?>


<main>



<!-- ======================start team section ============== -->

<section class="py-16 bg-gray-100">
    <div class="container px-4 mx-auto">
        <h1 class="mb-12 text-4xl font-bold text-center text-gray-800">Our Team</h1>

        <!-- Principal -->
        @foreach ($principals as $principal)
            <div class="mb-16">
                <h2 class="mb-8 text-3xl font-semibold text-center text-gray-800">Principal</h2>
                <div class="flex justify-center">
                    <div class="w-64 text-center">
                        <img src="{{ asset('storage/'.$principal->photo) }}" alt="{{$principal->name}}" class="object-cover w-48 h-48 mx-auto mb-4 rounded-full">
                        <h3 class="text-xl font-semibold text-gray-800">{{ $principal->name }}</h3>
                        <p class="text-gray-600">{{ $principal->role->name }}</p>
                    </div>
                </div>
            </div>
        @endforeach


        <!-- Deputy Principals -->

        <div class="mb-16">
            <h2 class="mb-8 text-3xl font-semibold text-center text-gray-800">Deputy Principals</h2>
            <div class="flex flex-wrap justify-center gap-8">
                @foreach ($deputies as $deputy)
                <div data-aos="fade-up" class="w-64 text-center">
                    <img src="{{ asset('storage/'.$deputy->photo) }}" alt="{{$deputy->name}}" class="object-cover w-40 h-40 mx-auto mb-4 rounded-full">
                    <h3 class="text-lg font-semibold text-gray-800">{{$deputy->name}}</h3>
                    <p class="text-gray-600">{{ $deputy->role->name }}</p>
                </div>
                @endforeach
            </div>
        </div>


        <!-- Section Heads -->
        <div class="mb-16">
            <h2 class="mb-8 text-3xl font-semibold text-center text-gray-800">Section Heads</h2>
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                <!-- HODs -->
                @foreach ($hod as $hod)
                <div data-aos="fade-up" class="text-center">
                    <img src="{{ asset('storage/'.$hod->photo) }}" alt="{{ $hod->name }}" class="object-cover w-32 h-32 mx-auto mb-4 rounded-full">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $hod->name }}</h3>
                    <p class="text-gray-600">{{ $hod->role->name }}, {{ $hod->department->name }}</p>
                </div>
                @endforeach

                <!-- Other Section Heads -->
                @foreach ($hos as $hos)
                <div data-aos="fade-up" class="text-center">
                    <img src="{{ asset('storage/'.$hos->photo) }}" alt="{{ $hos->name }}" class="object-cover w-32 h-32 mx-auto mb-4 rounded-full">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $hos->name }}</h3>
                    <p class="text-gray-600">{{ $hos->role->name }}</p>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Other Trainers -->
        <div>
            <h2 class="mb-8 text-3xl font-semibold text-center text-gray-800">Our Trainers</h2>
            <div class="grid grid-cols-2 gap-6 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
                <!-- Repeat this block for each trainer -->
                @foreach ($trainers as $trainer)
                <div data-aos="fade-up" class="text-center">
                    <img src="{{ asset('storage/'.$trainer->photo) }}" alt="{{$trainer->name}}" class="object-cover w-24 h-24 mx-auto mb-2 rounded-full">
                    <h3 class="font-semibold text-gray-800 text-md">{{$trainer->name}}</h3>
                    <p class="text-sm text-gray-600">{{$trainer->department->name}}</p>
                </div>
                @endforeach
                <!-- Add more trainer blocks as needed -->
            </div>
        </div>
    </div>
</section>



<!-- =================end team ========================== -->


</main>
