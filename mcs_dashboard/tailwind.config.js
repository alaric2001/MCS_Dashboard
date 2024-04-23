/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        // sans: ['Figtree', ...defaultTheme.fontFamily.sans],
        'sans': ['Poppins', 'sans-serif'],
      },
    },
  },
  plugins: [],
}
