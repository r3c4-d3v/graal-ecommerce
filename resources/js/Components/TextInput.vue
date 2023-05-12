<script setup>
import { getCurrentInstance, onMounted, ref } from 'vue';
import { MaskInput } from "maska";

defineProps({
    modelValue: {
        type: String,
        required: true,
    },
    useMoneyMask: {
        type: Boolean,
        default: false
    }
});

const input = ref(null);

const {props} = getCurrentInstance();

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

function formatMoney() {
    let value = props.modelValue.replace('R$ ', '');

    value = value.replace(/\D+/g, '');
    value = value + '';
    value = parseInt(value);
    value = value + '';
    value = value.replace(/([0-9]{2})$/g, ",$1");

    if (value.length > 6) value = value.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
    if (value === 'NaN') return '';
    if (value.length <= 10) return "R$ " + value
}


defineExpose({focus: () => input.value.focus()});
</script>

<template>
    <input
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
        :value="useMoneyMask ? formatMoney(modelValue) : modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input"
    />
</template>
