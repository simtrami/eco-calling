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
            }
        },
        fontFamily: {
            body: "Montserrat, sans-serif",
        }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
