export default {
  async actFetchCurrentUser({ commit }, token) {
    try {
      const response = await this.$api.get('/users/me', {
        headers: {
          Authorization: `Bearer ${token}`
        }
      });

      if(response.status === 200 && response.data) {
        commit('setCurrentUser', {
          token,
          user: response.data
        })
      }

    } catch(e) {
      // console.error(e.message);
      return {
        ok: false,
        error: e.message
      }
    }
  },
  async actLogin({ dispatch }, { username, password }) {
    try {
      const response = await this.$wpApi.post('/jwt-auth/v1/token', {
        username,
        password
      });

      if (response.status === 200) {
        document.cookie = `access_token=${response.data.token}`;
        dispatch('actFetchCurrentUser', response.data.token);
        return {
          ok: true,
        }
      }

      return {
        ok: false,
        error: response.message
      }

    } catch(e) {
      if (e.response && e.response.data) {
        return {
          ok: false,
          error: e.response.data.code
        }
      }

      return {
        ok: false,
        error: e.message
      }
    }
  }
}
