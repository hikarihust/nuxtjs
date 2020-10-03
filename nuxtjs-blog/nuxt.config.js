export default {
  // Global page headers (https://go.nuxtjs.dev/config-head)
  head: {
    title: 'nuxtjs-blog',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: '' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
      { rel: 'stylesheet', href: 'https://fonts.googleapis.com/css2?family=Muli:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap' },
      { rel: 'stylesheet', href: 'https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&amp;display=swap' },
      { rel: 'stylesheet', href: 'http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css' },
      { rel: 'stylesheet', href: '/assets/libs/bootstrap4/bootstrap-tcl.css' }
    ],
    script: [
      {
        async: true,
        defer: true,
        crossorigin: 'anonymous',
        src: 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=682829465411569&autoLogAppEvents=1',
        nonce: 'njMQVAzi'
      }
    ]
  },

  // Global CSS (https://go.nuxtjs.dev/config-css)
  css: [
  ],

  // Plugins to run before rendering page (https://go.nuxtjs.dev/config-plugins)
  plugins: [
    '~/plugins/axios'
  ],

  // Auto import components (https://go.nuxtjs.dev/config-components)
  components: true,

  // Modules for dev and build (recommended) (https://go.nuxtjs.dev/config-modules)
  buildModules: [
  ],

  // Modules (https://go.nuxtjs.dev/config-modules)
  modules: [
    '@nuxtjs/axios',
  ],

  // Build Configuration (https://go.nuxtjs.dev/config-build)
  build: {
  },
  env: {
    baseUrl: process.env.BASE_URL || 'http://learning-nuxtjs.xyz/wp-api/wp-json'
  }
}
