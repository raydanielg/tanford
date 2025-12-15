<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';

const props = defineProps({
    registrations: {
        type: Array,
        default: () => [],
    },
});

const updateStatus = (reg, status) => {
    if (!status || reg.status === status) return;

    router.post(
        route('admin.forum-registrations.update-status', reg.id),
        { status },
        {
            preserveScroll: true,
            preserveState: true,
        },
    );
};
</script>

<template>
    <AuthenticatedLayout>
        <Head title="Forum registrations" />
        <div class="space-y-6">
            <div class="bg-white rounded-2xl border border-gray-100 p-5 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <div>
                    <h1 class="text-lg font-semibold text-gray-900">Forum registrations</h1>
                    <p class="text-[11px] text-gray-500 mt-1">
                        Submissions from the Tanzania Global Logistics Forum registration form.
                    </p>
                </div>
                <div class="text-[11px] text-gray-500">
                    <span class="font-semibold text-emerald-700">{{ props.registrations.length }}</span>
                    registrations
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-gray-100 p-5 text-xs overflow-x-auto">
                <table class="min-w-full text-left">
                    <thead>
                        <tr class="border-b border-gray-100 text-[11px] text-gray-500">
                            <th class="py-2 px-3 font-medium">Forum</th>
                            <th class="py-2 px-3 font-medium">Name</th>
                            <th class="py-2 px-3 font-medium">Email</th>
                            <th class="py-2 px-3 font-medium">Phone</th>
                            <th class="py-2 px-3 font-medium">Organization</th>
                            <th class="py-2 px-3 font-medium">Attendee type</th>
                            <th class="py-2 px-3 font-medium">Booth</th>
                            <th class="py-2 px-3 font-medium">Package</th>
                            <th class="py-2 px-3 font-medium">Status</th>
                            <th class="py-2 px-3 font-medium">Created</th>
                            <th class="py-2 px-3 font-medium text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="reg in props.registrations" :key="reg.id" class="border-b border-gray-50 hover:bg-gray-50/60">
                            <td class="py-2 px-3 text-[11px] text-gray-700">{{ reg.forum_name }}</td>
                            <td class="py-2 px-3 text-[11px] text-gray-900">{{ reg.name }}</td>
                            <td class="py-2 px-3 text-[11px] text-emerald-700">{{ reg.email }}</td>
                            <td class="py-2 px-3 text-[11px] text-gray-700">{{ reg.phone || '-' }}</td>
                            <td class="py-2 px-3 text-[11px] text-gray-700">{{ reg.organization || '-' }}</td>
                            <td class="py-2 px-3 text-[11px] text-gray-700">{{ reg.attendee_type || '-' }}</td>
                            <td class="py-2 px-3 text-[11px] text-gray-700">{{ reg.booth || '-' }}</td>
                            <td class="py-2 px-3 text-[11px] text-gray-700">{{ reg.sponsorship_package || '-' }}</td>
                            <td class="py-2 px-3 text-[11px]">
                                <span
                                    class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-medium"
                                    :class="{
                                        'bg-yellow-100 text-yellow-800': !reg.status || reg.status === 'pending',
                                        'bg-emerald-100 text-emerald-800': reg.status === 'approved',
                                        'bg-rose-100 text-rose-800': reg.status === 'rejected',
                                    }"
                                >
                                    {{ reg.status || 'pending' }}
                                </span>
                            </td>
                            <td class="py-2 px-3 text-[11px] text-gray-500">{{ new Date(reg.created_at).toLocaleString() }}</td>
                            <td class="py-2 px-3 text-[11px] text-right">
                                <div class="flex flex-col items-end gap-1">
                                    <Link
                                        :href="route('admin.forum-registrations.show', reg.id)"
                                        class="inline-flex items-center gap-1 rounded-full border border-emerald-200 px-3 py-1 text-[11px] font-medium text-emerald-800 bg-emerald-50 hover:bg-emerald-100 hover:border-emerald-300 transition"
                                    >
                                        <span class="material-icons text-[14px]">visibility</span>
                                        <span>View</span>
                                    </Link>
                                    <div class="flex gap-1">
                                        <button
                                            type="button"
                                            class="inline-flex items-center gap-1 rounded-full px-2.5 py-0.5 text-[10px] border border-emerald-200 text-emerald-700 bg-emerald-50 hover:bg-emerald-100 disabled:opacity-60 disabled:cursor-default"
                                            :disabled="reg.status === 'approved'"
                                            @click="updateStatus(reg, 'approved')"
                                        >
                                            <span class="material-icons text-[13px]">check_circle</span>
                                            <span>Approve</span>
                                        </button>
                                        <button
                                            type="button"
                                            class="inline-flex items-center gap-1 rounded-full px-2.5 py-0.5 text-[10px] border border-rose-200 text-rose-700 bg-rose-50 hover:bg-rose-100 disabled:opacity-60 disabled:cursor-default"
                                            :disabled="reg.status === 'rejected'"
                                            @click="updateStatus(reg, 'rejected')"
                                        >
                                            <span class="material-icons text-[13px]">cancel</span>
                                            <span>Reject</span>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr v-if="!props.registrations.length">
                            <td colspan="10" class="py-6 text-center text-[11px] text-gray-500">No registrations yet.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
