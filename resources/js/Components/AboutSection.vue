<script setup>
import { computed } from 'vue';

const props = defineProps({
    about: {
        type: Object,
        default: () => null,
    },
});

const fallback = {
    badge_label: 'About Company',
    title_line1: 'Empowering Your Business for Success',
    title_line2: 'with Expert Guidance',
    intro_text:
        'Tanford brings together experienced logistics and trade professionals to help your business grow across Tanzania, the UAE and the wider GCC region.',
    bullet1: 'Write and translate logistics documents for all major trade corridors.',
    bullet2: 'Crafting high‑quality shipping and compliance content is easier with our team.',
    bullet3: 'Built for scale and enterprise‑level security across borders.',
    cta_label: 'Explore Service',
    cta_url: '/services',
    left_image_url: 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=600&h=900&fit=crop',
    right_image_url: 'https://images.unsplash.com/photo-1522202195461-5ffc8260b9a2?w=600&h=900&fit=crop',
    experience_label: 'We have',
    experience_text: '25+ Years of Experience',
};

const about = computed(() => ({
    ...fallback,
    ...(props.about || {}),
}));
</script>

<template>
    <section class="bg-white py-20">
        <div class="mx-auto flex max-w-6xl flex-col items-center gap-12 px-4 sm:px-6 lg:flex-row lg:px-8">
            <!-- Left content -->
            <div class="w-full lg:w-1/2 text-left">
                <button
                    type="button"
                    class="mb-5 inline-flex items-center rounded-full border border-emerald-100 bg-emerald-50 px-4 py-1 text-xs font-semibold uppercase tracking-wide text-emerald-700"
                >
                    {{ about.badge_label }}
                </button>

                <h2 class="mb-4 text-3xl font-extrabold leading-snug text-slate-900 sm:text-4xl lg:text-5xl">
                    {{ about.title_line1 }}
                    <br />
                    {{ about.title_line2 }}
                </h2>

                <p class="mb-6 max-w-xl text-sm sm:text-base text-slate-500">
                    {{ about.intro_text }}
                </p>

                <ul class="mb-8 space-y-3 text-sm sm:text-base text-slate-600">
                    <li class="flex items-start gap-2">
                        <span class="mt-0.5 text-emerald-600">
                            <span class="material-icons text-lg">check_circle</span>
                        </span>
                        <span>{{ about.bullet1 }}</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="mt-0.5 text-emerald-600">
                            <span class="material-icons text-lg">check_circle</span>
                        </span>
                        <span>{{ about.bullet2 }}</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="mt-0.5 text-emerald-600">
                            <span class="material-icons text-lg">check_circle</span>
                        </span>
                        <span>{{ about.bullet3 }}</span>
                    </li>
                </ul>

                <a
                    :href="about.cta_url || '/services'"
                    class="inline-flex items-center rounded-full bg-emerald-600 px-6 py-3 text-sm font-semibold text-white shadow hover:bg-emerald-700"
                >
                    {{ about.cta_label }}
                    <span class="material-icons ml-2 text-base">arrow_forward</span>
                </a>
            </div>

            <!-- Right images -->
            <div class="relative w-full lg:w-1/2 flex justify-center gap-4">
                <div class="h-80 w-40 overflow-hidden rounded-3xl bg-slate-200 shadow-lg sm:h-96 sm:w-48">
                    <img
                        :src="about.left_image_url"
                        alt="Tanford team meeting"
                        class="h-full w-full object-cover"
                    />
                </div>
                <div class="mt-10 h-80 w-40 overflow-hidden rounded-3xl bg-slate-200 shadow-lg sm:mt-16 sm:h-96 sm:w-48">
                    <img
                        :src="about.right_image_url"
                        alt="Tanford expert"
                        class="h-full w-full object-cover"
                    />
                </div>

                <!-- Experience badge -->
                <div
                    class="absolute bottom-6 left-1/2 w-56 -translate-x-1/2 rounded-3xl bg-rose-500 px-5 py-4 text-left text-white shadow-xl"
                >
                    <p class="mb-1 text-xs uppercase tracking-wide opacity-80">{{ about.experience_label }}</p>
                    <p class="text-2xl font-extrabold">{{ about.experience_text }}</p>
                </div>
            </div>
        </div>
    </section>
</template>
