
export default {
  isLogin(authState) {
    if (authState.currentUser) {
      return true;
    }
    return false;
  },
  avatar(authState) {
    if (!authState.currentUser) {
      return '';
    }

    if (authState.currentUser.simple_local_avatar) {
      return authState.currentUser.simple_local_avatar.full;
    }

    const num = (authState.currentUser.id % 4) + 1;
    return `/assets/images/avatar${num}.jpg`;
  }
}
