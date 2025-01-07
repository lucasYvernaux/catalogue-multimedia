import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/sass/app.scss",
            ],
            refresh: true,
        }),
    ],
    // add this to map with docker container
    server: {
        host: "0.0.0.0",
        //port: 8080,
        hmr: {
            host: "localhost",
        },

        watch: {
            usePolling: true,
        },
    },
});
