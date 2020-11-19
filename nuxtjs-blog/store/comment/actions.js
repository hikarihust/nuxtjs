export default {
  async actFetchCommentsList({ commit }, {
    curPage = 1,
    pageSize = 2,
    parent = 0,
    post,
    exclude = [],
    ...restParams
  } = {}) {
    try {
      const response = await this.$api.get('/comments', {
        params: {
          page: curPage,
          per_page: pageSize,
          parent,
          post,
          order: 'asc',
          exclude,
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
          comments: response.data,
        }
        if (parent === 0) {
          // Fetch parent comment
          commit('setCommentsList', data);
        } else {
          data.parentId = parent;
          commit('setCommentsReply', data);
        }
      }
    } catch(e) {
      console.error("actFetchCommentsList", e.response.data.message);
    }
  },
  async actPostNewComment({ commit, rootState }, {
    post, // post id
    content,
    parent = 0
  }) {
    if (!rootState.auth.currentUser) {
      return {
        ok: false
      }
    }

    try {
      const token = rootState.auth.token;
      const author =  rootState.auth.currentUser.id;
      const data = {
        post,
        author,
        content,
        parent,
      };
      const config = {
        headers: {
          Authorization: `Bearer ${token}`,
        }
      }
      const response = await this.$api.post('/comments', data, config);

      if (response.status === 201) {
        commit('posts/increaseCommentCount', null, { root: true });
        if (parent === 0) {
          commit('pushParentComments', response.data);
        }

        return {
          ok: true,
          comment: response.data
        }
      }
    } catch (e) {
      console.error(e);
      return {
        ok: false,
        error: e.message,
      }
    }
  }
}
