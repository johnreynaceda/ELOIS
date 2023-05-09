const defaultTheme = require('tailwindcss/defaultTheme')
const colors = require('tailwindcss/colors')
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './vendor/filament/**/*.blade.php',
    './vendor/wireui/wireui/resources/**/*.blade.php',
    './vendor/wireui/wireui/ts/**/*.ts',
    './vendor/wireui/wireui/src/View/**/*.php',
  ],
  presets: [require('./vendor/wireui/wireui/tailwind.config.js')],
  darkMode: 'class',
  theme: {
    extend: {
      colors: {
        danger: colors.rose,
        primary: colors.gray,
        success: colors.green,
        warning: colors.yellow,
        logo: '#72C9CF',
      },
      fontFamily: {
        sans: ['DM Sans', ...defaultTheme.fontFamily.sans],
        mont: ['Montserrat', ...defaultTheme.fontFamily.sans],
      },
    },
  },

  plugins: [require('@tailwindcss/forms')],
}
