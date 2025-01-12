<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;
use App\Models\Course;
use App\Models\Application;
use Carbon\Carbon;

new
#[Title('Admissions')]
#[Layout('layouts.guest')]
class extends Component
{
    public $courses;
    public $firstName;
    public $lastName;
    public $email;
    public $phone;
    public $gender;
    public $idNumber;
    public $dob;
    public $courseId;
    public $startTerm;
    public $highSchool;
    public $highSchoolGrade;
    public $parent_name;
    public $parent_phone;
    public $terms = false;
    public $startTermOptions = [];


    public function mount()
    {
        $this->courses = Course::all();
        $this->startTermOptions = $this->getStartTermOptions();
    }

    public function getStartTermOptions(): array
    {
        $currentDate = Carbon::now();
        $options = [];

        // for ($i = 0; $i < 1; $i++) {
            $year = $currentDate->year;

            // September term
            $septDate = Carbon::create($year, 9, 1);
            if ($currentDate->lte($septDate)) {
                $options["sept_$year"] = "September $year";
            }

            // January term (next year)
            $janDate = Carbon::create($year + 1, 1, 1);
            if ($currentDate->lte($janDate)) {
                $options["jan_" . ($year + 1)] = "January " . ($year + 1);
            }

            // May term (next year)
            $mayDate = Carbon::create($year + 1, 5, 1);
            if ($currentDate->lte($mayDate)) {
                $options["may_" . ($year + 1)] = "May " . ($year + 1);
            }

            $currentDate->addYear();
        // }

        return $options;
    }


   public function submitApplication()
    {
        $this->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'gender' => 'required|in:male,female',
            'idNumber' => 'required|string|max:255', // Change to string
            'dob' => 'required|date',
            'courseId' => 'required|exists:courses,id',
            'startTerm' => 'required|in:sept_2024,jan_2025,may_2025',
            'highSchool' => 'required|string|max:255',
            'highSchoolGrade' => 'required|in:c++,c,c-,d+,d,d-,e,kcpe,none',
            'parent_name' => 'nullable|string|max:255',
            'parent_phone' => 'required|string|max:20',
            'terms' => 'accepted',
        ]);
    
        Application::create([
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'phone' => $this->phone,
            'gender' => $this->gender,
            'id_number' => $this->idNumber,
            'date_of_birth' => $this->dob,
            'course_id' => $this->courseId,
            'start_term' => $this->startTerm,
            'high_school' => $this->highSchool,
            'high_school_grade' => $this->highSchoolGrade,
            'parent_name' => $this->parent_name,
            'parent_phone' => $this->parent_phone,
        ]);
    
        session()->flash('message', 'Application submitted successfully!');
        $this->reset();
    }

}

?>

<main>
    <section class="w-full px-4 py-16 bg-gray-50">
        <div class="max-w-4xl p-8 mx-auto bg-white rounded-lg shadow-lg">
            <h2 class="mb-8 text-2xl font-bold text-center text-gray-800 lg:text-3xl">Student Application Form</h2>

            @if (session()->has('message'))
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
                    {{ session('message') }}
                </div>
            @endif

            <form wire:submit.prevent="submitApplication" class="space-y-6" data-aos="fade-up">
                <!-- Personal Information -->
                <div class="grid gap-6 md:grid-cols-2">
                    <div>
                        <label for="firstName" class="block mb-2 font-medium text-gray-700">First Name</label>
                        <input type="text" id="firstName" wire:model="firstName" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
                    </div>
                    <div>
                        <label for="lastName" class="block mb-2 font-medium text-gray-700">Last Name</label>
                        <input type="text" id="lastName" wire:model="lastName" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
                    </div>
                </div>

                <div class="grid gap-6 md:grid-cols-2">
                    <div>
                        <label for="email" class="block mb-2 font-medium text-gray-700">Email Address</label>
                        <input type="email" id="email" wire:model="email" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
                    </div>
                    <div>
                        <label for="phone" class="block mb-2 font-medium text-gray-700">Phone Number</label>
                        <input type="tel" id="phone" wire:model="phone" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
                    </div>
                </div>

                <div class="grid gap-6 md:grid-cols-2">
                    <div>
                        <label for="gender" class="block mb-2 font-medium text-gray-700">Gender</label>
                        <select id="gender" wire:model="gender" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
                            <option value="">Select your gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div>
                        <label for="idNumber" class="block mb-2 font-medium text-gray-700">ID No./Birth Cert.</label>
                        <input type="text" id="idNumber" wire:model="idNumber" min="1000" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
                    </div>
                </div>

                <div>
                    <label for="dob" class="block mb-2 font-medium text-gray-700">Date of Birth</label>
                    <input type="date" id="dob" wire:model="dob" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
                </div>

                <!-- Academic Information -->
                <div>
                    <label for="courseId" class="block mb-2 font-medium text-gray-700">Desired Course of Study</label>
                    <select id="courseId" wire:model="courseId" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
                        <option value="">Select a course</option>
                        @foreach ($courses ?? [] as $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="startTerm" class="block mb-2 font-medium text-gray-700">Intended Start Term</label>

                    <select id="startTerm" wire:model="startTerm" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
                        <option value="">Select a term</option>
                        @foreach($startTermOptions ?? [] as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </select>


                    {{-- <select id="startTerm" wire:model="startTerm" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
                        <option value="">Select a term</option>
                        <option value="sept_2024">September 2024</option>
                        <option value="jan_2025">January 2025</option>
                        <option value="may_2025">May 2025</option>
                    </select> --}}
                </div>

                <div>
                    <label for="highSchool" class="block mb-2 font-medium text-gray-700">High School Name</label>
                    <input type="text" id="highSchool" wire:model="highSchool" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
                </div>

                <div>
                    <label for="highSchoolGrade" class="block mb-2 font-medium text-gray-700">High School Grade</label>
                    <select id="highSchoolGrade" wire:model="highSchoolGrade" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
                        <option value="">Select a grade</option>
                        <option value="c++">C+ & Above</option>
                        <option value="c">C (Plain)</option>
                        <option value="c-">C- (Minus)</option>
                        <option value="d+">D+ (Plus)</option>
                        <option value="d">D (Plain)</option>
                        <option value="d-">D- (Minus)</option>
                        <option value="e">E</option>
                        <option value="kcpe">I have KCPE only</option>
                        <option value="none">Not attended highschool</option>
                    </select>
                </div>

                <!-- Additional Information -->

                <div>
                    <label for="parent_name" class="block mb-2 font-medium text-gray-700">Parent/Guardian Name</label>
                    <input type="text" id="parent_name" wire:model="parent_name" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
                </div>
                <div>
                    <label for="parent_phone" class="block mb-2 font-medium text-gray-700">Parent/Guardian Phone Number</label>
                    <input type="tel" id="parent_phone" wire:model="parent_phone" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
                </div>

                <!-- Submission -->
                <div class="flex items-center">
                    <input type="checkbox" id="terms" wire:model="terms" required class="mr-2">
                    <label for="terms" class="text-gray-700">I agree to the terms and conditions</label>
                </div>

                <button type="submit" class="w-full px-6 py-3 font-semibold text-white transition duration-300 bg-orange-600 rounded-md hover:bg-orange-700">Submit Application</button>
            </form>
        </div>
    </section>
</main>
