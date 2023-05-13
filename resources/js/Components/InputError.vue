<script setup>
defineProps({
    message: {
        type: String,
    },
});
</script>

<template>
    <div v-show="message">
        <p class="p-error">
            {{ message }}
        </p>
    </div>
</template>
