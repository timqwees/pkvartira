/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './public/**/*.php',
    './public/**/*.html',
  ],
  theme: {
    extend: {
      fontFamily: {
        'heading': ['Unbounded', 'sans-serif'],
        'body': ['Inter', 'sans-serif'],
      },
      colors: {
        orange: {
          50: '#fff7ed',
          100: '#ffedd5',
          200: '#fed7aa',
          300: '#fdba74',
          400: '#fb923c',
          500: '#f97316',
          600: '#c2410c',
          700: '#9a3412',
          800: '#7c2d12',
          900: '#431407',
        },
      },
    },
  },
  plugins: [],
}
