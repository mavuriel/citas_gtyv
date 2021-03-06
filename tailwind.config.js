const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        colors: {
            // Build your palette here
            transparent: 'transparent',
            current: 'currentColor',
            gray: colors.trueGray,
            red: colors.red,
            blue: colors.lightBlue,
            yellow: colors.amber,
            bblue: colors.blue,
            green: colors.green,

            grayF: {
                light: '#282424',
                DEFAULT: '#282424',
                dark: '#282424',
            },
            bluet: {
                light: '#204474',
                DEFAULT: '#204474',
                dark: '#204474',
            },

            white: {
                light: '#FFFFFF',
                DEFAULT: '#FFFFFF',
                dark: '#FFFFFF',
            },
        },

        width: {
            'auto': 'auto',
            'full': '100%',
            '5r' : '5 rem',
            '10r': '10 rem',
            '5' : '5%',
            '8': '8%',
            '10': '10%',
            '1/7': '14.2857143%',
            '15': '15%',
            '20': '20%',
            '1/3': '33.333333%',
            '30': '30%',
            '35': '35%',
            '40': '40%',
            '45': '45%',
            '47': '47%',
            '48': '48%',
            '50': '50%',
            '60': '60%',
            '70': '70%',
            '80': '80%',
            '2': '2rem'
        }
        ,
        minWidth: {
            '0': '0',
            '1/4': '25%',
            '35': '35%',
            '38': '38%',
            '40': '40%',
            '45': '45%',
            '1/2': '50%',
            '3/4': '75%',
            'full': '100%',
        },

        minHeight: {

            '5r': '5rem',
            '10r': '10rem',
            '15r': '15rem',
            '0': '0',
            '5p':'5px',
            '5': '5vh',
            '8': '8vh',
            '10': '10vh',
            '15': '15vh',
            '1/4': '25vh',
            '1/3': '33.3vh',
            '40': '40vh',
            '1/2': '50vh',
            '70': '70vh',
            '72': '72vh',
            '3/4': '75vh',
            '77': '77vh',
            '80': '80vh',
            '82': '82vh',
            '85': '85vh',
            '87': '87vh',
            '90': '90vh',
            '91': '91vh',
            '91/2': '91.25vh',
            '92': '92vh',
            '93': '93vh',
            'screen': '100vh',
            'full': '100%'
        },

        container: {
            center: true,
        },

        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: theme => ({
                'tec': "url('/assets/img/frentesm.webp')",
                'logo': "url('/assets/img/logov2.webp')",
            }),

        },
    },

    variants: {
        extend: {
            backgroundColor: ['hover', 'active'],
            opacity: ['disabled'],
            ringWidth: ['hover', 'active'],
            ringColor: ['hover', 'active'],
            ringOffsetWidth: ['hover', 'active'],
            ringOpacity: ['hover', 'active'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
