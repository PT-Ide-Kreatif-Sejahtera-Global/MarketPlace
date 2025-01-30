/** @type {import('tailwindcss').Config} */
const defaultTheme = require("tailwindcss/defaultTheme");
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["InterVariable", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    DEFAULT: '#35EFAE',
                    dark: '#0EAD75',
                    light: '#99F7D5',
                    subtle: '#D5FBEE'
                },
                secondary: {
                    DEFAULT: '#454F68',
                    dark: '#272D3B',
                    light: '#6F7C9F',
                    subtle: '#B7BED0'
                }
            }
        },
    },
    plugins: [],
};
