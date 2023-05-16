<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Container from "@/Components/Container.vue";
</script>

<style lang="scss">
    @import "resources/scss/app.scss";
</style>

<template>
    <Head>
        <title>Dashboard</title>
        <link rel="icon" type="image/ico" href="/favicon.ico" />
    </Head>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="h2">Dashboard</h2>
        </template>

        <Container>
            <h2 class="h2">Bem vindo!</h2>
        </Container>
    </AuthenticatedLayout>
</template>
