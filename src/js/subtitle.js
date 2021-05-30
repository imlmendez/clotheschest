( function( wp ) {
    var el = wp.element.createElement;
    var registerBlockType = wp.blocks.registerBlockType;
    var TextField = wp.components.TextControl;

    registerBlockType("myguten/meta-block", {
        title: "Subtítulo",
        icon: "smiley",
        category: "common",
        multiple: false,

        attributes: {
            blockValue: {
                type: "string",
                source: "meta",
                meta: "page_subtitle"
            }
        },

        edit: function(props) {
            var className = props.className;
            var setAttributes = props.setAttributes;

            function updateBlockValue( blockValue ) {
                setAttributes({ blockValue });
            }

            return el(
                "div",
                { className: className },
                el( TextField, {
                    label: "Subtítulo",
                    value: props.attributes.blockValue,
                    onChange: updateBlockValue
                } )
            );
        },

        // No information saved to the block
        // Data is saved to post meta via attributes
        save: function() {
            return null;
        }
    });




})( window.wp );