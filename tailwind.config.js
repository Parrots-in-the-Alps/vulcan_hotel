/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './storage/framework/views/*.php',
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
    './resources/js/components/*.vue',
    './resources/js/views/*.vue',
  ],
  theme: {
    extend: {
      colors: {
        'backGround': '#2f2f2f',
        'callToAction': '#FF5C04',
        'outerSpace': '#1B3235',
        'cadetBlue': '#A7A9BE',
        'gunMetal': '#243236',
        'persimmon': '#DF6426',
        'bistre': '#372B20',
      },
    },
    fontFamily: {
      Philosopher: ['philosopher-mono', 'Philosopher', 'sans-serif'],
      Cinzel: ['cinzel-mono', 'Cinzel', 'sans-serif']
  },
  },
  plugins: [],
}
