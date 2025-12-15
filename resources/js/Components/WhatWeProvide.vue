<template>
    <section class="bg-white py-20">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 text-center">
            <!-- Top heading -->
            <button
                type="button"
                class="mb-4 inline-flex items-center rounded-full border border-emerald-100 bg-emerald-50 px-4 py-1 text-xs font-semibold uppercase tracking-wide text-emerald-700"
            >
                Our Focus Areas
            </button>

            <h2 class="mb-4 text-3xl font-extrabold leading-snug text-slate-900 sm:text-4xl lg:text-5xl">
                Our Focus Areas
            </h2>

            <p class="mx-auto max-w-3xl text-sm sm:text-base text-slate-500">
                TANFORD is committed to advancing the logistics and trade ecosystem by connecting professionals,
                empowering businesses, and driving innovation.
            </p>
        </div>

        <div class="mx-auto flex max-w-6xl flex-col gap-10 px-4 sm:px-6 lg:flex-row lg:px-8">
            <!-- Left: service list -->
            <div class="w-full space-y-4 lg:w-5/12">
                <button
                    v-for="(service, index) in services"
                    :key="service.title"
                    @click="activeIndex = index"
                    class="group flex w-full items-center justify-between rounded-full border px-5 py-3 text-left text-sm font-medium transition-colors duration-200"
                    :class="
                        activeIndex === index
                            ? 'border-emerald-500 bg-white shadow-[0_18px_45px_rgba(15,23,42,0.06)] text-emerald-700'
                            : 'border-emerald-200 bg-white text-slate-700 hover:border-sky-400 hover:text-sky-600'
                    "
                >
                    <span class="flex items-center gap-3">
                        <span
                            class="inline-flex h-9 w-9 items-center justify-center rounded-full border transition-colors duration-200"
                            :class="
                                activeIndex === index
                                    ? 'border-emerald-500 text-emerald-600'
                                    : 'border-emerald-200 text-emerald-500 group-hover:border-sky-400 group-hover:text-sky-600'
                            "
                        >
                            <span class="material-icons text-base">{{ service.icon }}</span>
                        </span>
                        <span>{{ service.title }}</span>
                    </span>
                    <span
                        class="material-icons text-base"
                        :class="
                            activeIndex === index
                                ? 'text-emerald-500'
                                : 'text-gray-400 group-hover:text-sky-500'
                        "
                    >
                        chevron_right
                    </span>
                </button>
            </div>

            <!-- Right: details card -->
            <div
                class="relative w-full overflow-hidden rounded-3xl bg-white p-8 shadow-[0_18px_45px_rgba(15,23,42,0.06)] lg:w-7/12 text-left"
            >
                <div class="mb-4 inline-flex h-10 w-10 items-center justify-center rounded-full bg-rose-50 text-rose-500">
                    <span class="material-icons text-xl">{{ current.icon }}</span>
                </div>
                <h3 class="mb-3 text-xl font-semibold text-slate-900">
                    {{ current.heading }}
                </h3>
                <p class="mb-6 text-sm sm:text-base text-slate-500">
                    {{ current.description }}
                </p>

                <div class="mt-4 h-40 w-full overflow-hidden rounded-2xl bg-slate-200 sm:h-52">
                    <img
                        :src="current.image"
                        :alt="current.title"
                        class="h-full w-full object-cover"
                    />
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { computed, ref } from 'vue';

const services = [
    {
        title: 'Marketing & Advertising',
        heading: 'Elevating Your Presence through Strategic Marketing and Advertising Solutions',
        icon: 'campaign',
        description:
            'We help you design campaigns, branding, and digital strategies that amplify your logistics and trade services across Tanzania and the GCC.',
        image:
            'https://images.unsplash.com/photo-1553877522-43269d4ea984?w=900&h=600&fit=crop'
    },
    {
        title: 'Public Relations (PR)',
        heading: 'Strengthen Your Brand Reputation in New Markets',
        icon: 'record_voice_over',
        description:
            'Engage stakeholders, partners and regulators using clear messaging and proactive communication strategies tailored for logistics and trade.',
        image:
            'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=900&h=600&fit=crop'
    },
    {
        title: 'Consulting Services',
        heading: 'Expert Guidance on Trade, Customs and Logistics Operations',
        icon: 'support_agent',
        description:
            'Work with experienced advisors to optimise routes, reduce risk and streamline your cross‑border operations.',
        image:
            'https://images.unsplash.com/photo-1553877522-43269d4ea984?w=900&h=600&fit=crop'
    },
    {
        title: 'Sales and Distribution',
        heading: 'Scale Your Distribution Network Across the Region',
        icon: 'trending_up',
        description:
            'Design sales channels and distribution strategies that connect Tanzania with key hubs in the UAE and GCC.',
        image:
            'https://images.unsplash.com/photo-1520607162513-77705c0f0d4a?w=900&h=600&fit=crop'
    },
    {
        title: 'Legal & Regulatory Compliance',
        heading: 'Navigate Regional Regulations with Confidence',
        icon: 'gavel',
        description:
            'Stay compliant with customs, trade and logistics regulations through updated guidance and documentation support.',
        image:
            'https://images.unsplash.com/photo-1523287562758-66c7fc58967a?w=900&h=600&fit=crop'
    },
    {
        title: 'Financial & Investment Services',
        heading: 'Unlock Financing and Investment for Your Trade Projects',
        icon: 'account_balance',
        description:
            'Connect with partners and institutions that can finance logistics, warehousing and cross‑border expansion projects.',
        image:
            'https://images.unsplash.com/photo-1553729459-efe14ef6055d?w=900&h=600&fit=crop'
    }
];

const activeIndex = ref(0);

const current = computed(() => services[activeIndex.value]);
</script>
