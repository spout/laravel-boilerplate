/* global require */
/* global __dirname */

var webpack = require('webpack');
var ExtractTextPlugin = require("extract-text-webpack-plugin");

module.exports = {
    entry: {
        app: __dirname + "/resources/assets/js/app.js",
        admin: __dirname + "/resources/assets/js/admin.js"
    },
    output: {
        path: __dirname + '/public/build',
        filename: "[name].js",
        chunkFilename: "[id].js"
    },
    module: {
        loaders: [
            {
                test: /\.css$/,
                loader: ExtractTextPlugin.extract("style-loader", "css-loader")
            },
            {
                test: /\.scss$/,
                loader: ExtractTextPlugin.extract("style", "css!sass")
            },
            {
                test: /\.woff(\?v=\d+\.\d+\.\d+)?$/,
                loader: "url?limit=10000&mimetype=application/font-woff"
            },
            {
                test: /\.woff2(\?v=\d+\.\d+\.\d+)?$/,
                loader: "url?limit=10000&mimetype=application/font-woff"
            },
            {
                test: /\.ttf(\?v=\d+\.\d+\.\d+)?$/,
                loader: "url?limit=10000&mimetype=application/octet-stream"
            },
            {
                test: /\.eot(\?v=\d+\.\d+\.\d+)?$/,
                loader: "file"
            },
            {
                test: /\.svg(\?v=\d+\.\d+\.\d+)?$/,
                loader: "url?limit=10000&mimetype=image/svg+xml"
            },
            {
                test: /\.(ico|jpe?g|png|gif)$/,
                loader: "file"
            }
        ]
    },
    plugins: [
        new ExtractTextPlugin("[name].css")
    ]
};