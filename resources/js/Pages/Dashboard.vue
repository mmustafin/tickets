<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
// import { QrcodeStream } from 'vue-qrcode-reader';

import VueQrcodeReader from 'vue-qrcode-reader';

Vue.use(VueQrcodeReader)

const app = new Vue({
    el: '#app',
    components: { App },
});

</script>

<template>
    <Head title="Скан билетов" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Скан билетов</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">You're logged in!</div>
                    <div class="flex">
                        <div class="flex-initial w-64 ...">
                            <div class="grid-cols-1">
                                <qrcode-stream></qrcode-stream>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
