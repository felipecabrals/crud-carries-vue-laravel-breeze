<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import List from '@/Pages/Carries/List.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-white-800 dark:text-gray-200 leading-tight">Lista de Transportadoras</h2>
        </template>

        <div class="py-12 justify-center">
            <List class="max-w-xl" />
            
        </div>
    </AuthenticatedLayout>
</template>
