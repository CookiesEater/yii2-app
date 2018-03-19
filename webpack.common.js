const path = require('path');
const webpack = require('webpack');
require('babel-polyfill');

function resolve(dir) {
  return path.join(__dirname, dir);
}

module.exports = {
  entry: {
    backend: ['babel-polyfill', resolve('/themes/backend/assets/js/main.js'), resolve('/themes/backend/assets/scss/main.scss')],
    frontend: ['babel-polyfill', resolve('/themes/frontend/assets/js/main.js'), resolve('/themes/frontend/assets/scss/main.scss')],
  },
  output: {
    path: resolve('/web/dist'),
    publicPath: '/dist/',
    filename: '[name]/js/build.js',
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: [
          'babel-loader',
          'eslint-loader',
        ],
      },
      {
        test: /\.(png|jpg|gif)$/,
        loader: 'file-loader',
        options: {
          outputPath: 'images/',
          name: '[hash].[ext]'
        },
      },
      {
        test: /\.(otf|eot|svg|ttf|woff|woff2)$/,
        loader: 'file-loader',
        options: {
          outputPath: 'fonts/',
          name: '[hash].[ext]',
        },
      },
    ],
  },
  plugins: [
    new webpack.DefinePlugin({
      'process.env': {
        'NODE_ENV': JSON.stringify(process.env.NODE_ENV),
      },
    }),
    new webpack.ProvidePlugin({
      jQuery: 'jquery',
      $: 'jquery',
    }),
  ],
  resolve: {
    extensions: ['.js', '.json'],
    alias: {
      '@': resolve('/'),
    },
  },
  performance: {
    hints: false,
  },
};
