<script setup>
import Header from '@/Components/Header.vue';
import Footer from '@/Components/Footer.vue';
import { ref } from 'vue';

const openIndex = ref(null);

const faqs = [
    {
        question: 'What is TANFORD?',
        answer: 'TANFORD stands for Tanzania Freight Forwarders Representation in Dubai and the GCC Region. It is a professional business coordination platform that brings together Tanzanian entrepreneurs, logistics companies, and freight professionals operating across the Gulf countries.'
    },
    {
        question: 'How can I become a member?',
        answer: 'To become a member, visit our membership page or contact us directly at info@tanford.net. Our team will guide you through the registration process and membership benefits.'
    },
    {
        question: 'What are the membership benefits?',
        answer: 'Members gain access to exclusive networking events, professional development programs, trade forums, digital platforms, and connections with key trade institutions in Tanzania and the GCC region.'
    },
    {
        question: 'How often are forums and events held?',
        answer: 'We organize regular forums and events throughout the year. Major events include our annual Tanzania Global Logistics Forum. Check our events page for the latest schedule.'
    },
    {
        question: 'Can I register for events online?',
        answer: 'Yes! You can register for most of our events through our digital registration platform. Visit the event page and click the registration button to get started.'
    },
    {
        question: 'What is the membership fee?',
        answer: 'Membership fees vary depending on the membership tier and your business type. Contact us at info@tanford.net for detailed pricing information.'
    },
    {
        question: 'How can I contact TANFORD?',
        answer: 'You can reach us via email at info@tanford.net, phone at +971 56 486 4558, or through our contact form on the website. We typically respond within 24 hours.'
    },
    {
        question: 'Is TANFORD only for freight forwarders?',
        answer: 'While TANFORD primarily serves freight forwarders and logistics professionals, we welcome other professionals in the trade and logistics sectors who are interested in networking and business growth.'
    }
];

const toggleFAQ = (index) => {
    openIndex.value = openIndex.value === index ? null : index;
};
</script>

<template>
    <div class="min-h-screen bg-white text-gray-900">
        <Header />
        <main>
            <!-- Hero section with breadcrumb overlay -->
            <section class="relative h-80 bg-cover bg-center flex flex-col items-center justify-center" style="background-image: url('/images/Xerin-Logistics--1229x1536.jpg');">
                <div class="absolute inset-0 bg-gradient-to-b from-emerald-600/60 via-emerald-700/50 to-emerald-900/70 backdrop-blur-sm"></div>
                <div class="relative z-10 text-center text-white px-4 mb-8">
                    <h1 class="text-5xl sm:text-6xl font-extrabold tracking-tight">FAQ</h1>
                </div>
                
                <!-- Breadcrumb inside hero -->
                <nav class="relative z-10 bg-white/20 backdrop-blur-sm px-6 py-3 rounded-lg">
                    <div class="flex items-center gap-2 text-sm text-white">
                        <a href="/" class="hover:text-emerald-200 transition">Home</a>
                        <span class="text-white/60">›</span>
                        <span class="text-white/90 font-medium">FAQ</span>
                    </div>
                </nav>
            </section>

            <!-- FAQ section -->
            <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
                <div class="mx-auto max-w-4xl">
                    <div class="mb-16 text-center">
                        <h2 class="text-3xl font-bold mb-4 text-gray-900">Frequently Asked Questions</h2>
                        <p class="text-gray-600 max-w-2xl mx-auto">
                            Find answers to common questions about TANFORD, membership, events, and more.
                        </p>
                    </div>

                    <!-- FAQ Accordion -->
                    <div class="space-y-4">
                        <div
                            v-for="(faq, index) in faqs"
                            :key="index"
                            class="border border-gray-200 rounded-lg overflow-hidden"
                        >
                            <button
                                @click="toggleFAQ(index)"
                                class="w-full px-6 py-4 flex items-center justify-between bg-gray-50 hover:bg-gray-100 transition-colors"
                            >
                                <h3 class="text-lg font-semibold text-gray-900 text-left">{{ faq.question }}</h3>
                                <span
                                    class="flex-shrink-0 ml-4 text-emerald-600 transition-transform"
                                    :class="openIndex === index ? 'rotate-180' : ''"
                                >
                                    <span class="material-icons">expand_more</span>
                                </span>
                            </button>
                            
                            <!-- Answer -->
                            <div
                                v-if="openIndex === index"
                                class="px-6 py-4 bg-white border-t border-gray-200"
                            >
                                <p class="text-gray-600 leading-relaxed">{{ faq.answer }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Mobile App section -->
            <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-r from-emerald-50 to-sky-50">
                <div class="mx-auto max-w-6xl">
                    <div class="grid md:grid-cols-2 gap-12 items-center">
                        <!-- Left: App info -->
                        <div>
                            <h2 class="text-4xl font-bold mb-6 text-gray-900">TANFORD Mobile App</h2>
                            <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                                Stay connected with TANFORD on the go. Our mobile app brings the power of networking, event registration, and professional development to your fingertips.
                            </p>
                            
                            <div class="space-y-4 mb-8">
                                <div class="flex items-start gap-4">
                                    <span class="material-icons text-emerald-600 text-2xl flex-shrink-0">check_circle</span>
                                    <div>
                                        <h4 class="font-semibold text-gray-900">Easy Event Registration</h4>
                                        <p class="text-gray-600 text-sm">Register for forums and events in seconds</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <span class="material-icons text-emerald-600 text-2xl flex-shrink-0">check_circle</span>
                                    <div>
                                        <h4 class="font-semibold text-gray-900">Networking Directory</h4>
                                        <p class="text-gray-600 text-sm">Connect with other logistics professionals</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <span class="material-icons text-emerald-600 text-2xl flex-shrink-0">check_circle</span>
                                    <div>
                                        <h4 class="font-semibold text-gray-900">Push Notifications</h4>
                                        <p class="text-gray-600 text-sm">Stay updated with latest news and events</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <span class="material-icons text-emerald-600 text-2xl flex-shrink-0">check_circle</span>
                                    <div>
                                        <h4 class="font-semibold text-gray-900">Exclusive Content</h4>
                                        <p class="text-gray-600 text-sm">Access member-only resources and materials</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white rounded-lg p-6 border-2 border-emerald-200">
                                <p class="text-sm text-gray-600 mb-4">
                                    <span class="material-icons text-lg align-middle mr-2">info</span>
                                    Coming soon for iOS and Android
                                </p>
                                <p class="text-xs text-gray-500">
                                    Be the first to know when our app launches. Sign up for notifications below.
                                </p>
                            </div>
                        </div>

                        <!-- Right: App mockup / Coming soon -->
                        <div class="flex flex-col items-center justify-center">
                            <div class="w-full max-w-xs">
                                <!-- App preview box -->
                                <div class="bg-gradient-to-b from-emerald-600 to-emerald-700 rounded-3xl p-8 shadow-2xl text-center text-white">
                                    <div class="mb-8">
                                        <span class="material-icons text-6xl">phone_iphone</span>
                                    </div>
                                    <h3 class="text-2xl font-bold mb-4">Download Our App</h3>
                                    <p class="text-emerald-100 mb-8">
                                        Available on iOS and Android
                                    </p>
                                    
                                    <div class="space-y-3">
                                        <!-- App Store -->
                                        <a
                                            href="#"
                                            class="flex items-center justify-center gap-3 bg-white text-emerald-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition"
                                        >
                                            <span class="material-icons">apple</span>
                                            App Store
                                        </a>
                                        
                                        <!-- Google Play -->
                                        <a
                                            href="#"
                                            class="flex items-center justify-center gap-3 bg-white text-emerald-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition"
                                        >
                                            <span class="material-icons">android</span>
                                            Google Play
                                        </a>
                                    </div>

                                    <div class="mt-8 pt-8 border-t border-emerald-500">
                                        <p class="text-xs text-emerald-100">
                                            Coming Soon
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Newsletter signup -->
            <section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
                <div class="mx-auto max-w-2xl text-center">
                    <h3 class="text-2xl font-bold mb-4 text-gray-900">Get App Launch Notifications</h3>
                    <p class="text-gray-600 mb-6">
                        Be the first to know when the TANFORD mobile app launches for iOS and Android.
                    </p>
                    <form class="flex flex-col sm:flex-row gap-3">
                        <input
                            type="email"
                            placeholder="Enter your email"
                            class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                        />
                        <button
                            type="submit"
                            class="bg-emerald-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-emerald-700 transition"
                        >
                            Notify Me
                        </button>
                    </form>
                </div>
            </section>
        </main>
        <Footer />
    </div>
</template>
