export const state = () => ({
  counter: 0
})

export const mutations = {
  increment (state) {
    state.counter++
  }
}

export const actions = {
  async nuxtServerInit (vuxContext, nuxtContext) {
    console.log(Object.keys(vuxContext));
    console.log(Object.keys(nuxtContext));
  },
  increment (context) {
    context.commit('increment')
  }
}
