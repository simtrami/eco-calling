module.exports = {
    mode: 'jit',
    purge: [
        './resources/**/*.blade.php',
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            colors: {
                theme: {
                    DEFAULT: "var(--color-theme)",
                    dark: "var(--color-theme-dark)",
                },
                accent: "var(--color-accent)",
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
