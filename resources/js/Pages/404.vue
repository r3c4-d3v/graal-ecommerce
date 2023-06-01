<style lang="scss">
@use "resources/scss/app.scss";
</style>

<template>
    <Head>
        <title>Página não encontrada - 404</title>
    </Head>
    <div class="page">
        <div class="page__container">
            <PageMenu :is-authenticated="true" :can-login="false" :can-register="false" :show-home="true" />
            <MenuLogo/>

            <div class="page__wrapper text-center">
                <div class="page__content">
                    <h1 class="h1">Ops! Página não encontrada =[</h1>
                </div>
            </div>

            <PageFooter
                :laravel-version="laravelVersion"
                :php-version="phpVersion"
            />
        </div>
    </div>
</template>

<script setup>
import {Head, Page} from "@/Pages/App/Barrels/Home.js";
import {MenuLogo, PageFooter, PageMenu} from "@/Components/Barrels/Page.js";

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

