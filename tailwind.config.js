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

        colors:{
            // Build your palette here
            transparent: 'transparent',
            current: 'currentColor',
            gray: colors.trueGray,
            red: colors.red,
            blue: colors.lightBlue,
            yellow: colors.amber,
            bblue:colors.blue,

            grayF: {
                light: '#282424',
                DEFAULT: '#282424',
                dark: '#282424',
            },
            bluet:{
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
            'auto':'auto',
            'full':'100%',
            '1/7': '14.2857143%',
        }
        ,
        minHeight: {
            '0': '0',
            '10': '10vh',
            '15':'15vh',
            '1/4': '25vh',
            '1/3': '33.3vh',
            '40':'40vh',
            '1/2': '50vh',
            '70' : '70vh',
            '72' : '72vh',
            '3/4': '75vh',
            '85' : '85vh',
            '87' : '87vh',
            '90' : '90vh',
            '91' : '91vh',
            'full': '100vh',
        },

        container: {
            center: true,
        },

        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: theme => ({
                'tec':"url('/assets/img/frentesm.webp')",
                'logo':"url('/assets/img/logov2.webp')",
            }),

        },
    },

    variants: {
        extend: {
            backgroundColor: ['hover','active'],
            opacity: ['disabled'],
            ringWidth: ['hover', 'active'],
            ringColor: ['hover', 'active'],
            ringOffsetWidth: ['hover', 'active'],
            ringOpacity: ['hover', 'active'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
