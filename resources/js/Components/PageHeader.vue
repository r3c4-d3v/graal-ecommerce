<style lang="scss">
@import "resources/scss/app.scss";
</style>

<template>
    <header>
        <h2 class="h2">{{ title }}</h2>
        <p class="p-small">
            {{ text }}
        </p>
    </header>
</template>

<script setup>

defineProps({
    title: {
        type: String,
        required: true
    },
    text: {
        type: String,
        required: true
    }
})

</script>
