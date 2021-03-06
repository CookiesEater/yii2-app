const path = require('path');
const webpack = require('webpack');
const { VueLoaderPlugin } = require('vue-loader');
require('babel-polyfill');

function resolve(dir) {
  return path.join(__dirname, dir);
}

module.exports = {
  entry: ['babel-polyfill', resolve('src/main.js')],
  output: {
    path: resolve('../app/web/dist/backend/'),
    publicPath: '/dist/backend/',
    filename: 'js/build.js',
  },
  module: {
    rules: [
      {
        enforce: 'pre',
        test: /\.(js|vue)$/,
        exclude: /node_modules/,
        loader: 'eslint-loader',
      },
      {
        test: /\.vue$/,
        loader: 'vue-loader',
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
        NODE_ENV: JSON.stringify(process.env.NODE_ENV),
        AXIOS_BASE_URL: JSON.stringify(process.env.AXIOS_BASE_URL),
      },
    }),
    new VueLoaderPlugin(),
  ],
  resolve: {
    extensions: ['.js', '.vue', '.json'],
    alias: {
      'vue$': 'vue/dist/vue.esm.js',
      '@': resolve('src'),
    },
  },
  performance: {
    hints: false,
  },
};
