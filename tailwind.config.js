module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
        rotationRate: {
            '405' : '315deg',
        },
        spacing: {
          '30': '7.5rem',
          '42': '10.5rem',
        },
        colors: {
            'a-gray': '#111111',
            'a-yellow': '#FFD763',
            'a-yellow-100': '#fcd987',
            'a-yellow-50': '#ffe9b4',
            'a-yellow-900': '#b09760',
            'a-red': '#FA437F',
            'a-blue': '#9BF9F9',
            'up': 'rgba(255, 255, 255, 0.1)',
            '2up': 'rgba(255, 255, 255, 0.3)',
            '3up': 'rgba(255, 255, 255, 0.6)',
            'down': 'rgba(0, 0, 0, 0.1)',
            '2down': 'rgba(0, 0, 0, 0.3)',
            '3down': 'rgba(0, 0, 0, 0.6)',
            '4down': 'rgba(0, 0, 0, 0.82)',

            'admin-gray': '#f5f5f5',
        },
        boxShadow: {
            'lg-center-black': '0 0 20px black',
            'sm-center-white': '0 0 7px rgba(255, 255, 255 , 0.24)',
            'a-red-light-sward':
                '0 2px 7px rgb(250, 67, 127,1), 0 6px 18px rgb(250, 67, 127,1)',
            'a-blue-light-sward':
                '0 2px 7px #9BF9F9, 0 6px 18px #9BF9F9',
            'a-yellow': '0 0 5px #FFD763',
        },
        borderRadius: {
            '4xl': '2rem',
        },
        backgroundImage: {
            'texture': "url('/images/texture.jpg')",
        }
    },
  },
  variants: {
    extend: {
        textColor: ['active'],
        ringWidth: ['hover', 'active'],
    },
  },
  plugins: [
      require('@tailwindcss/aspect-ratio'),
      require('@tailwindcss/forms'),
  ],
}
