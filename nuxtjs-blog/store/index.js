export const state = () => {
  return {
    appMainMenus: {
      items: []
    }
  }
}

export const mutations = {
  setAppMainMenus(state, data) {
    state.appMainMenus = data;
  }
}

export const actions = {
  async nuxtServerInit({ dispatch }) {
    await Promise.all([
      dispatch('posts/actFetchCategories'),
      dispatch('actFetchMainMenus'),
    ])
  },
  async actFetchMainMenus({ commit }) {
    try {
      const response = await this.$wpApi.get('/menus/v1/menus/main-menu');

      if (response.status === 200) {
        commit('setAppMainMenus', response.data);
      }
    } catch(e) {
      console.error("actFetchMainMenus", e.response.data.message);
    }
  }
}
