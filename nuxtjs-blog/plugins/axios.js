export default function ({ $axios, env }, inject) {
  const api = $axios.create({
    headers: {
      common: {
        Accept: 'text/plain, */*'
      }
    }
  });
  api.setBaseURL(env.baseUrl);

  inject('api', api);
}
