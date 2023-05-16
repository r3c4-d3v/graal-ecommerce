<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';
import StoreProductForm from "@/Pages/Admin/Product/Partials/StoreProductForm.vue";
import Container from "@/Components/Container.vue";

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>

<template>
    <Head title="Products"/>

    <AuthenticatedLayout>
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">Produtos</h1>
        </template>
        <Container>
            <StoreProductForm />
        </Container>
    </AuthenticatedLayout>
</template>
