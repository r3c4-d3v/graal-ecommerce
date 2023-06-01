<style lang="scss">
@import "resources/scss/app.scss";

.carousel {
    &__item {
        @apply select-none w-full mx-1;
    }

    &__prev,
    &__next {
        @apply text-white hover:text-slate-500;
        top: calc(50% - 10px);
    }
}
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
        <div>
            <h2 class="h2">Categorias</h2>

            <Carousel
                class="w-full"
                :itemsToShow="carouselSettings.itemsToShow"
                :wrapAround="carouselSettings.wrapAround"
                :snapAlign="carouselSettings.snapAlign"
            >
                <Slide class="carousel" v-for="category in productCategories" :key="category">
                    <Link class="carousel__item" :href="'app/category/' + category.id">
                        <img :src="category.image_url" alt="category.name">
                    </Link>
                </Slide>
                <template #addons>
                    <Pagination/>
                    <Navigation/>
                </template>
            </Carousel>
        </div>
    </Page>
</template>

<script setup>
import 'vue3-carousel/dist/carousel.css';
import {Head, Page, Link, ref, Carousel, Slide, Pagination, Navigation} from "@/Pages/App/Barrels/Home.js";

const carouselSettings = ref({
    itemsToShow: 7,
    wrapAround: true,
    snapAlign: 'center'
});

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
    productCategories: {
        type: Array,
    },
    products: {
        type: Array
    }
});

</script>

