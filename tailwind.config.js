const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: ['./storage/framework/views/*.php', './resources/views/**/*.blade.php'],

    theme: {
        extend: {
            colors: {
                primary: "#FF6161",
                primaryLight: "#FF9494",
                lightGray: "#F4F3F3",
                mediumGray: "#ECE9E9",
                darkGray: "#C4C4C4",
                gold: "#ffdb5d",
              },
            fontFamily: {
                'open-sans': ['Open Sans', 'sans-serif'],
                'karla': ['Karla', 'sans-serif'],
            },
            screens: {
                'xs': {'max': '639px'},
                'sm': '640px',
                // => @media (min-width: 640px) { ... }
          
                'md': '768px',
                // => @media (min-width: 768px) { ... }
          
                'lg': '1024px',
                // => @media (min-width: 1024px) { ... }
          
                'xl': '1280px',
                // => @media (min-width: 1280px) { ... }
          
                '2xl': '1536px',
                // => @media (min-width: 1536px) { ... }
              },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
