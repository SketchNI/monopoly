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
                gray: colors.neutral,
                red: {
                    DEFAULT: '#E74C3C',
                    50: '#FBE2DF',
                    100: '#F9D1CD',
                    200: '#F4B0A9',
                    300: '#F08F85',
                    400: '#EB6D60',
                    500: '#E74C3C',
                    600: '#D12B1A',
                    700: '#9F2114',
                    800: '#6D160D',
                    900: '#3B0C07',
                    950: '#220704'
                }
            }
        },
    },
    plugins: [],
};
