<template>
    <section class="bg-gray-50 py-20">
        <div class="mx-auto flex max-w-6xl flex-col gap-12 px-4 sm:px-6 lg:flex-row lg:px-8">
            <!-- Left: title and description -->
            <div class="w-full lg:w-1/3 flex flex-col justify-center">
                <div class="mb-4 flex items-center gap-2 text-rose-500">
                    <span class="h-0.5 w-8 bg-rose-500"></span>
                    <span class="h-0.5 w-8 bg-rose-300"></span>
                    <span class="h-0.5 w-8 bg-rose-200"></span>
                </div>
                <h2 class="mb-3 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                    OUR MEMBERS
                </h2>
                <p class="mb-6 text-sm sm:text-base text-slate-500 max-w-md">
                    Together we build stronger trade bridges between Tanzania, the UAE and the wider GCC region.
                </p>
                <a
                    href="#members"
                    class="inline-flex w-max items-center justify-center rounded-md bg-slate-900 px-6 py-3 text-xs font-semibold uppercase tracking-wide text-white hover:bg-slate-800"
                >
                    Learn More
                </a>
            </div>

            <!-- Right: logos grid -->
            <div class="w-full lg:w-2/3" v-if="members.length">
                <div class="grid grid-cols-2 gap-4 sm:grid-cols-3">
                    <div
                        v-for="(member, index) in members"
                        :key="index"
                        class="flex h-24 items-center justify-center rounded-xl bg-white shadow-[0_12px_30px_rgba(15,23,42,0.06)]"
                    >
                        <img :src="member.logo_url" :alt="member.name" class="max-h-16 max-w-[80%] object-contain" />
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
const props = defineProps({
    members: {
        type: Array,
        default: () => [],
    },
});

const members = props.members ?? [];
</script>
