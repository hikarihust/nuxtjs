export default {
  async actFetchListTags({ commit }, params) {
    try {
      const response = await this.$api.get('/tags', {
        params
      });

      if(response.status === 200 && response.data.length) {
        return {
          ok: true,
          data: response.data
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
