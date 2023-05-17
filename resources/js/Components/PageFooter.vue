<style lang="scss">
@use "resources/scss/app.scss";
</style>
<template>
    <div class="page-footer">
        <div class="page-footer__wrapper">
            <div class="page-footer__container">
                <a
                    target="_blank"
                    href="https://github.com/r3c4-d3v/"
                    class="page-footer__link"
                >
                    <HeartIcon/>
                    Desenvolvido com amor
                </a>
            </div>
        </div>

        <div class="page-footer__text">
            Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
        </div>
    </div>
</template>
<script setup>
import {HeartIcon} from "@/Components/Barrels/PageFooter.js";

defineProps({
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
})
</script>
