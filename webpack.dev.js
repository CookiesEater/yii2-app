const merge = require('webpack-merge');
const common = require('./webpack.common.js');

module.exports = merge(common, {
  module: {
    rules: [
      {
        test: /\.(sass|scss)$/,
        use: [
          'style-loader?sourceMap=true',
          'css-loader?sourceMap=true',
          'resolve-url-loader',
          'sass-loader?sourceMap=true',
        ],
      },
    ],
  },
  devtool: '#eval-source-map',
});
