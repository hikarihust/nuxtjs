export default {
  async actGetCategoryBySlug({ commit }, { slug = '' } = {}) {
    try {
      const response = await this.$api.get('/categories', {
        params: {
          slug
        }
      });

      if(response.status === 200 && response.data.length) {
        return {
          ok: true,
          data: response.data[0]
        }
      }

    } catch(e) {
      return {
        ok: false,
        error: e.message
      }
    }
  }
}
