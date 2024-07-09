import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/cms.css',
                'resources/js/cms.js',
                'resources/css/template.css',
                'resources/js/template.js',
            ],
            refresh: true,
        }),
    ],
});
