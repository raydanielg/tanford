<script setup>
import { Head } from '@inertiajs/vue3';
import Header from '@/Components/Header.vue';
import Hero from '@/Components/Hero.vue';
import Features from '@/Components/Features.vue';
import AboutSection from '@/Components/AboutSection.vue';
import WhatWeProvide from '@/Components/WhatWeProvide.vue';
import SuccessStories from '@/Components/SuccessStories.vue';
import OurTeam from '@/Components/OurTeam.vue';
import Testimonials from '@/Components/Testimonials.vue';
import Members from '@/Components/Members.vue';
import Footer from '@/Components/Footer.vue';

const props = defineProps({
    posts: {
        type: Array,
        default: () => [],
    },
    testimonials: {
        type: Array,
        default: () => [],
    },
    teamMembers: {
        type: Array,
        default: () => [],
    },
    members: {
        type: Array,
        default: () => [],
    },
    focusAreas: {
        type: Array,
        default: () => [],
    },
    about: {
        type: Object,
        default: () => null,
    },
    notifications: {
        type: Array,
        default: () => [],
    },
    footer: {
        type: Object,
        default: () => null,
    },
});
</script>

<template>
    <Head title="Tanford" />

    <div class="min-h-screen bg-gray-50 text-gray-900">
        <Header />
        <main>
            <Hero :notifications="props.notifications" />
            <Features :focus-areas="props.focusAreas" />
            <AboutSection :about="props.about" />
            <WhatWeProvide />
            <SuccessStories :stories="props.posts" />
            <OurTeam :team-members="props.teamMembers" />
            <Testimonials :testimonials="props.testimonials" />
            <Members :members="props.members" />
            <!-- From our Blog -->
            <section v-if="props.posts.length" class="bg-white py-16 px-4 sm:px-6 lg:px-8">
                <div class="max-w-6xl mx-auto">
                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900">From our Blog</h2>
                            <p class="text-sm text-gray-500">Latest insights from Tanzania's trade & logistics community.</p>
                        </div>
                        <a href="/blog" class="text-sm font-semibold text-emerald-600 hover:text-emerald-700">View all posts →</a>
                    </div>

                    <div class="grid gap-6 md:grid-cols-3">
                        <article
                            v-for="post in props.posts"
                            :key="post.id"
                            class="bg-gray-50 rounded-2xl border border-gray-100 overflow-hidden hover:shadow-md transition"
                        >
                            <div class="h-40 overflow-hidden" v-if="post.image_url">
                                <img :src="post.image_url" :alt="post.title" class="w-full h-full object-cover hover:scale-105 transition-transform" />
                            </div>
                            <div class="p-4 flex flex-col gap-2">
                                <span class="inline-flex items-center gap-1 text-[11px] font-semibold text-emerald-700 uppercase tracking-wide">
                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                    <span>{{ post.category || 'News' }}</span>
                                </span>
                                <a :href="route('blog.show', post.slug)" class="text-sm font-semibold text-gray-900 line-clamp-2 hover:text-emerald-600">
                                    {{ post.title }}
                                </a>
                                <p class="text-[11px] text-gray-500 line-clamp-3">{{ post.excerpt }}</p>
                                <p class="text-[11px] text-gray-400 mt-1">
                                    {{ post.published_at ? new Date(post.published_at).toLocaleDateString() : '' }}
                                </p>
                            </div>
                        </article>
                    </div>
                </div>
            </section>
            <Footer :footer="props.footer" />
            <!-- sections zingine (focus areas, leadership, members, blogs, footer) tutaongeza baadaye -->
        </main>
    </div>
</template>
