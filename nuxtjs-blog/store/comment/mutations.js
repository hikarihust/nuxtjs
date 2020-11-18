export default {
  setCommentsList(state, { curPage, wpTotal, wpTotalPages, comments }) {
    const data = {
      curPage,
      wpTotal,
      wpTotalPages,
      comments,
    }

    if (curPage > 1) {
      data.comments = [
        ...state.commentsPaging.comments,
        ...comments,
      ];
    }

    state.commentsPaging = data;
  },
}
