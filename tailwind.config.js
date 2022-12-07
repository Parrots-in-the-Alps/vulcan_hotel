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
  daisyui: {
    themes: [
      {
        mytheme: {
          "primary": "#a7a9be", //cadet blue
          "secondary": "#df6426", //perismon
          "accent": "#ff5c04", //callToaction-orange pétant
          "neutral": "#1b3235", //outerspace
          "base-100": "#2f2f2f", //backGround-jet
          "info": "#243236", //gunMetal
          "success": "#372b20", //bistre 
          "warning": "#FBBD23", //defaut->jaune
          "error": "#F87272", //defaut->saumon
        },
      },
    ],
  },
  theme: {
    extend: {
      borderWidth: {
        DEFAULT: '1px',
        '0': '0',
        '1.5': '1.5px',
        '2': '2px',
        '3': '3px',
        '4': '4px',
        '6': '6px',
        '8': '8px',
      },
      colors: {
        'backGround': '#2f2f2f',
        'callToAction': '#FF5C04',
        'outerSpace': '#1B3235',
        'cadetBlue': '#A7A9BE',
        'gunMetal': '#243236',
        'persimmon': '#DF6426',
        'bistre': '#372B20',
      },
      width: {
        '270': '270px' // w-default input with icons (look at Stays.vue)
      }
    },
    fontFamily: {
      Philosopher: ['philosopher-mono', 'Philosopher', 'sans-serif'],
      Cinzel: ['cinzel-mono', 'Cinzel', 'sans-serif'],
      Megrim: ['megrim-mono', 'Megrim', 'sans-serif']
    },
    
  },
  plugins: [require("daisyui")],
}
