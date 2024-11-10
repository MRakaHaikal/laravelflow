<script setup>
defineProps({
    question: {
        type: Object,
        required: true
    }
})
</script>

<template>
    <p>{{ question.id }}</p>
    <p>{{ question.title }}</p>
</template>
