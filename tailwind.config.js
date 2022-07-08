const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    theme: {
        extend: {
            fontFamily: {
                sans: ["Poppins", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    // 50: "#47467d",
                    100: "#F5F5F8",
                    // 200: "#333269",
                    300: "#E2E2E9",
                    // 400: "#1f1e55",
                    500: "#A2A2B8",
                    // 600: "#0b0a41",
                    700: "#656589",
                    // 800: "#00002d",
                    900: "#15144B",
                },
                secondary: {
                    // 50: "#47467d",
                    100: "#F6FAFA",
                    // 200: "#333269",
                    300: "#E3F0F1",
                    // 400: "#1f1e55",
                    500: "#A6CFD3",
                    // 600: "#0b0a41",
                    700: "#6EB1B6",
                    // 800: "#00002d",
                    900: "#1E878F",
                },
                success: {
                    // 50: "#47467d",
                    100: "#F6FDF9",
                    // 200: "#333269",
                    300: "#E4F8EE",
                    // 400: "#1f1e55",
                    500: "#A9E7CA",
                    // 600: "#0b0a41",
                    700: "#72D9A9",
                    // 800: "#00002d",
                    900: "#25C37A",
                },
                danger: {
                    // 50: "#47467d",
                    100: "#FDF5F6",
                    // 200: "#333269",
                    300: "#FAE1E5",
                    // 400: "#1f1e55",
                    500: "#F1A0AE",
                    // 600: "#0b0a41",
                    700: "#E7637A",
                    // 800: "#00002d",
                    900: "#DB0E32",
                },
                warning: {
                    // 50: "#47467d",
                    100: "#FFFEF5",
                    // 200: "#333269",
                    300: "#FFFCE0",
                    // 400: "#1f1e55",
                    500: "#FFF79E",
                    // 600: "#0b0a41",
                    700: "#FFF261",
                    // 800: "#00002d",
                    900: "#FFEB0A",
                },
                info: {
                    // 50: "#47467d",
                    100: "#F6FAFF",
                    // 200: "#333269",
                    300: "#E3F0FE",
                    // 400: "#1f1e55",
                    500: "#A7CEFD",
                    // 600: "#0b0a41",
                    700: "#70AFFB",
                    // 800: "#00002d",
                    900: "#2183F9",
                },
                base: {
                    // 50: "#47467d",
                    100: "#F6F6F6",
                    // 200: "#333269",
                    300: "#E4E4E4",
                    // 400: "#1f1e55",
                    500: "#A8A8A9",
                    // 600: "#0b0a41",
                    700: "#717272",
                    // 800: "#00002d",
                    900: "#232425",
                },
            },
            screens: {
                "2xl": "1440px",
            },
        },
    },
    variants: {
        extend: {
            backgroundColor: ["active"],
        },
    },
    content: [
        "./app/**/*.php",
        "./resources/**/*.html",
        "./resources/**/*.js",
        "./resources/**/*.jsx",
        "./resources/**/*.ts",
        "./resources/**/*.tsx",
        "./resources/**/*.php",
        "./resources/**/*.vue",
        "./resources/**/*.twig",
        "./node_modules/flowbite/**/*.js",
        "./vendor/rappasoft/laravel-livewire-tables/resources/views/**/*.blade.php",
    ],
    options: {
        safelist: [
            "sm:max-w-xl",
            "sm:max-w-2xl",
            "sm:max-w-3xl",
            "sm:max-w-4xl",
            "sm:max-w-5xl",
            "sm:max-w-6xl",
            "sm:max-w-7xl",
            "md:max-w-lg",
            "md:max-w-xl",
            "lg:max-w-2xl",
            "lg:max-w-3xl",
            "xl:max-w-4xl",
            "xl:max-w-5xl",
            "2xl:max-w-6xl",
            "2xl:max-w-7xl'",
        ],
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
        // require("@tailwindcss/aspect-ratio"),
        require("flowbite/plugin"),
    ],
};
