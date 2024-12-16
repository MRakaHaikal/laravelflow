<template>
    <div class="post-item my-4 border-bottom">
        <div class="vote-col">
            <div class="d-flex flex-column align-items-center">
                <button title="This post is useful" class="btn btn-outline-secondary btn-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                        <path
                            d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
                    </svg>
                </button>
                <div class="votes-count">{{ answer.votes_count }}</div>
                <button title="This post is not useful" class="btn btn-outline-secondary btn-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                        <path
                            d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                    </svg>
                </button>
                <button title="Bookmark the post" class="btn text-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-bookmark-fill" viewBox="0 0 16 16">
                        <path
                            d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2" />
                    </svg>
                </button>
                <button title="Mark the answer as accepted" class="btn p-0 answer-accepted">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-check-lg icon-lg" viewBox="0 0 16 16">
                        <path
                            d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="post-col actionable">
            <div class="question-body">
                <p>{{ answer.body }}</p>
            </div>

            <div class="d-flex justify-content-end mb-2">
                <Author :post-at="answer.created_at" :user="answer.user" isAnswer />
            </div>
            <div class="post-action">
                <div class="d-flex gap-1 justify-content-center align-items-center">
                    <button class="btn btn-sm btn-circle shadow text-white btn-secondary me-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-pencil-fill" viewBox="0 0 16 16">
                            <path
                                d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z">
                            </path>
                        </svg>
                    </button>
                    <button class="btn btn-sm btn-circle shadow btn-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path
                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import Author from '../Author.vue';
defineProps({
    answer: {
        type: Object,
        required: true
    }
})
</script>
