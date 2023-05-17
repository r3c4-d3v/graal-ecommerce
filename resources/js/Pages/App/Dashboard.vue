<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Container from "@/Components/Container.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
</script>

<style lang="scss">
    @import "resources/scss/app.scss";
</style>

<template>
    <Head>
        <title>Dashboard</title>
        <link rel="icon" type="image/ico" href="/favicon.ico" />
    </Head>

    <GuestLayout>
        <AuthenticatedLayout>
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Profile</h2>
            </template>
        </AuthenticatedLayout>

        <Container>
            <h2 class="h2">Bem vindo!</h2>
        </Container>
    </GuestLayout>
</template>
