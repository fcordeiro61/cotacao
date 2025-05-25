import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    server: {
        host: "localhost",
        port: 5173,
        hmr: {
            host: "localhost", // ou host.docker.internal no Mac/Windows, ou IP da sua máquina no Linux
            //protocol: "wss", // Usar o protocolo seguro, caso esteja utilizando HTTPS
        },
    },

    //     proxy: {
    //     '/app': 'https://grupo05.com.br',  // Configuração do proxy para o Laravel no backend
    // },
    // },
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
