export default {
  setLatestList(state, data) {
    state.latestList = data;
  },

  setPopularList(state, data) {
    state.popularList = data;
  },

  setCategoriesList(state, categories) {
    let hashCategories = {};
    categories.forEach((category) => {
      const categoryId = category.id;
      hashCategories[categoryId] = category;
    })
    state.hashCategories = hashCategories;
  }
}
