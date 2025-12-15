<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="space-y-6">
            <!-- Top stats cards -->
            <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
                <div class="bg-white rounded-2xl border border-gray-100 p-4 flex flex-col gap-2">
                    <p class="text-[11px] font-medium text-gray-500">Total Items</p>
                    <div class="flex items-end justify-between">
                        <p class="text-2xl font-bold text-gray-900">24</p>
                        <span class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                            <span class="material-icons text-xl">insights</span>
                        </span>
                    </div>
                    <p class="text-[11px] text-emerald-600">+2 this month</p>
                </div>

                <div class="bg-white rounded-2xl border border-gray-100 p-4 flex flex-col gap-2">
                    <p class="text-[11px] font-medium text-gray-500">Completed</p>
                    <div class="flex items-end justify-between">
                        <p class="text-2xl font-bold text-gray-900">18</p>
                        <span class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-sky-50 text-sky-500">
                            <span class="material-icons text-xl">task_alt</span>
                        </span>
                    </div>
                    <p class="text-[11px] text-sky-600">75% completion</p>
                </div>

                <div class="bg-white rounded-2xl border border-gray-100 p-4 flex flex-col gap-2">
                    <p class="text-[11px] font-medium text-gray-500">Pending</p>
                    <div class="flex items-end justify-between">
                        <p class="text-2xl font-bold text-gray-900">6</p>
                        <span class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-amber-50 text-amber-500">
                            <span class="material-icons text-xl">schedule</span>
                        </span>
                    </div>
                    <p class="text-[11px] text-amber-600">25% remaining</p>
                </div>

                <div class="bg-white rounded-2xl border border-gray-100 p-4 flex flex-col gap-2">
                    <p class="text-[11px] font-medium text-gray-500">Avg Score</p>
                    <div class="flex items-end justify-between">
                        <p class="text-2xl font-bold text-gray-900">85%</p>
                        <span class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-purple-50 text-purple-500">
                            <span class="material-icons text-xl">bolt</span>
                        </span>
                    </div>
                    <p class="text-[11px] text-purple-600">+5% improvement</p>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                <!-- Recent activity list -->
                <div class="bg-white rounded-2xl border border-gray-100 p-5 lg:col-span-2">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h3 class="text-sm font-semibold text-gray-900">Recent Activity</h3>
                            <p class="text-[11px] text-gray-500">Overview of your latest items</p>
                        </div>
                        <button class="text-xs font-semibold text-emerald-600 hover:text-emerald-700">View all</button>
                    </div>

                    <div class="space-y-3">
                        <div class="flex items-center justify-between rounded-xl border border-gray-100 px-4 py-3 hover:bg-gray-50">
                            <div class="flex items-center gap-3">
                                <span class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                                    <span class="material-icons text-xl">description</span>
                                </span>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Mathematics Final Exam</p>
                                    <p class="text-[11px] text-gray-500">Completed on Dec 5, 2025</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-xs font-semibold text-emerald-600">92% Passed</p>
                            </div>
                        </div>

                        <div class="flex items-center justify-between rounded-xl border border-gray-100 px-4 py-3 hover:bg-gray-50">
                            <div class="flex items-center gap-3">
                                <span class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-sky-50 text-sky-500">
                                    <span class="material-icons text-xl">menu_book</span>
                                </span>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">English Literature Test</p>
                                    <p class="text-[11px] text-gray-500">Completed on Dec 3, 2025</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-xs font-semibold text-sky-600">88% Passed</p>
                            </div>
                        </div>

                        <div class="flex items-center justify-between rounded-xl border border-gray-100 px-4 py-3 hover:bg-gray-50">
                            <div class="flex items-center gap-3">
                                <span class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-amber-50 text-amber-500">
                                    <span class="material-icons text-xl">science</span>
                                </span>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Physics Midterm Exam</p>
                                    <p class="text-[11px] text-gray-500">In progress</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-xs font-semibold text-amber-600">45% In progress</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick actions -->
                <div class="space-y-4">
                    <div class="bg-white rounded-2xl border border-gray-100 p-5">
                        <h3 class="text-sm font-semibold text-gray-900 mb-3">Quick Actions</h3>
                        <div class="space-y-3">
                            <button class="w-full inline-flex items-center justify-between rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2.5 text-xs font-semibold">
                                <span class="flex items-center gap-2">
                                    <span class="material-icons text-base">add_circle</span>
                                    <span>Start New Exam</span>
                                </span>
                                <span class="material-icons text-sm">chevron_right</span>
                            </button>

                            <button class="w-full inline-flex items-center justify-between rounded-xl border border-gray-200 px-4 py-2.5 text-xs font-semibold text-gray-700 hover:bg-gray-50">
                                <span class="flex items-center gap-2">
                                    <span class="material-icons text-base">analytics</span>
                                    <span>View Results</span>
                                </span>
                                <span class="material-icons text-sm">chevron_right</span>
                            </button>

                            <button class="w-full inline-flex items-center justify-between rounded-xl border border-gray-200 px-4 py-2.5 text-xs font-semibold text-gray-700 hover:bg-gray-50">
                                <span class="flex items-center gap-2">
                                    <span class="material-icons text-base">tune</span>
                                    <span>Settings</span>
                                </span>
                                <span class="material-icons text-sm">chevron_right</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
