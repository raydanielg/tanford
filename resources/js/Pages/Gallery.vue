<script setup>
import Header from '@/Components/Header.vue';
import Footer from '@/Components/Footer.vue';

const props = defineProps({
    mediaItems: {
        type: Array,
        default: () => [],
    },
});
</script>

<template>
    <div class="min-h-screen bg-white text-gray-900">
        <Header />
        <main>
            <!-- Hero -->
            <section class="relative h-72 bg-cover bg-center flex flex-col items-center justify-center" style="background-image: url('/images/DXB_3883-1536x1024.jpg');">
                <div class="absolute inset-0 bg-gradient-to-b from-emerald-600/60 via-emerald-700/50 to-emerald-900/70 backdrop-blur-sm"></div>
                <div class="relative z-10 text-center text-white px-4 mb-4">
                    <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight">Gallery</h1>
                </div>
                <nav class="relative z-10 bg-white/20 backdrop-blur-sm px-6 py-3 rounded-lg">
                    <div class="flex items-center gap-2 text-sm text-white">
                        <a href="/" class="hover:text-emerald-200 transition">Home</a>
                        <span class="text-white/60">›</span>
                        <span class="text-white/90 font-medium">Gallery</span>
                    </div>
                </nav>
            </section>

            <!-- Gallery grid -->
            <section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
                <div class="mx-auto max-w-6xl">
                    <h2 class="text-2xl font-bold mb-8 text-gray-900">Media Gallery</h2>
                    <div
                        v-if="mediaItems.length"
                        class="grid sm:grid-cols-2 md:grid-cols-3 gap-6"
                    >
                        <div
                            v-for="item in mediaItems"
                            :key="item.id"
                            class="group bg-gray-50 border border-gray-100 rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition flex flex-col"
                        >
                            <div class="relative aspect-video bg-black">
                                <img
                                    v-if="item.type === 'image'"
                                    :src="item.file_url"
                                    :alt="item.title"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform"
                                />
                                <video
                                    v-else-if="item.type === 'video'"
                                    :src="item.file_url"
                                    controls
                                    class="w-full h-full object-cover"
                                ></video>
                                <div
                                    v-else
                                    class="w-full h-full flex items-center justify-center text-xs text-gray-300"
                                >
                                    File
                                </div>
                            </div>
                            <div class="p-4 flex-1 flex flex-col">
                                <h3 class="text-sm font-semibold text-gray-900 mb-1 line-clamp-2">
                                    {{ item.title }}
                                </h3>
                                <p
                                    v-if="item.description"
                                    class="text-[11px] text-gray-600 line-clamp-3 mt-1"
                                >
                                    {{ item.description }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <p
                        v-else
                        class="text-sm text-gray-500"
                    >
                        No media items have been added yet.
                    </p>
                </div>
            </section>
        </main>
        <Footer />
    </div>
</template>
