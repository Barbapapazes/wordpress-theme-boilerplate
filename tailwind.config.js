const theme = require('./theme.json')
const tailpress = require('@jeffreyvr/tailwindcss-tailpress')

module.exports = {
  content: [
    './*.php',
    './**/*.php',
    './resources/css/*.css',
    './resources/js/*.js',
    './safelist.txt',
  ],
  theme: {
    container: {
      padding: {
        DEFAULT: '1rem',
        sm: '2rem',
        lg: '0rem',
      },
    },
    extend: {
      colors: tailpress.colorMapper(tailpress.theme('settings.color.palette', theme)),
    },
  },
  plugins: [tailpress.tailwind, require('@tailwindcss/typography')],
}
