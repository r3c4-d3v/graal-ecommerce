<style lang="scss">
@use "resources/scss/app.scss";
</style>

<template>
    <Head>
        <title>Home</title>
    </Head>

    <Page
        :php-version="phpVersion"
        :laravel-version="laravelVersion"
        :is-authenticated="isAuthenticated"
    >
        page
    </Page>
</template>

<script setup>
import {Head, Page} from "@/Pages/App/Barrels/Home.js";

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    isAuthenticated: {
        type: Boolean,
        required: true
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

