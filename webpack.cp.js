const Path = require('path');
const WebpackCleanupPlugin = require('webpack-cleanup-plugin');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const webpack = require('webpack');
const WebpackNotifierPlugin = require('webpack-notifier');
const WebpackAssetsManifest = require('webpack-assets-manifest');

const env = process.env.NODE_ENV;

module.exports = {
  mode: env,
  devtool: env == 'development' ? 'source-map' : false,
  entry: {
    cp: Path.resolve(__dirname, 'src/assets/src/cp.js')
  },
  output: {
    path: Path.resolve(__dirname, 'src/assets/dist/cp')
  },
  optimization: {
    moduleIds: 'hashed',
    splitChunks: {
      cacheGroups: {
        vendor: {
          test: /[\\/]node_modules[\\/]/,
          chunks: 'all',
          filename: '[name].js'
        }
      }
    }
  },
  plugins: [
    new WebpackAssetsManifest(),
    new MiniCssExtractPlugin({
      filename: '[name].css',
      chunkFilename: '[name].css',
    }),
    new WebpackNotifierPlugin(),
    new WebpackCleanupPlugin()
  ],
  module: {
    rules: [
      {
        test: /\.mjs$/,
        include: /node_modules/,
        type: 'javascript/auto'
      },
      {
        test: /\.(jpg|png|gif|jpeg)$/,
        loader: 'image-webpack-loader',
        enforce: 'pre',
        options: {
          webp: {
            quality: 100
          }
        }
      },
      {
        test: /\.woff(\?v=\d+\.\d+\.\d+)?$/,
        loader: "url-loader?limit=10000&mimetype=application/font-woff&name=[path][name].[ext]"
      }, {
        test: /\.woff2(\?v=\d+\.\d+\.\d+)?$/,
        loader: "url-loader?limit=10000&mimetype=application/font-woff&name=[path][name].[ext]"
      }, {
        test: /\.ttf(\?v=\d+\.\d+\.\d+)?$/,
        loader: "url-loader?limit=10000&mimetype=application/octet-stream&name=[path][name].[ext]"
      }, {
        test: /\.eot(\?v=\d+\.\d+\.\d+)?$/,
        loader: "file-loader?name=[path][name].[ext]"
      }, {
        test: /\.svg(\?v=\d+\.\d+\.\d+)?$/,
        loader: "url-loader?limit=10000&mimetype=image/svg+xml&name=[path][name].[ext]"
      }, {
        test: /\.(ico|jpg|jpeg|png|gif)(\?.*)?$/,
        loader: 'url-loader?name=[path][name].[ext]&limit=10000'
      }, {
        test: /\.js$/,
        exclude: /node_modules/,
        enforce: 'pre',
        loader: 'eslint-loader',
        options: {
          emitWarning: false
        }
      }, {
        test: /\.js$/,
        exclude: /node_modules/,
        loader: 'babel-loader'
      }, {
        test: /\.(css|scss)$/,
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader: 'css-loader',
            options: {
              sourceMap: (env == 'development')
            }
          },
          {
            loader: 'sass-loader',
            options: {
              sourceMap: (env == 'development'),
              sassOptions: {
                outputStyle: 'expanded'
              }
            }
          }
        ]
      }
    ]
  }
}