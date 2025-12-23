<template>
    <section
        id="home"
        class="relative overflow-hidden bg-gray-900 text-white"
    >
        <!-- Background images with blur and overlay -->
        <div class="absolute inset-0 flex overflow-hidden">
            <div class="w-1/2 h-full bg-cover bg-center" style="background-image: url('/images/Tanford-PX1.jpeg'); filter: blur(3px);"></div>
            <div class="w-1/2 h-full bg-cover bg-center" style="background-image: url('/images/DXB_3883-1536x1024.jpg'); filter: blur(3px);"></div>
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-emerald-900/70 via-emerald-800/60 to-emerald-900/70"></div>

        <div class="relative py-16 px-4 mx-auto max-w-screen-xl text-center lg:py-20 lg:px-12">
            <!-- Badge (notification) -->
            <a
                :href="currentNotification ? currentNotification.url : '#'"
                class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-gray-700 bg-gray-100 rounded-full dark:bg-gray-800 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700"
                :target="currentNotification ? '_blank' : undefined"
                rel="noopener"
            >
                <span class="text-xs bg-emerald-600 rounded-full text-white px-4 py-1.5 mr-3">New</span>
                <span class="text-sm font-medium truncate max-w-xs">
                    <span v-if="currentNotification">{{ currentNotification.title }}</span>
                    <span v-else>{{ slides[currentSlide].badge }}</span>
                </span>
                <span class="ml-2 material-icons w-5 h-5 text-gray-500 dark:text-gray-400 text-base">chevron_right</span>
            </a>

            <!-- Heading -->
            <h1
                class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl"
            >
                {{ slides[currentSlide].title }}
            </h1>

            <!-- Description -->
            <p
                class="mb-8 text-lg font-normal text-gray-100/80 lg:text-xl sm:px-16 xl:px-48"
            >
                {{ slides[currentSlide].description }}
            </p>

            <!-- Buttons row -->
            <div
                class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4"
            >
                <a
                    href="/forumregster"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-emerald-600 hover:bg-emerald-700 focus:ring-4 focus:ring-emerald-300 dark:focus:ring-emerald-900"
                >
                    TANZANIA TRADE AND LOGISTICS FORUM 2026
                </a>
                <a
                    href="/uaeresidents"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800"
                >
                    DIASPORA - CLICK HERE TO REGISTER
                </a>
            </div>

            <!-- Slide indicators only (under content) -->
            <div class="flex items-center justify-center gap-4 mt-4">
                <div class="flex gap-2">
                    <button
                        v-for="(slide, index) in slides"
                        :key="index"
                        @click="currentSlide = index"
                        :class="currentSlide === index ? 'bg-gray-900 dark:bg-white' : 'bg-gray-300 dark:bg-gray-600'"
                        class="w-3 h-3 rounded-full transition"
                    ></button>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, computed, onMounted, onBeforeUnmount } from 'vue';

const props = defineProps({
    notifications: {
        type: Array,
        default: () => [],
    },
    slides: {
        type: Array,
        default: () => [],
    },
});

const currentSlide = ref(0);
const currentNotificationIndex = ref(0);
let autoTimer = null;

const fallbackSlides = [
    {
        title: 'ONE NETWORK. ONE VISION. ONE TANFORD',
        badge: 'Tanzania Freight Forwarders Association (Dubai & Tanzania)',
        description:
            'Connecting freight forwarders and logistics professionals to build a stronger trade bridge between Tanzania and the UAE/GCC region.'
    },
    {
        title: 'Empower Your Global Trade Network',
        badge: 'Connecting Global Trade to Africa\'s Heart',
        description:
            'Join a powerful network that simplifies logistics, reduces risk, and unlocks new opportunities across borders.'
    }
];

const slides = computed(() => {
    return props.slides && props.slides.length
        ? props.slides
        : fallbackSlides;
});

const nextSlide = () => {
    const total = slides.value.length;
    if (!total) return;
    currentSlide.value = (currentSlide.value + 1) % total;
    if (props.notifications && props.notifications.length) {
        currentNotificationIndex.value = (currentNotificationIndex.value + 1) % props.notifications.length;
    }
};

const prevSlide = () => {
    const total = slides.value.length;
    if (!total) return;
    currentSlide.value = (currentSlide.value - 1 + total) % total;
};

const currentNotification = computed(() => {
    if (!props.notifications || !props.notifications.length) {
        return null;
    }
    return props.notifications[currentNotificationIndex.value] ?? props.notifications[0];
});

onMounted(() => {
    autoTimer = window.setInterval(() => {
        nextSlide();
    }, 6000);
});

onBeforeUnmount(() => {
    if (autoTimer) {
        window.clearInterval(autoTimer);
    }
});
</script>
