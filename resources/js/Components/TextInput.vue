<template>
    <input
        ref="input"
        class="input"
        :value="useMoneyMask ? formatMoney(modelValue) : (usePhoneMask ? formatPhoneNumber(modelValue) : modelValue)"
        @input="$emit('update:modelValue', $event.target.value)"
    />
</template>

<script setup>
import {onMounted, ref} from 'vue';

const input = ref(null);

const props = defineProps({
    modelValue: {
        type: String,
        required: true,
    },
    useMoneyMask: {
        type: Boolean,
        default: false
    },
    usePhoneMask: {
        type: Boolean,
        default: false
    },
});

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

    return newValue;
}

function formatPhoneNumber(value) {
    const regex = /^(\d{2})(\d{4,5})(\d{4})$/;

    if (regex.test(value)) {
        return value.replace(regex, '($1) $2-$3');
    } else {
        return value;
    }
}

</script>
