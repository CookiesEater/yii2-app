const merge = require('webpack-merge');
const common = require('./webpack.common.js');

module.exports = merge(common, {
  module: {
    rules: [
      {
        test: /\.vue$/,
        loader: 'vue-loader',
        options: {
          loaders: {
            css: 'vue-style-loader!css-loader?sourceMap=true!resolve-url-loader',
            scss: 'vue-style-loader!css-loader?sourceMap=true!resolve-url-loader!sass-loader?sourceMap=true',
          },
        },
      },
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
  devServer: {
    historyApiFallback: true,
    noInfo: true,
    overlay: true,
    proxy: {
      '/': {
        target: process.env.HOT_RELOAD_PROXY_TARGET,
        headers: {
          host: process.env.HOT_RELOAD_PROXY_HOST,
        },
      },
    },
  },
  devtool: '#eval-source-map',
});
