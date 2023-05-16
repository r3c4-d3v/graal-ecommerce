export const handleFormFieldErrors = (fieldName, inputElement, form) => {
    if (form.errors[fieldName]) {
        form.reset(fieldName);
        inputElement.value.focus();
    }
}
