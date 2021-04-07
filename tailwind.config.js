module.exports = {
  purge: [
      './resources/**/*.blade.php',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
        colors: {
            theme: {
                DEFAULT: "#17925a",
                dark: "#0d5031",
            },
            accent: "#ff650e",
        },
        fontFamily: {
            body: "Montserrat, sans-serif",
            title: "d-din-condensed, sans-serif",
        },
        minHeight: {
            132: '33rem',
            194: '48.5rem',
        },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
