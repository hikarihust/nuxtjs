export default {
  setCurrentUser(state, { token, user }) {
    state.token = token;
    state.currentUser = user;
  }
}
