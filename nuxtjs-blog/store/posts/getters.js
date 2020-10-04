import { mapPostCategories } from '@/helpers';


export default {
  getPopularList(postState) {
    const popularList = postState.popularList;
    const hashCategories = postState.hashCategories;

    return popularList.map(post => mapPostCategories(post, hashCategories));
  },
  getArticleList(postState) {
    const hashCategories = postState.hashCategories;
    return postState.articlesPaging.articles.map(post => mapPostCategories(post, hashCategories));
  }
}
