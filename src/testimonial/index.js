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
            <p>Esto se ve en el editor</p>
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
