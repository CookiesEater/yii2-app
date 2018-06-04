const common = require('../../.eslintrc');

module.exports = Object.assign(common, {
  settings: {
    'import/resolver': {
      webpack: {
        config: 'webpack.common.js',
      },
    },
  },
});
