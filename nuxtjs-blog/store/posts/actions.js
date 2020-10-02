export default {
  async actFetchLatestPost({ commit }) {
    try {
      const response = await this.$api.get('/posts', {
        params: {
          page: 1,
          per_page: 3
        }
      });

      if (response.status === 200) {
        commit('setLatestList', response.data);
      }
      return {
        ok: true
      }
    } catch(e) {
      console.error("actFetchLatestPost", e.response.data.message);
      return {
        ok: false,
        data: e.response.data,
        error: e.response.data.message
      }
    }
  }
}
