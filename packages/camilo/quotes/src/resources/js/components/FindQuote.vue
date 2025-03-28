<script>
import axios from 'axios';

export default {
    name: 'FindQuote',
    data() {
        return {
            quoteId: '',
            quote: null,
            loading: false,
            error: null
        };
    },
    methods: {
        async fetchQuote() {
            if (!this.quoteId) {
                this.error = 'Please enter a quote ID';
                return;
            }

            this.loading = true;
            this.quote = null;
            this.error = null;

            try {
                const response = await axios.get(`/api/v1/quotes/${this.quoteId}`);
                const data = response.data;

                if('message' in data) {
                    this.error = data.message;
                    return;
                }

                this.quote = data;
            } catch (err) {
                this.error = err.response?.data?.message || 'Quote not found or error fetching quote';
            } finally {
                this.loading = false;
            }
        },
        formatDate(dateString) {
            return new Date(dateString).toLocaleDateString();
        }
    }
};
</script>

<template>
    <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Find Quote</h2>
        
        <div class="flex mb-4">
            <input
                v-model="quoteId"
                type="number"
                placeholder="Enter quote ID"
                class="flex-grow px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                @keyup.enter="fetchQuote"
            />
            <button
                @click="fetchQuote"
                class="px-4 py-2 bg-blue-600 text-white rounded-r-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
                Find
            </button>
        </div>

        <div v-if="loading" class="text-center py-4">
            <div class="inline-block animate-spin rounded-full h-8 w-8 border-4 border-blue-500 border-t-transparent"></div>
            <p class="mt-2 text-gray-600">Loading...</p>
        </div>

        <div v-else-if="error" class="p-4 bg-red-100 text-red-700 rounded-lg mb-4">
            {{ error }}
        </div>

        <div v-else-if="quote" class="bg-gray-50 p-6 rounded-lg">
            <div class="mb-4 text-xl font-semibold italic text-gray-800">
                "{{ quote.quote }}"
            </div>
            <div class="flex justify-end items-center">
                <div class="text-gray-600">
                    <p class="font-medium">{{ quote.author }}</p>
                </div>
            </div>
        </div>
    </div>
</template>