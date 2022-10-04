/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js,php}",
    "*.{html,js,php}",
    "./views/**/*.{html,js,php}",
    "./partials/**/*.{html,js,php}",
    "./process/crud/promotions/*.{html,js,php}",
    "./process/crud/students/*.{html,js,php}",
    "./process/crud/sessions/*.{html,js,php}",
    "./process/crud/staffs/*.{html,js,php}",],
  theme: {
    extend: {
      backgroundImage: {
        'cesi': "url('/assets/img/logo-CESI.png')",
      }
    },
  },
  plugins: [],
}