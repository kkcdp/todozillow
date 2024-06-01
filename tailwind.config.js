//** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      './storage/framework/views/*.php',
      './resources/views/**/*.blade.php',
      './resources/js/**/*.vue',
    ],
    theme: {
        screens: {
            'xxs': '200px',
            'xs': '300px',
            'sm': '576px',
            'md': '960px',
            'lg': '1440px'
          },

    extend: {
        fontFamily:{
            'montserrat': ['Montserrat']
        },
      },
    },
    variants: {
        extend: {
          visibility: ["group-hover"],
        },
       },
    plugins: [
      require('@tailwindcss/forms'),
    ],
  }
