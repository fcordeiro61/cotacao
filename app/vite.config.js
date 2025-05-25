import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    server: {
        host: "0.0.0.0",
        port: 5173,
        hmr: {
            host: "localhost", // ou host.docker.internal no Mac/Windows, ou IP da sua máquina no Linux
        },
    },
    build: {
        manifest: true, // Gera o manifest.json
        outDir: "public/build", // Caminho de saída para os arquivos compilados
    },
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/bootstrap.js",
                "resources/js/scroll.js",
            ],
            refresh: true,
        }),
    ],
});
