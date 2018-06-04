const merge = require('webpack-merge');
const common = require('./webpack.common.js');

module.exports = merge(common, {
  module: {
    rules: [
      {
        test: /\.css$/,
        loader: 'style-loader!css-loader?sourceMap=true!resolve-url-loader',
      },
      {
        test: /\.(scss|sass)$/,
        loader: 'style-loader!css-loader?sourceMap=true!resolve-url-loader!sass-loader?sourceMap=true',
      },
    ],
  },
  devtool: '#eval-source-map',
});
