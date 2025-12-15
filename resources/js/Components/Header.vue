<script setup>
import { ref } from 'vue';

const isDarkMode = ref(true);
const isMoreDropdownOpen = ref(false);

const toggleDarkMode = () => {
    isDarkMode.value = !isDarkMode.value;
    if (isDarkMode.value) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
};

const toggleMoreDropdown = () => {
    isMoreDropdownOpen.value = !isMoreDropdownOpen.value;
};
</script>

<template>
    <header class="w-full" :class="isDarkMode ? 'dark' : ''">
        <!-- Top bar (emerald) -->
        <div class="bg-emerald-600 text-white text-xs border-b border-emerald-700">
            <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-2 sm:px-6 lg:px-8">
                <!-- Left: Email + Call -->
                <div class="flex items-center gap-6">
                    <div class="flex items-center gap-1">
                        <span class="material-icons text-sm">mail</span>
                        <span>Email: <a href="mailto:info@tanford.net" class="hover:text-emerald-400">info@tanford.net</a></span>
                    </div>
                    <div class="flex items-center gap-1">
                        <span class="material-icons text-sm">call</span>
                        <span>Call: <a href="tel:+971564864558" class="hover:text-emerald-400">+971 56 486 4558</a></span>
                    </div>
                </div>

                <!-- Right: Dark Mode + Language + Sign In -->
                <div class="flex items-center gap-4">
                    <button @click="toggleDarkMode" class="hover:opacity-80 transition text-white">
                        <span class="material-icons text-sm">{{ isDarkMode ? 'light_mode' : 'dark_mode' }}</span>
                    </button>
                    <select class="bg-emerald-700 text-white text-xs border-0 focus:ring-0 cursor-pointer">
                        <option>English</option>
                        <option>Swahili</option>
                    </select>
                    <a href="/login" class="text-white hover:text-sky-300">Sign In</a>
                </div>
            </div>
        </div>

        <!-- Main nav bar (white) -->
        <nav class="bg-white text-gray-900">
            <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-3 sm:px-6 lg:px-8">
                <!-- Left: Logo with white background -->
                <div class="flex items-center gap-3 bg-white px-4 py-2 rounded">
                    <img
                        src="/tanford.logo.png"
                        alt="TANFORD Logo"
                        class="h-10 w-auto"
                    />
                </div>

                <!-- Center: Links -->
                <div class="flex flex-1 items-center justify-center gap-8 px-6 text-sm font-medium">
                    <a href="/" class="hover:text-emerald-600 transition">Home</a>
                    <a href="/blog" class="hover:text-emerald-600 transition">Blog</a>
                    <a href="/about" class="hover:text-emerald-600 transition">About</a>
                    <a href="/contact" class="hover:text-emerald-600 transition">Contact</a>
                    <a href="#faq" class="hover:text-emerald-600 transition">FAQ</a>
                    
                    <!-- More dropdown -->
                    <div class="relative">
                        <button
                            @click="toggleMoreDropdown"
                            class="flex items-center gap-1 hover:text-emerald-600 transition"
                        >
                            More
                            <span class="material-icons text-sm" :class="isMoreDropdownOpen ? 'rotate-180' : ''">expand_more</span>
                        </button>
                        
                        <!-- Dropdown menu - 3 columns -->
                        <div
                            v-if="isMoreDropdownOpen"
                            class="absolute top-full left-1/2 -translate-x-1/2 mt-2 w-[600px] bg-white border border-gray-200 rounded-lg shadow-xl z-50 p-8"
                        >
                            <!-- Column 1: Services -->
                            <div class="grid grid-cols-3 gap-8">
                                <div>
                                    <h3 class="text-xs font-semibold uppercase tracking-wide text-gray-600 mb-4">Services</h3>
                                    <ul class="space-y-4">
                                        <li>
                                            <a href="/services" class="flex items-start gap-3 group">
                                                <span class="material-icons text-emerald-600 text-lg flex-shrink-0 group-hover:text-emerald-700">local_shipping</span>
                                                <div>
                                                    <p class="font-semibold text-gray-900 group-hover:text-emerald-600">Logistics Forums</p>
                                                    <p class="text-xs text-gray-500">Connect & network</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/events" class="flex items-start gap-3 group">
                                                <span class="material-icons text-emerald-600 text-lg flex-shrink-0 group-hover:text-emerald-700">event</span>
                                                <div>
                                                    <p class="font-semibold text-gray-900 group-hover:text-emerald-600">Trade Events</p>
                                                    <p class="text-xs text-gray-500">Join our events</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/resources" class="flex items-start gap-3 group">
                                                <span class="material-icons text-emerald-600 text-lg flex-shrink-0 group-hover:text-emerald-700">school</span>
                                                <div>
                                                    <p class="font-semibold text-gray-900 group-hover:text-emerald-600">Training Programs</p>
                                                    <p class="text-xs text-gray-500">Upskill yourself</p>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Column 2: Opportunities -->
                                <div>
                                    <h3 class="text-xs font-semibold uppercase tracking-wide text-gray-600 mb-4">Opportunities</h3>
                                    <ul class="space-y-4">
                                        <li>
                                            <a href="/about" class="flex items-start gap-3 group">
                                                <span class="material-icons text-emerald-600 text-lg flex-shrink-0 group-hover:text-emerald-700">card_membership</span>
                                                <div>
                                                    <p class="font-semibold text-gray-900 group-hover:text-emerald-600">Membership</p>
                                                    <p class="text-xs text-gray-500">Join our network</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/partners" class="flex items-start gap-3 group">
                                                <span class="material-icons text-emerald-600 text-lg flex-shrink-0 group-hover:text-emerald-700">handshake</span>
                                                <div>
                                                    <p class="font-semibold text-gray-900 group-hover:text-emerald-600">Partnerships</p>
                                                    <p class="text-xs text-gray-500">Grow together</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/resources" class="flex items-start gap-3 group">
                                                <span class="material-icons text-emerald-600 text-lg flex-shrink-0 group-hover:text-emerald-700">library_books</span>
                                                <div>
                                                    <p class="font-semibold text-gray-900 group-hover:text-emerald-600">Resources</p>
                                                    <p class="text-xs text-gray-500">Learn & explore</p>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Column 3: Company -->
                                <div>
                                    <h3 class="text-xs font-semibold uppercase tracking-wide text-gray-600 mb-4">Company</h3>
                                    <ul class="space-y-4">
                                        <li>
                                            <a href="/about" class="flex items-start gap-3 group">
                                                <span class="material-icons text-emerald-600 text-lg flex-shrink-0 group-hover:text-emerald-700">info</span>
                                                <div>
                                                    <p class="font-semibold text-gray-900 group-hover:text-emerald-600">About Us</p>
                                                    <p class="text-xs text-gray-500">Our mission</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/" class="flex items-start gap-3 group">
                                                <span class="material-icons text-emerald-600 text-lg flex-shrink-0 group-hover:text-emerald-700">people</span>
                                                <div>
                                                    <p class="font-semibold text-gray-900 group-hover:text-emerald-600">Our Team</p>
                                                    <p class="text-xs text-gray-500">Meet the crew</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/contact" class="flex items-start gap-3 group">
                                                <span class="material-icons text-emerald-600 text-lg flex-shrink-0 group-hover:text-emerald-700">support_agent</span>
                                                <div>
                                                    <p class="font-semibold text-gray-900 group-hover:text-emerald-600">Support</p>
                                                    <p class="text-xs text-gray-500">Get help</p>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Action buttons at bottom -->
                            <div class="mt-6 border-t border-gray-200 pt-6 flex gap-3">
                                <a
                                    href="#register-forum"
                                    class="flex-1 inline-flex items-center justify-center rounded-md bg-rose-600 px-4 py-2 text-xs font-semibold uppercase text-white hover:bg-rose-500 transition"
                                >
                                    Register for Forum
                                </a>
                                <a
                                    href="#register-member"
                                    class="flex-1 inline-flex items-center justify-center rounded-md bg-emerald-600 px-4 py-2 text-xs font-semibold uppercase text-white hover:bg-emerald-700 transition"
                                >
                                    Become a Member
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Search + Sign In -->
                <div class="flex items-center gap-4">
                    <!-- Search -->
                    <div class="hidden md:flex items-center bg-gray-100 rounded px-3 py-1">
                        <input
                            type="text"
                            placeholder="Search..."
                            class="bg-transparent text-gray-900 text-xs placeholder-gray-500 border-0 focus:ring-0 w-32"
                        />
                        <span class="material-icons text-sm text-gray-500">search</span>
                    </div>

                    <!-- Get Started button -->
                    <a
                        href="/how-it-works"
                        class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded text-xs font-semibold flex items-center gap-1 transition"
                    >
                        Get Started
                    </a>
                </div>
            </div>
        </nav>
    </header>
</template>
