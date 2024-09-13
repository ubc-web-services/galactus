module.exports = {
  plugins: [
    require('postcss-preset-env')({
      stage: 1, // Enables future CSS features at stage 1
      features: {
        'nesting-rules': true // Enable CSS nesting (similar to what SASS offers)
      }
    }),
    require("postcss-prefix-selector")({
      prefix: ".ck-content",
      exclude: ["body", "html", ":root"],
      includeFiles: "src/css/ckeditor5.css",
    }),
    require('autoprefixer') // Automatically adds vendor prefixes based on browser support
  ],
};
