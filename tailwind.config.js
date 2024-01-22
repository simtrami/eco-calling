import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/js/*.js',
    ],
    darkMode: 'class', // or 'media'
    theme: {
        extend: {
            colors: {
                theme: {
                    DEFAULT: "var(--color-theme)",
                    dark: "var(--color-theme-dark)",
                    light: "var(--color-theme-light)",
                },
                accent: "var(--color-accent)",
                somber: "var(--color-somber)",
                dark: "var(--color-dark)",
                darker: "var(--color-darker)",
            },
            fontFamily: {
                body: ['Montserrat', ...defaultTheme.fontFamily.sans],
                title: ['d-din-condensed', ...defaultTheme.fontFamily.sans],
            },
            maxWidth: {
                '11/12': '91.666667%',
                '7/12': '58.333333%',
                '5/12': '41.666667%',
                '3/12': '25%',
            },
        },
    },
    plugins: [forms],
}
