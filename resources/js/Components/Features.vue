<script setup>
import { computed } from 'vue';

const props = defineProps({
    focusAreas: {
        type: Array,
        default: () => [],
    },
});

const fallbackAreas = [
    {
        title: 'Trade Opportunities',
        description:
            'Discover new logistics and trade opportunities between Tanzania, the UAE and the wider GCC region.',
        icon: 'search',
    },
    {
        title: 'Networking Platform',
        description:
            'Meet freight forwarders, shipping lines and key decision makers in one focused logistics forum.',
        icon: 'desktop_windows',
    },
    {
        title: 'Knowledge Sessions',
        description:
            'Learn from experts about customs, regulations and best practices that impact regional logistics.',
        icon: 'schema',
    },
];

const areas = computed(() => {
    return props.focusAreas && props.focusAreas.length ? props.focusAreas : fallbackAreas;
});
</script>

<template>
    <section class="bg-gray-50 py-16">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="mb-8 text-center">
                <h2 class="text-2xl font-bold text-gray-900">Our Focus Areas</h2>
            </div>
            <div class="grid gap-8 md:grid-cols-3">
                <div
                    v-for="area in areas"
                    :key="area.id || area.title"
                    class="rounded-3xl bg-white p-8 shadow-[0_18px_45px_rgba(15,23,42,0.06)]"
                >
                    <div class="mb-6 inline-flex h-14 w-14 items-center justify-center rounded-full bg-emerald-50 text-emerald-600">
                        <span class="material-icons text-2xl">
                            {{ area.icon || 'category' }}
                        </span>
                    </div>
                    <h3 class="mb-2 text-lg font-semibold text-slate-900">
                        {{ area.title }}
                    </h3>
                    <p class="text-sm text-slate-500">
                        {{ area.description }}
                    </p>
                </div>
            </div>
        </div>
    </section>
</template>
