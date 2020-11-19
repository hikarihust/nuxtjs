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
  }
}
