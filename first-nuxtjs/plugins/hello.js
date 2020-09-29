function hello(message) {
  console.log("[hello function] global", message)
}

export default function(ctx, inject) {
  inject('abc', hello);
}
