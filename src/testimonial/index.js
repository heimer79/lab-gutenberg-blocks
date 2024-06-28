// Importar las dependencias necesarias de @wordpress/blocks y @wordpress/element
const { registerBlockType } = wp.blocks;
const { createElement } = wp.element;

// Comentar si usas un ícono SVG personalizado
// import { ReactComponent as Icon } from './icon.svg'; 

// Registrar el bloque
registerBlockType( 'lab/testimonial', {
    title: 'Lab Testimonial',
    icon: 'format-quote', // Cambia esto si usas un ícono personalizado: icon: <Icon />
    category: 'lab-category',
    edit: () =>
    {
        // Asegúrate de que tu entorno de compilación está configurado para interpretar JSX
        return (
            <div className="testimonial-block">
                <blockquote>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Animi voluptatem reiciendis id placeat libero. Explicabo nulla pariatur iure repudiandae officiis accusamus deleniti provident possimus omnis. Ipsum ipsa placeat recusandae consequatur. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem qui doloremque culpa molestiae.
                </blockquote>

                <div className="testimonial-info">
                    <img src="img/testimonial.jpg" />
                    <p>- Alice White <span>WebDev CEO</span></p>
                </div>
            </div>
        );
    },
    save: () =>
    {
        // Asegúrate de que tu entorno de compilación está configurado para interpretar JSX
        return (
            <p>Esto se ve en el front end</p>
        );
    }
} );
