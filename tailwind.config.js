const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: ['./storage/framework/views/*.php', './resources/views/**/*.blade.php'],

    theme: {
        // colors: {
        //     primary: "#FF6161",
        //     primaryLight: "#FF9494",
        //     lightGray: "#F4F3F3",
        //     mediumGray: "#ECE9E9",
        //     darkGray: "#C4C4C4",
        //   },
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
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
