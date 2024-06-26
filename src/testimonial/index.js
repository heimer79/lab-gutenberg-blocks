const { registerBlockType } = wp.blocks;




/* import { ReactComponent as Icon } from './icon.svg'; */



registerBlockType( 'lab/testimonial', {
    title: 'Lab Testimonial',
    icon: 'format-quote',
    category: 'common',
    attributes: {
        content: {
            type: 'string',
            source: 'html',
            selector: 'p',
        }
    }
}
)