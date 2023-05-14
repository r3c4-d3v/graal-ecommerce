<template>
    <select
        ref="input"
        class="input select"
        v-model="selectedOption"
        @input="$emit('update:selectedOption', selectedOption)"
    >
        <option value="0">Selecione</option>
        <option v-for="option in inputOptions" :value="option.id">
            {{ option.name }}
        </option>
    </select>
</template>

<script setup>
import { ref, onMounted } from "vue";

const props = defineProps(['inputOptions']);
const selectedOption = ref(null);
const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

const resetSelected = () => {
    selectedOption.value = null;
}

defineExpose({
    focus: () => input.value.focus(),
    resetSelected,
});

</script>
