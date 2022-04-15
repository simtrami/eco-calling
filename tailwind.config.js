module.exports = {
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
                body: "Montserrat, sans-serif",
                title: "d-din-condensed, sans-serif",
            },
            maxWidth: {
                '11/12': '91.666667%',
                '7/12': '58.333333%',
                '5/12': '41.666667%',
                '3/12': '25%',
            },
        },
    },
    plugins: [require('@tailwindcss/forms')],
}
