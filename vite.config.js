import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/autentification.css',
                'resources/js/authorization.js'
            ],
            refresh: true,
        }),
    ],
});
