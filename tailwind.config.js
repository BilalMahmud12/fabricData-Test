const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    mode: 'jit',
    purge: [
        './resources/views/**/*.blade.php',
        './resources/css/**/*.css',
        './resources/js/**/*.vue',
    ],
    darkMode: false,
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'main': '#008060',
                'main-light' : '#1a8f36',
                'accent' : '#f05a28ff',
                'accent-blue': '#006fbb',
                'accent-green': '#00a0ac',
            }
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
}
