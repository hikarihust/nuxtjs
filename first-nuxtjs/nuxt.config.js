export default {
  loading: {
    color: 'blue',
    height: '5px',
    duration: 3000,
    continuous: true,
    throttle: 1000,
  },
  // Global page headers (https://go.nuxtjs.dev/config-head)
  head: {
    title: 'Demo Meta Tags va SEO NuxtJs',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: '' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
      {
        rel: 'stylesheet',
        href: 'https://fonts.googleapis.com/css2?family=Roboto&display=swap'
      }
    ]
  },

  // Global CSS (https://go.nuxtjs.dev/config-css)
  css: [
  ],

  // Plugins to run before rendering page (https://go.nuxtjs.dev/config-plugins)
  plugins: [
    { src: '~/plugins/vue-notification.js', mode: 'client' },
    '~/plugins/hello.js'
  ],

  // Auto import components (https://go.nuxtjs.dev/config-components)
  components: false,

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
  router: {
    middleware: [ 'mobile', 'check-visit' ]
  },
  messages: {
    loading: 'Loading...',
    error_404: 'This page could not be found',
    server_error: 'Có lỗi xảy ra!!!',
    nuxtjs: '',
    back_to_home: 'Back to the home page',
    server_error_details:
      'Có lổi xảy ra trong quá trình duyệt Web. Vui lòng refresh lại trang hoặc liên hệ với Admin',
    client_error: 'Error',
    client_error_details:
      'An error occurred while rendering the page. Check developer tools console for details.'
  }
}
