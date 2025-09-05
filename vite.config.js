import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    define: {
        __VUE_OPTIONS_API__: true,
        __VUE_PROD_DEVTOOLS__: false,
        __VUE_PROD_HYDRATION_MISMATCH_DETAILS__: false,
    },
    resolve: {
        alias: {
            vue: "vue/dist/vue.esm-bundler.js",
        },
    },
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/vue.js",
                "resources/js/axios.js",
            ],
            refresh: true,
        }),
    ],
});
