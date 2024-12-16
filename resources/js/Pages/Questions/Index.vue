<script setup>
import { reactive, ref } from 'vue';
import { Head, router } from '@inertiajs/vue3';
import useModal from '../../Composables/useModal';
import AppLayout from '../../Layouts/AppLayout.vue'
import Pagination from '../../Components/Pagination.vue';
import QuestionFilter from '../../Components/Question/QuestionFilter.vue';
import QuestionSummary from '../../Components/Question/QuestionSummary.vue';
import EditQuestionForm from '../../Components/Question/EditQuestionForm.vue';
import CreateQuestionForm from '../../Components/Question/CreateQuestionForm.vue';

const { showModal, hideModal, modalTitle, Modal } = useModal('#question-modal')

defineProps({
    questions: {
        type: Object,
        required: true
    },
    filter: String,
})

const question = reactive({
    id: null,
    title: null,
    body: null
})

const editing = ref(false);

const askQuestion = () => {
    editing.value = false
    modalTitle.value = "Ask Question"
    showModal()
}

const editQuestion = (payload) => {
    editing.value = true
    modalTitle.value = "Edit Question"

    question.id = payload.id
    question.title = payload.title
    question.body = payload.body

    showModal()
};

const removeQuestion = (payload) => {
    if (confirm("Are you sure want to delete your question?")) {
        router.delete(route('questions.destroy', payload.id), {
            preserveScroll: true
        });
    }
};
</script>

<template>
    <AppLayout>
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="page-header">All Questions</h1>
                    </div>
                    <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                            <QuestionSummary v-for="question in questions.data" :key="question.id" :question="question"
                                @edit="editQuestion" @remove="removeQuestion" />
                        </ul>
                    </div>
                    <!-- Pagination -->
                    <Pagination :meta="questions.meta" />
                </div>
                <div class="col-md-3">
                    <div class="d-grid">
                        <button class="btn btn-primary" @click="askQuestion">Ask
                            Question</button>
                    </div>

                    <QuestionFilter :filter="filter" />
                    <h2 class="fs-5 mt-5">Related Tags</h2>
                    <ul class="tags-list mt-3">
                        <li><a href="#" class="tag mb-2">Javascript</a></li>
                        <li><a href="#" class="tag mb-2">JQuery</a></li>
                        <li><a href="#" class="tag mb-2">Vue.js</a></li>
                        <li><a href="#" class="tag mb-2">React.js</a></li>
                        <li><a href="#" class="tag mb-2">Inertia.js</a></li>
                        <li><a href="#" class="tag mb-2">PHP</a></li>
                        <li><a href="#" class="tag mb-2">Laravel</a></li>
                        <li><a href="#" class="tag mb-2">Bootstrap</a></li>
                        <li><a href="#" class="tag mb-2">Tailwind</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <Modal id="question-modal" :title="modalTitle" size="extra-large" scrollable @hidden="editing = false">
            <component :is="editing ? EditQuestionForm : CreateQuestionForm" :question="question"
                @success="hideModal" />
        </Modal>
    </AppLayout>

    <Head title="All Questions" />
</template>
