const colors = require('tailwindcss/colors');

module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './app/Http/Controllers/**/*.php'
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            colors: {
                'primary': {
                    DEFAULT: '#009EE0',
                    '50': '#C6EEFF',
                    '100': '#ADE7FF',
                    '200': '#7AD8FF',
                    '300': '#47C9FF',
                    '400': '#14BAFF',
                    '500': '#009EE0',
                    '600': '#007AAD',
                    '700': '#00567A',
                    '800': '#003247',
                    '900': '#000E14'
                },
                'secondary': {
                    DEFAULT: '#A81D22',
                    '50': '#F3B8BA',
                    '100': '#EFA2A5',
                    '200': '#E7777B',
                    '300': '#E04B50',
                    '400': '#D3252B',
                    '500': '#A81D22',
                    '600': '#7D1519',
                    '700': '#510E10',
                    '800': '#260608',
                    '900': '#000000'
                },
                brown: {
                    DEFAULT: "#795548",
                    "50": "#efebe9",
                    "100": "#d7ccc8",
                    "200": "#bcaaa4",
                    "300": "#a1887f",
                    "400": "#8d6e63",
                    "500": "#795548",
                    "600": "#6d4c41",
                    "700": "#5d4037",
                    "800": "#4e342e",
                    "900": "#3e2723",
                },
                'gray': colors.warmGray
            },
            fontFamily: {
                'openSans': ['"Open Sans"']
            }
        },
    },
    variants: {
        extend: {},
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
}
