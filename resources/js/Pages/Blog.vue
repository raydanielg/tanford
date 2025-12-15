<script setup>
import Header from '@/Components/Header.vue';
import Footer from '@/Components/Footer.vue';
import { ref } from 'vue';

const props = defineProps({
    posts: {
        type: Array,
        default: () => [],
    },
    recentPosts: {
        type: Array,
        default: () => [],
    },
    galleryImages: {
        type: Array,
        default: () => [],
    },
});

const searchQuery = ref('');
</script>

<template>
    <div class="min-h-screen bg-white text-gray-900">
        <Header />
        <main>
            <!-- Hero section with breadcrumb -->
            <section class="relative h-80 bg-cover bg-center flex flex-col items-center justify-center" style="background-image: url('/images/Xerin-Logistics--1229x1536.jpg');">
                <div class="absolute inset-0 bg-gradient-to-b from-emerald-600/60 via-emerald-700/50 to-emerald-900/70 backdrop-blur-sm"></div>
                <div class="relative z-10 text-center text-white px-4 mb-8">
                    <h1 class="text-5xl sm:text-6xl font-extrabold tracking-tight">Blog</h1>
                </div>
                <nav class="relative z-10 bg-white/20 backdrop-blur-sm px-6 py-3 rounded-lg">
                    <div class="flex items-center gap-2 text-sm text-white">
                        <a href="/" class="hover:text-emerald-200 transition">Home</a>
                        <span class="text-white/60">›</span>
                        <span class="text-white/90 font-medium">Blog</span>
                    </div>
                </nav>
            </section>

            <!-- Blog content -->
            <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
                <div class="mx-auto max-w-6xl">
                    <div class="grid md:grid-cols-3 gap-12">
                        <!-- Main content -->
                        <div class="md:col-span-2">
                            <!-- Featured posts grid -->
                            <div class="mb-16">
                                <h2 class="text-2xl font-bold mb-8 text-gray-900">Latest Posts</h2>
                                <div class="grid gap-8">
                                    <div
                                        v-for="post in props.posts"
                                        :key="post.id"
                                        class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition"
                                    >
                                        <div class="grid md:grid-cols-3 gap-6">
                                            <div class="md:col-span-1 h-48 md:h-auto overflow-hidden">
                                                <img
                                                    :src="post.image_url"
                                                    :alt="post.title"
                                                    class="w-full h-full object-cover hover:scale-105 transition-transform"
                                                />
                                            </div>
                                            <div class="md:col-span-2 p-6 flex flex-col justify-between">
                                                <div>
                                                    <div class="flex items-center gap-2 mb-3">
                                                        <span class="bg-rose-600 text-white text-xs font-semibold px-3 py-1 rounded">{{ post.category || 'News' }}</span>
                                                    </div>
                                                    <a :href="route('blog.show', post.slug)" class="text-xl font-bold text-gray-900 mb-3 hover:text-emerald-600 transition cursor-pointer block">
                                                        {{ post.title }}
                                                    </a>
                                                    <p class="text-gray-600 text-sm mb-4">{{ post.excerpt }}</p>
                                                </div>
                                                <div class="flex items-center gap-4 text-xs text-gray-500">
                                                    <span class="flex items-center gap-1">
                                                        <span class="material-icons text-sm">calendar_today</span>
                                                        {{ post.published_at ? new Date(post.published_at).toLocaleDateString() : '' }}
                                                    </span>
                                                    <span class="flex items-center gap-1">
                                                        <span class="material-icons text-sm">person</span>
                                                        {{ post.author }}
                                                    </span>
                                                    <span class="flex items-center gap-1">
                                                        <span class="material-icons text-sm">comment</span>
                                                        {{ post.comments }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Highlighted posts -->
                            <div class="mb-16" v-if="props.posts.length">
                                <h2 class="text-2xl font-bold mb-8 text-gray-900">Highlighted Posts</h2>
                                <div class="grid md:grid-cols-3 gap-6">
                                    <div
                                        v-for="post in props.posts"
                                        :key="post.id"
                                        class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition"
                                    >
                                        <div class="relative h-48 overflow-hidden">
                                            <img
                                                :src="post.image_url"
                                                :alt="post.title"
                                                class="w-full h-full object-cover hover:scale-105 transition-transform"
                                            />
                                            <span class="absolute top-3 left-3 bg-rose-600 text-white text-xs font-semibold px-3 py-1 rounded">
                                                {{ post.category || 'News' }}
                                            </span>
                                        </div>
                                        <div class="p-4">
                                            <a :href="route('blog.show', post.slug)" class="text-lg font-bold text-gray-900 mb-4 line-clamp-2 group-hover:text-emerald-600 transition-colors duration-300 cursor-pointer leading-snug block">
                                                {{ post.title }}
                                            </a>
                                            <div class="flex items-center gap-3 text-xs text-gray-500">
                                                <span class="flex items-center gap-1">
                                                    <span class="material-icons text-sm">calendar_today</span>
                                                    {{ post.published_at ? new Date(post.published_at).toLocaleDateString() : '' }}
                                                </span>
                                                <span class="flex items-center gap-1">
                                                    <span class="material-icons text-sm">person</span>
                                                    {{ post.author_name || 'Admin' }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Gallery -->
                            <div>
                                <h2 class="text-2xl font-bold mb-8 text-gray-900">Gallery</h2>
                                <div class="grid md:grid-cols-2 gap-6">
                                    <div
                                        v-for="(image, index) in props.galleryImages"
                                        :key="index"
                                        class="h-64 rounded-lg overflow-hidden shadow-md hover:shadow-lg transition"
                                    >
                                        <img
                                            :src="image"
                                            alt="Gallery image"
                                            class="w-full h-full object-cover hover:scale-105 transition-transform"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sidebar -->
                        <div class="md:col-span-1">
                            <!-- Search -->
                            <div class="mb-8">
                                <h3 class="text-xl font-bold text-gray-900 mb-4">Search</h3>
                                <div class="flex gap-2">
                                    <input
                                        v-model="searchQuery"
                                        type="text"
                                        placeholder="Search posts..."
                                        class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent text-sm font-medium"
                                    />
                                    <button class="bg-gray-900 text-white px-6 py-3 rounded-lg hover:bg-gray-800 transition-colors duration-300 text-sm font-bold uppercase tracking-wide">
                                        Search
                                    </button>
                                </div>
                            </div>

                            <!-- Recent posts -->
                            <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-lg p-8 shadow-md">
                                <h3 class="text-xl font-bold text-gray-900 mb-6 uppercase tracking-widest text-center pb-4 border-b-2 border-emerald-600">Recent Posts</h3>
                                <ul class="space-y-5">
                                    <li
                                        v-for="(post, index) in props.recentPosts"
                                        :key="index"
                                        class="border-b border-gray-300 pb-5 last:border-b-0 last:pb-0"
                                    >
                                        <a href="#" class="text-emerald-600 hover:text-emerald-700 text-sm font-bold leading-relaxed transition-colors duration-300 block hover:translate-x-1 transition-transform">
                                            {{ post }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <Footer />
    </div>
</template>
