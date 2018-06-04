const merge = require('webpack-merge');
const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const common = require('./webpack.common.js');

module.exports = merge.smart(common, {
  module: {
    rules: [
      {
        test: /\.css$/,
        loader: `${MiniCssExtractPlugin.loader}!css-loader?sourceMap=true&minimize=true!resolve-url-loader`,
      },
      {
        test: /\.(scss|sass)$/,
        loader: `${MiniCssExtractPlugin.loader}!css-loader?sourceMap=true&minimize=true!resolve-url-loader!sass-loader?sourceMap=true`,
      },
    ],
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: 'css/build.css',
    }),
    new BundleAnalyzerPlugin(),
  ],
  devtool: '#source-map',
});
