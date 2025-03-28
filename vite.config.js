import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js',
                'packages/camilo/quotes/src/resources/js/app.js',
                'packages/camilo/quotes/src/resources/css/app.css',
            ],
            refresh: true,
        }),
        tailwindcss(),
        vue(),
    ],
    resolve: {
        alias: {
            '@quotes': '/packages/camilo/quotes/src/resources',
            'vue': 'vue/dist/vue.esm-bundler.js',
        },
    },
});
