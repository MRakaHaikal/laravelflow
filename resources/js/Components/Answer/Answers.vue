<template>
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="mt-4 answer-header">{{ answers.meta.total }} Answers</h2>
        <Pagination :meta="answers.meta" />
    </div>

    <div class="answer-content mt-4">
        <AnswerSummary v-for="answer in answers.data" :key="answer.id" :answer="answer" />
    </div>
</template>

<script setup>
import Pagination from '../Pagination.vue';
import AnswerSummary from './AnswerSummary.vue';

defineProps({
    answers: {
        type: Object,
        required: true
    }
})
</script>

<style scoped></style>
