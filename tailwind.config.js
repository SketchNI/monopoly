import defaultTheme from 'tailwindcss/defaultTheme';
import colors from "tailwindcss/colors";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Averia Sans Libre', ...defaultTheme.fontFamily.sans],
                mono: ['Oxygen Mono', ...defaultTheme.fontFamily.mono],
            },
            colors: {
                gray: colors.neutral
            }
        },
    },
    plugins: [],
};
