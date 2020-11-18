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
          per_page: 3,
          orderby: 'post_views'
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
  },

  async actFetchArticlesList({ commit }, { curPage = 1, pageSize = 2, ...restParams } = {}) {
    try {
      const response = await this.$api.get('/posts', {
        params: {
          page: curPage,
          per_page: pageSize,
          ...restParams
        }
      });

      if (response.status === 200) {
        const headers = response.headers;
        const wpTotal = parseInt(headers['x-wp-total']);
        const wpTotalPages = parseInt(headers['x-wp-totalpages']);

        const data = {
          curPage,
          wpTotal,
          wpTotalPages,
          articles: response.data,
        }
        commit('setArticlesList', data);
      }
    } catch(e) {
      console.error("actFetchArticlesList", e.response.data.message);
    }
  },

  async actFetchArticleBySlug({ commit }, { slug }) {
    try {
      const response = await this.$api.get('/posts', {
        params: {
          slug
        }
      })

      if (response.status === 200 && response.data.length) {
        const post = response.data[0];
        commit('setPostDetail', post);
        return {
          ok: true,
          post
        }
      }

      return {
        ok: false
      }
    } catch(e) {
      console.error("actFetchArticlesList", e.response.data.message);
      return {
        ok: false
      }
    }
  },
}
