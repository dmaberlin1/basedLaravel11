import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/assets/libs/bootstrap/bootstrap.min.css',
                'resources/assets/libs/bootstrap/bootstrap.bundle.min.js'],
            refresh: true,
        }),
    ],
});
