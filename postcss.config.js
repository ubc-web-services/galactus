module.exports = {
  plugins: [
    require("postcss-import"),
    require("postcss-simple-vars"),
    require("postcss-nesting"),
    require("postcss-prefix-selector")({
      prefix: ".ck-content",
      exclude: ["body", "html", ":root"],
      includeFiles: "sass/ckeditor5.scss",
    }),
    require("autoprefixer"),
    //...(process.env.NODE_ENV === "production" ? [require("cssnano")] : []),
  ],
};
