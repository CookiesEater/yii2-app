const path = require('path');
const webpack = require('webpack');
require('babel-polyfill');

function resolve(dir) {
  return path.join(__dirname, dir);
}

module.exports = {
  entry: ['babel-polyfill', resolve('assets/js/main.js'), resolve('assets/scss/main.scss')],
  output: {
    path: resolve('../../web/dist/frontend/'),
    publicPath: '/dist/frontend/',
    filename: 'js/build.js',
  },
  module: {
    rules: [
      {
        enforce: 'pre',
        test: /\.js$/,
        loader: 'eslint-loader',
        exclude: /node_modules/,
      },
      {
        test: /\.js$/,
        exclude: /node_modules/,
        loader: 'babel-loader',
      },
      {
        test: /\.(png|jpg|gif)$/,
        loader: 'file-loader',
        options: {
          outputPath: 'images/',
          name: '[name].[ext]?[hash]',
        },
      },
      {
        test: /\.(otf|eot|svg|ttf|woff|woff2)$/,
        loader: 'file-loader',
        options: {
          outputPath: 'fonts/',
          name: '[name].[ext]?[hash]',
        },
      },
    ],
  },
  plugins: [
    new webpack.ContextReplacementPlugin(/moment[\/\\]locale$/, /ru/), // Чтобы для moment загружалась только русская локализация, иначе в сборку попадут все что есть
    new webpack.DefinePlugin({
      'process.env': {
        'NODE_ENV': JSON.stringify(process.env.NODE_ENV),
      },
    }),
  ],
  resolve: {
    extensions: ['.js', '.json'],
    alias: {
      '@': resolve('assets'),
    },
  },
  performance: {
    hints: false,
  },
};
