const path = require('path')

module.exports = {
  mode: process.env.NODE_ENV || 'development',
  entry: {},
  output: {
    path: path.resolve(__dirname, './blocks/dist'),
    filename: '[name].js',
  },
  module: {
    rules: [
      {
        test: /\.jsx?$/,
        loader: 'babel-loader',
        exclude: /node_modules/,
      },
    ],
  },
}
