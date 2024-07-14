<?php


use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    //
}; ?>

<main>


    <section class="w-full py-16 px-4 bg-gray-50">
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-8">
          <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Student Application Form</h2>
          <form action="/submit-application" method="POST" class="space-y-6">
            <!-- Personal Information -->
            <div class="grid md:grid-cols-2 gap-6">
              <div>
                <label for="firstName" class="block text-gray-700 font-medium mb-2">First Name</label>
                <input type="text" id="firstName" name="firstName" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
              </div>
              <div>
                <label for="lastName" class="block text-gray-700 font-medium mb-2">Last Name</label>
                <input type="text" id="lastName" name="lastName" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
              </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
              <div>
                <label for="email" class="block text-gray-700 font-medium mb-2">Email Address</label>
                <input type="email" id="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
              </div>
              <div>
                <label for="phone" class="block text-gray-700 font-medium mb-2">Phone Number</label>
                <input type="tel" id="phone" name="phone" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
              </div>
            </div>

            <div>
              <label for="dob" class="block text-gray-700 font-medium mb-2">Date of Birth</label>
              <input type="date" id="dob" name="dob" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
            </div>

            <!-- Academic Information -->
            <div>
              <label for="program" class="block text-gray-700 font-medium mb-2">Desired Program of Study</label>
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
              <label for="startTerm" class="block text-gray-700 font-medium mb-2">Intended Start Term</label>
              <select id="startTerm" name="startTerm" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
                <option value="">Select a term</option>
                <option value="fall_2024">Fall 2024</option>
                <option value="spring_2025">Spring 2025</option>
                <option value="fall_2025">Fall 2025</option>
              </select>
            </div>

            <div>
              <label for="highSchool" class="block text-gray-700 font-medium mb-2">High School Name</label>
              <input type="text" id="highSchool" name="highSchool" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
            </div>

            <div>
              <label for="gpa" class="block text-gray-700 font-medium mb-2">High School GPA</label>
              <input type="number" id="gpa" name="gpa" step="0.01" min="0" max="4" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
            </div>

            <!-- Additional Information -->
            <div>
              <label for="extracurricular" class="block text-gray-700 font-medium mb-2">Extracurricular Activities</label>
              <textarea id="extracurricular" name="extracurricular" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600"></textarea>
            </div>

            <div>
              <label for="essay" class="block text-gray-700 font-medium mb-2">Personal Statement</label>
              <textarea id="essay" name="essay" rows="5" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600"></textarea>
            </div>

            <!-- Submission -->
            <div class="flex items-center">
              <input type="checkbox" id="terms" name="terms" required class="mr-2">
              <label for="terms" class="text-gray-700">I agree to the terms and conditions</label>
            </div>

            <button type="submit" class="w-full bg-orange-600 text-white font-semibold py-3 px-6 rounded-md hover:bg-orange-700 transition duration-300">Submit Application</button>
          </form>
        </div>
      </section>

</main>
