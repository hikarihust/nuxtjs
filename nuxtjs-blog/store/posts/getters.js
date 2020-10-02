export default {
  getPopularList(postState) {
    const popularList = postState.popularList;
    const hashCategories = postState.hashCategories;

    return popularList.map(post => {
      const listCategoriesId = post.categories; // [20, 30, 40]
      const listCategories = listCategoriesId.map(id => {
        return hashCategories[id]
      })

      return {
        ...post,
        categories: listCategories
      }
    })
  }
}
