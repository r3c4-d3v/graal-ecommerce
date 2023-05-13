<script setup>
import { onMounted, ref, defineExpose, toRefs } from 'vue';

const props = defineProps({
    modelValue: {
        type: String,
        required: true,
    },
    useMoneyMask: {
        type: Boolean,
        default: false
    }
});
const { modelValue, useMoneyMask } = toRefs(props);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({
    focus: () => input.value.focus()
});

function formatMoney(value) {
    let newValue = value.replace(/\D/g, '');
    newValue = newValue.replace(/^(\d+)(\d{2})$/, "$1.$2");
    newValue = newValue.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');

    if (newValue === 'NaN') {
        return '';
    }

    return 'R$ ' + newValue;
}
</script>

<template>
    <input
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
        :value="useMoneyMask ? formatMoney(modelValue) : modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input"
    />
</template>
