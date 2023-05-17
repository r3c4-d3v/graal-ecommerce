<style lang="scss">
@use "resources/scss/app.scss";
</style>
<template>
    <div class="page">
        <PageMenu
            :is-authenticated="isAuthenticated"
            :can-register="canRegister"
            :can-login="canLogin"
        />
        <div class="page__container">
            <MenuLogo/>

            <div class="page__wrapper">
                <div class="page__content">
                    <slot />
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
import {PageMenu, MenuLogo, PageFooter} from "@/Components/Barrels/Page.js";

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
