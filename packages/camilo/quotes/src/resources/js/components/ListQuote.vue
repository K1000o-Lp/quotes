<script>
import axios from 'axios';

export default {
    props: {
        title: {
            type: String,
            default: 'Quotes'
        }
    },
    
    data() {
        return {
            quotes: [],
            loading: true,
            error: null,
            skip: 0,
            limit: 30
        }
    },
    mounted() {
        this.fetchQuotes()
    },
    methods: {
        fetchQuotes() {
            this.loading = true
            this.error = null
            axios.get('/api/v1/quotes', {
                params: {
                    skip: this.skip
                }
            })
            .then(response => {
                const { data } = response;
                this.quotes = data.quotes;
            })
            .catch(error => {
                this.error = error
            })
            .finally(() => {
                this.loading = false
            })
        },
        makeSkip() {
            this.skip += this.limit
            this.fetchQuotes()
        },
        makeForget() {
            if(this.skip > 0) {
                this.skip -= this.limit
                this.fetchQuotes()
            }
        }
    }
}
</script>

<template>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">{{ title }}</h1>
        
        <div v-if="loading" class="text-center py-4">
            <div class="inline-block animate-spin rounded-full h-8 w-8 border-4 border-blue-500 border-t-transparent"></div>
            <p class="mt-2 text-gray-600">Loading quotes...</p>
        </div>
        
        <div v-else-if="error" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <p>Error loading quotes. Please try again.</p>
        </div>
        
        <div v-else-if="quotes.length === 0" class="text-center py-8 text-gray-500">
            No quotes found.
        </div>
        
        <div v-else class="overflow-x-auto shadow-md rounded-lg">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quote</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr v-for="quote in quotes" :key="quote.id" class="hover:bg-gray-50">
                        <td class="py-4 px-4 text-sm text-gray-500">{{ quote.id }}</td>
                        <td class="py-4 px-4 text-sm font-medium text-gray-900">{{ quote.author }}</td>
                        <td class="py-4 px-4 text-sm text-gray-500">{{ quote.quote }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="flex mt-4" :class="{ 'justify-between': skip > 0, 'justify-end': skip === 0 }">
            <button v-show="skip > 0" @click="makeForget" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Previous</button>
            <button @click="makeSkip" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Next</button>
        </div>
    </div>
</template>
