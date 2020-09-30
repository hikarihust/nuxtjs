export default {
  actAddPosts({ commit }, item) {
    commit('addPosts', item)
  },
  actSetListPosts({ commit }, listPosts) {
    console.log("actSetListPosts", listPosts.length)
    commit('setPosts', listPosts);
  }
}
