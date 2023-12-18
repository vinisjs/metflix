/** @type {import('tailwindcss').Config} */
module.exports = {
  mode: "jit",
  content: [
    "*.php",
    "components/**/*.php",
    "./pages/*.{html, php}",
    "./pages/films/*.{html, php }",
    "./class/**/*.php",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
};
