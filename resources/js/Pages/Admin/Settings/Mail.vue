<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
    settings: {
        type: Object,
        default: () => null,
    },
});

const form = useForm({
    mailer: props.settings?.mailer || 'smtp',
    host: props.settings?.host || '',
    port: props.settings?.port || 587,
    username: props.settings?.username || '',
    password: '',
    encryption: props.settings?.encryption || 'tls',
    from_address: props.settings?.from_address || '',
    from_name: props.settings?.from_name || '',
});

const submit = () => {
    form.post(route('admin.settings.mail.update'), {
        preserveScroll: true,
    });
};
</script>

<template>
    <AuthenticatedLayout>
        <Head title="SMTP &amp; email settings" />

        <div class="space-y-6 max-w-3xl">
            <div class="bg-white rounded-2xl border border-gray-100 p-5">
                <h1 class="text-lg font-semibold text-gray-900">SMTP &amp; email</h1>
                <p class="text-[11px] text-gray-500 mt-1">Configure how the application sends emails.</p>
            </div>

            <form
                @submit.prevent="submit"
                class="bg-white rounded-2xl border border-gray-100 p-5 text-xs space-y-6"
            >
                <div class="grid sm:grid-cols-3 gap-4">
                    <div class="sm:col-span-1">
                        <label class="block text-[11px] font-medium text-gray-700 mb-1">Mailer</label>
                        <select
                            v-model="form.mailer"
                            class="w-full rounded-lg border-gray-300 text-[12px] focus:ring-emerald-500 focus:border-emerald-500"
                        >
                            <option value="smtp">SMTP</option>
                            <option value="sendmail">Sendmail</option>
                            <option value="log">Log (development)</option>
                        </select>
                    </div>
                    <div class="sm:col-span-2 grid sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] font-medium text-gray-700 mb-1">Host</label>
                            <input
                                v-model="form.host"
                                type="text"
                                class="w-full rounded-lg border-gray-300 text-[12px] focus:ring-emerald-500 focus:border-emerald-500"
                                placeholder="smtp.mailtrap.io"
                            />
                        </div>
                        <div>
                            <label class="block text-[11px] font-medium text-gray-700 mb-1">Port</label>
                            <input
                                v-model.number="form.port"
                                type="number"
                                class="w-full rounded-lg border-gray-300 text-[12px] focus:ring-emerald-500 focus:border-emerald-500"
                                placeholder="587"
                            />
                        </div>
                    </div>
                </div>

                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] font-medium text-gray-700 mb-1">Username</label>
                        <input
                            v-model="form.username"
                            type="text"
                            class="w-full rounded-lg border-gray-300 text-[12px] focus:ring-emerald-500 focus:border-emerald-500"
                        />
                    </div>
                    <div>
                        <label class="block text-[11px] font-medium text-gray-700 mb-1">Password</label>
                        <input
                            v-model="form.password"
                            type="password"
                            autocomplete="new-password"
                            class="w-full rounded-lg border-gray-300 text-[12px] focus:ring-emerald-500 focus:border-emerald-500"
                            placeholder="••••••••"
                        />
                        <p class="mt-1 text-[10px] text-gray-400">Leave blank to keep existing password.</p>
                    </div>
                </div>

                <div class="grid sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-[11px] font-medium text-gray-700 mb-1">Encryption</label>
                        <select
                            v-model="form.encryption"
                            class="w-full rounded-lg border-gray-300 text-[12px] focus:ring-emerald-500 focus:border-emerald-500"
                        >
                            <option value="tls">TLS</option>
                            <option value="ssl">SSL</option>
                            <option value="none">None</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[11px] font-medium text-gray-700 mb-1">From address</label>
                        <input
                            v-model="form.from_address"
                            type="email"
                            class="w-full rounded-lg border-gray-300 text-[12px] focus:ring-emerald-500 focus:border-emerald-500"
                            placeholder="no-reply@example.com"
                        />
                    </div>
                    <div>
                        <label class="block text-[11px] font-medium text-gray-700 mb-1">From name</label>
                        <input
                            v-model="form.from_name"
                            type="text"
                            class="w-full rounded-lg border-gray-300 text-[12px] focus:ring-emerald-500 focus:border-emerald-500"
                            placeholder="Tanford"
                        />
                    </div>
                </div>

                <div class="border-t border-gray-100 pt-4 flex items-center justify-end">
                    <button
                        type="submit"
                        class="inline-flex items-center gap-2 rounded-full bg-emerald-600 px-4 py-1.5 text-[11px] font-semibold text-white hover:bg-emerald-700 disabled:bg-emerald-400 disabled:cursor-not-allowed"
                        :disabled="form.processing"
                    >
                        <span v-if="form.processing" class="inline-flex h-4 w-4 border-2 border-white/40 border-t-white rounded-full animate-spin"></span>
                        <span>Save changes</span>
                    </button>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
