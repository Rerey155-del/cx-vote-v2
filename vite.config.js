import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    // server: {
    //     // Atur sesuai ip yang dapat di lihat id cmd ipconfig
    //     host: "192.168.212.4",
    //     port: 8001,
    //     strictPort: true,
    //     hmr: {
    //         host: "192.168.212.4",
    //     },
    //     cors: true,
    // },
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
});
