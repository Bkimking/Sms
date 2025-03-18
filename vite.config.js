import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/css/style.css',  
                'resources/css/styles.css',  
                'resources/css/studloginstyle.css',              
                'resources/js/script.js',               
                'resources/js/scripts.js',
            ],
            refresh: true,
        }),
    ],
});
