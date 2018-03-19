const merge = require('webpack-merge');
const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const common = require('./webpack.common.js');

module.exports = merge(common, {
  module: {
    rules: [
      {
        test: /\.(sass|scss)$/,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader?sourceMap=true',
          'postcss-loader?sourceMap=true',
          'resolve-url-loader',
          'sass-loader?sourceMap=true',
        ],
      },
    ],
  },
  devtool: '#source-map',
  plugins: [
    new MiniCssExtractPlugin({
      filename: '[name]/css/build.css',
    }),
    new BundleAnalyzerPlugin(),
  ],
});
