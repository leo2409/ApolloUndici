module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
        spacing: {
          '30': '7.5rem',
          '42': '10.5rem',
        },
        colors: {
            'a-gray': '#212121',
            'a-yellow': '#FFD763',
            'a-red': '#FA437F',
            'a-blue': '#9BF9F9',
            'up': 'rgba(255, 255, 255, 0.1)',
            '2up': 'rgba(255, 255, 255, 0.3)',
            '3up': 'rgba(255, 255, 255, 0.6)',
            'down': 'rgba(0, 0, 0, 0.1)',
            '2down': 'rgba(0, 0, 0, 0.3)',
            '3down': 'rgba(0, 0, 0, 0.6)',
            '4down': 'rgba(0, 0, 0, 0.85)',
        },
        boxShadow: {
            'lg-center-black': '0 0 30px black',
            'sm-center-white': '0 0 7px rgba(255, 255, 255 , 0.24)',
            'a-red-light-sward':
                '0 2px 7px rgb(250, 67, 127,1), 0 6px 18px rgb(250, 67, 127,1)',
            'a-blue-light-sward':
                '0 2px 7px #9BF9F9, 0 6px 18px #9BF9F9',
        },
        borderRadius: {
            '4xl': '2rem',
        },
        borderWidth: {
            '1': '1px',
        },
        backgroundImage: {
            'texture': "url('/images/texture.jpg')",
        }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [
      require('@tailwindcss/aspect-ratio'),
      require('@tailwindcss/forms'),
  ],
}
