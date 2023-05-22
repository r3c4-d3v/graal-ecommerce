<template>
    <Head>
        <title>Couriers</title>
    </Head>

    <AuthenticatedLayout>
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">Entregadores</h1>
        </template>
        <Container>
            <StoreCourierForm/>
        </Container>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';
import Container from "@/Components/Container.vue";
import StoreCourierForm from "@/Pages/Admin/Courier/Partials/StoreCourierForm.vue";

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>
