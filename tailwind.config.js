module.exports = {
   purge: [
    './storage/framework/views/*.php',
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
   ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        'primary-100': '#D1EDED',
        'primary-200': '#B3E2E1',
        'primary-300': '#94D6D5',
        'primary-400': '#85D0CF',
        'primary-500': '#30bdb5',
        'primary-600': '#529D9C',
        'primary-700': '#478989',
        'primary-800': '#3D7675',
        'primary-900': '#336262',

        'secondary-100': '#EFC6BF',
        'secondary-200': '#DF8E7E',
        'secondary-300': '#DA7B69',
        'secondary-400': '#CF553E',
        'secondary-500': '#CA4228',
        'secondary-600': '#B63B24',
        'secondary-700': '#A23520',
        'secondary-800': '#8D2E1C',
        'secondary-900': '#792818',

      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
