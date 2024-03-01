let mix = require("laravel-mix");
// your Wordpress theme name here
var themename = "sctest"; // rename theme name
const themePath = ".";
const resources = themePath + "/src";
mix.setPublicPath(`${themePath}/assets`);

mix.options({
  processCssUrls: false, // Process/optimize relative stylesheet url()'s. Set to false, if you don't want them touched.
});

mix.sourceMaps(false, "source-map");
mix.sass(`${resources}/scss/app.scss`, `${themePath}/assets/css`);
mix.js(`${resources}/js/app.js`, `${themePath}/assets/js`);

mix.browserSync({
  proxy: "http://localhost:2000", // paste your local url
  files: [
    `${themePath}/**/*.php`,
    `${themePath}/**/*.js`,
    `${themePath}/**/*.css`,
  ],
});
