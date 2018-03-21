const merge = require('webpack-merge');
const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const common = require('./webpack.common.js');

module.exports = merge.smart(common, {
  module: {
    rules: [
      {
        test: /\.vue$/,
        loader: 'vue-loader',
        options: {
          loaders: {
            css: `${MiniCssExtractPlugin.loader}!css-loader?sourceMap=true&minimize=true!resolve-url-loader`,
            scss: `${MiniCssExtractPlugin.loader}!css-loader?sourceMap=true&minimize=true!resolve-url-loader!sass-loader?sourceMap=true`,
            js: 'babel-loader',
          },
        },
      },
    ],
  },
  devtool: '#source-map',
  plugins: [
    new MiniCssExtractPlugin({
      filename: 'css/build.css',
    }),
    new BundleAnalyzerPlugin(),
  ],
});
