<?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    //
}; ?>

<main>
<!-- =============start contact================ -->
<section class="w-full px-4 py-16 bg-gradient-to-tr from-gray-50 via-cyan-50 to-orange-50">
    <div class="mx-auto max-w-7xl">
      <h2 class="mb-12 text-4xl font-bold text-center text-gray-800">Get in Touch</h2>
      <div class="grid gap-10 md:grid-cols-2">
        <!-- Contact Form -->
        <div class="p-8 bg-white rounded-lg shadow-lg">
          <h3 class="mb-6 text-2xl font-semibold text-gray-800">Send us a message</h3>
          <form action="/submit-form" method="POST">
            <div class="mb-6">
              <label for="name" class="block mb-2 font-medium text-gray-700">Name</label>
              <input type="text" id="name" name="name" required class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
            </div>
            <div class="mb-6">
              <label for="email" class="block mb-2 font-medium text-gray-700">Email</label>
              <input type="email" id="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
            </div>
            <div class="mb-6">
              <label for="subject" class="block mb-2 font-medium text-gray-700">Subject</label>
              <input type="text" id="subject" name="subject" required class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600">
            </div>
            <div class="mb-6">
              <label for="message" class="block mb-2 font-medium text-gray-700">Message</label>
              <textarea id="message" name="message" rows="4" required class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600"></textarea>
            </div>
            <button type="submit" class="w-full px-6 py-3 font-semibold text-white transition duration-300 transform bg-orange-600 rounded-md hover:bg-orange-700 hover:scale-105">Send Message</button>
          </form>
        </div>

        <!-- Contact Information and Map -->
        <div class="space-y-8">
          <div class="p-8 bg-white rounded-lg shadow-lg">
            <h3 class="mb-6 text-2xl font-semibold text-gray-800">Contact Information</h3>
            <ul class="space-y-4">
              <li class="flex items-start">
                <svg class="w-6 h-6 mt-1 mr-3 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                <span class="text-gray-700">P.O. Box 1716 - 10100, Nyeri, Kenya</span>
              </li>
              <li class="flex items-center">
                <svg class="w-6 h-6 mr-3 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                <span class="text-gray-700">+254 758 660 300</span>
              </li>
              <li class="flex items-center">
                <svg class="w-6 h-6 mr-3 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                <span class="text-gray-700">info@tetutvc.ac.ke</span>
              </li>
            </ul>
          </div>
          <div class="p-8 bg-white rounded-lg shadow-lg">
            <h3 class="mb-6 text-2xl font-semibold text-gray-800">Our Location</h3>
            <div class="overflow-hidden rounded-lg aspect-w-16 aspect-h-9">
              <!-- Replace the src with your actual Google Maps embed URL -->
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15958.741889650126!2d36.9229375!3d-0.4675625!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x18285f979e39f6f7%3A0xb54ff3cfd4995fba!2sTetu%20Technical%20and%20Professional%20College!5e0!3m2!1sen!2ske!4v1720950525693!5m2!1sen!2ske" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- =============end contact================ -->

</main>
