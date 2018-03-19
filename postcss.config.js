const autoprefixer = require('autoprefixer');
const csso = require('postcss-csso');

module.exports = {
  plugins: [
    autoprefixer({
      browsers: ['>= 1%'],
    }),
    csso(),
  ],
};
