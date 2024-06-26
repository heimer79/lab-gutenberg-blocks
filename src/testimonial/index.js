const { registerBlockType } = wp.blocks;




/* import { ReactComponent as Icon } from './icon.svg'; */



registerBlockType( 'lab/testimonial', {
    title: 'Lab Testimonial',
    icon: 'format-quote',
    category: 'lab-category',
    edit: () =>
    {
        return (
            <p>Esto se ve el editor</p>
        )
    },
    save: () =>
    {
        return (
            <p>Esto se ve en el front end</p>
        )
    }
}
)