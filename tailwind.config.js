module.exports = {
    mode: 'jit',
    purge: [
        './resources/**/*.blade.php',
    ],
    darkMode: 'class', // or 'media' or false
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
        },
    },
    variants: {
        animation: ['motion-safe'],
        extend: {
            animation: ['hover'],
        },
    },
    plugins: [require('@tailwindcss/forms')],
}
