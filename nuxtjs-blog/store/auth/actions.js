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
  actLogout({ commit }) {
    commit('setCurrentUser', {
      token: '',
      user: null
    })
    document.cookie = `access_token=`;
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
  },
  async actRegister({ dispatch }, { username, password, email, nickname }) {
    try {
      const response = await this.$api.post('/users/register', {
        username,
        password,
        email,
        nickname
      });

      if (response.status === 201) {
        return await dispatch('actLogin', { username, password });
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
  },
  async actUploadAvatar({ state }, { file }) {

  },
  async actUpdateProfile({ commit, dispatch, state }, {
    file,
    nickname,
    last_name,
    first_name,
    description,
  }) {
    try {
      const token = state.token;
      const data = {
        nickname,
        last_name,
        first_name,
        description,
      }

      console.log('token', token);
      console.log('data', data);
      console.log('file', file);
    } catch(e) {

    }
  }
}
