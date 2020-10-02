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
  },

  async actFetchPopularPost({ commit }) {
    try {
      const response = await this.$api.get('/posts', {
        params: {
          page: 1,
          per_page: 3
        }
      });

      if (response.status === 200) {
        commit('setPopularList', response.data);
      }
    } catch(e) {
      console.error("actFetchPopularPost", e.response.data.message);
    }
  },

  async actFetchCategories({ commit }) {
    try {
      const response = await this.$api.get('/categories', {
        params: {
          page: 1,
          per_page: 100,
        }
      });

      if (response.status === 200) {
        commit('setCategoriesList', response.data);
      }
    } catch(e) {
      console.error("actFetchCategories", e.response.data.message);
    }
  }
}
