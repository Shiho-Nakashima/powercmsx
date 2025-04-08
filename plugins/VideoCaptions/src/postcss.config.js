module.exports = ctx => ({
  map: false,
  parser: ctx.options.parser,
  plugins: {
    "postcss-sort-media-queries": { sort: "mobile-first" },
  },
});
