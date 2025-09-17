import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/css/filament/admin/theme.css",
                "public/css/amidesfahani/filament-tinyeditor/tiny-css.css",
                "public/css/styles.css",
                'resources/css/pdf.css',
            ],
            refresh: true,
        }),
    ],
});
