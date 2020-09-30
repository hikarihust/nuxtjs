export default {
  addPosts(state, item) {
    state.list.push(item);
  },
  setPosts(state, listItems) {
    state.postsList = listItems;
  }
}
