import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/css/style.css",
                "resources/js/app.js",
                "resources/js/testimonialSwiper.js",
                "resources/css/testimonialSwiper.css",
                "resources/js/faqs.js",
                "resources/js/helpers/toast.js",
                "resources/js/dashboard/app.js",
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        // watch: {
        //     ignored: ["**/storage/framework/views/**"],
        // },

        // host: "192.168.100.144", // your local IP true if all interfaces
        // port: 5173, // default Vite port
    },
});
