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
  setCommentsReply(state, { curPage, wpTotal, wpTotalPages, comments, parentId }) {
    const key = 'reply-parent-' + parentId;

    const data = {
      curPage,
      wpTotal,
      wpTotalPages,
      commentsReply: comments,
    }

    if (curPage > 1) {
      data.commentsReply = [
        ...state.hashCommentsReplyPaging[key].commentsReply,
        ...data.commentsReply,
      ];
    }

    state.hashCommentsReplyPaging = {
      ...state.hashCommentsReplyPaging,
      [key]: data,
    }
  },
}
