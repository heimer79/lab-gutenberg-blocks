const path = require( 'path' );

module.exports = {
    entry: './src/index.js',
    output: {
        path: path.resolve( __dirname, 'build' ),
        filename: 'index.js'
    },
    module: {
        rules: [
            {
                test: /\.(js|jsx)$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader'
                }
            },
            {
                test: /\.svg$/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: '[name].[ext]',
                            outputPath: 'images/', // Opcional: cambiar la ruta de salida
                        }
                    }
                ]
            }

        ]
    },
    resolve: {
        extensions: [ '.js', '.jsx', '.svg' ] // Agregar extensión SVG a las resoluciones
    }
};
