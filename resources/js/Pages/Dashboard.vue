<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
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

        <div class="wrapper">
            <div class="container">
                <div class="content">
                    <div class="p-6 text-gray-900">Bem vindo!</div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
