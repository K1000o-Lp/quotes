<script>
import axios from 'axios';    

export default {
    data() {
        return {
            quote: {
                text: '',
                author: ''
            },
            loading: true,
            error: null
        }
    },
    mounted() {
        this.fetchRandomQuote();
    },
    methods: {
        fetchRandomQuote() {
            this.loading = true;
            this.error = null;
            axios.get('/api/v1/quotes/random')
                .then(response => {
                    const { data } = response;
                    this.quote = data;
                })
                .catch(error => {
                    console.error('Failed to fetch quote:', error);
                    this.error = 'Failed to load quote. Please try again.';
                })
                .finally(() => {
                    this.loading = false;
                });
        },
    }
}
</script>

<template>
    <div class="max-w-xl mx-auto my-8 p-6 rounded-lg shadow-md bg-white">
        <div v-if="loading" class="text-center py-4">
            <div class="inline-block animate-spin rounded-full h-8 w-8 border-4 border-blue-500 border-t-transparent"></div>
            <p class="mt-2 text-gray-600">Loading quote...</p>
        </div>
        <div v-else-if="error" class="text-center py-4 text-red-500">
            {{ error }}
        </div>
        <div v-else class="flex flex-col">
            <blockquote class="mb-4 pl-4 border-l-4 border-blue-500">
                <p class="text-xl leading-relaxed mb-2">{{ quote.quote }}</p>
                <footer class="text-right italic opacity-80">— {{ quote.author || 'Unknown' }}</footer>
            </blockquote>
            <button 
                class="self-center mt-6 px-4 py-2 bg-blue-500 text-white border-none rounded cursor-pointer transition-colors hover:bg-blue-600 disabled:bg-gray-400 disabled:cursor-not-allowed"
                @click="fetchRandomQuote" 
                :disabled="loading"
            >
                Get Another Quote
            </button>
        </div>
    </div>
</template>