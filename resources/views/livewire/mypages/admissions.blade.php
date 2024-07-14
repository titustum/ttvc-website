<?php


use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    //
}; ?>

<main>


    <section class="w-full px-4 py-16 bg-gray-50">
        <div class="max-w-4xl p-8 mx-auto bg-white rounded-lg shadow-lg">
          <h2 class="mb-8 text-3xl font-bold text-center text-gray-800">Student Application Form</h2>
          <form action="/submit-application" method="POST" class="space-y-6">
            <!-- Personal Information -->
            <div class="grid gap-6 md:grid-cols-2">
              <div>
                <label for="firstName" class="block mb-2 font-medium text-gray-700">First Name</label>
                <input type="text" id="firstName" name="firstName" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
              </div>
              <div>
                <label for="lastName" class="block mb-2 font-medium text-gray-700">Last Name</label>
                <input type="text" id="lastName" name="lastName" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
              </div>
            </div>

            <div class="grid gap-6 md:grid-cols-2">
              <div>
                <label for="email" class="block mb-2 font-medium text-gray-700">Email Address</label>
                <input type="email" id="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
              </div>
              <div>
                <label for="phone" class="block mb-2 font-medium text-gray-700">Phone Number</label>
                <input type="tel" id="phone" name="phone" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
              </div>
            </div>

            <div class="grid gap-6 md:grid-cols-2">
                <div>
                    <label for="program" class="block mb-2 font-medium text-gray-700">Gender</label>
                    <select id="program" name="program" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
                      <option value="">Select your gender</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                    </select>
                  </div>
              <div>
                <label for="idnumber" class="block mb-2 font-medium text-gray-700">ID No./Birth Cert.</label>
                <input type="number" id="idnumber" name="idnumber" min="1000" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
              </div>
            </div>

            <div>
              <label for="dob" class="block mb-2 font-medium text-gray-700">Date of Birth</label>
              <input type="date" id="dob" name="dob" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
            </div>

            <!-- Academic Information -->
            <div>
              <label for="program" class="block mb-2 font-medium text-gray-700">Desired Course of Study</label>
              <select id="program" name="program" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
                <option value="">Select a program</option>
                <option value="computer_science">Computer Science</option>
                <option value="business_administration">Business Administration</option>
                <option value="engineering">Engineering</option>
                <option value="nursing">Nursing</option>
                <option value="psychology">Psychology</option>
              </select>
            </div>

            <div>
              <label for="startTerm" class="block mb-2 font-medium text-gray-700">Intended Start Term</label>
              <select id="startTerm" name="startTerm" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
                <option value="">Select a term</option>
                <option value="sept_2024">September 2024</option>
                <option value="jan_2025">January 2025</option>
                <option value="may_2025">May 2025</option>
              </select>
            </div>

            <div>
              <label for="highSchool" class="block mb-2 font-medium text-gray-700">High School Name</label>
              <input type="text" id="highSchool" name="highSchool" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
            </div>

            <div>
              <label for="gpa" class="block mb-2 font-medium text-gray-700">High School Grade</label>
              <select id="startTerm" name="startTerm" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
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
              <label for="extracurricular" class="block mb-2 font-medium text-gray-700">Extracurricular Activities</label>
              <textarea id="extracurricular" name="extracurricular" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600"></textarea>
            </div>

            <div>
              <label for="essay" class="block mb-2 font-medium text-gray-700">Personal Statement</label>
              <textarea id="essay" name="essay" rows="5" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600"></textarea>
            </div>

            <!-- Submission -->
            <div class="flex items-center">
              <input type="checkbox" id="terms" name="terms" required class="mr-2">
              <label for="terms" class="text-gray-700">I agree to the terms and conditions</label>
            </div>

            <button type="submit" class="w-full px-6 py-3 font-semibold text-white transition duration-300 bg-orange-600 rounded-md hover:bg-orange-700">Submit Application</button>
          </form>
        </div>
      </section>

</main>
