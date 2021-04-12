import React from 'react';
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { serverSideRender } = wp;
const { TextControl } = wp.components;

registerBlockType( 'myplugin/basic', {
  title: __( 'Basic' ),
  description: __( 'A basic block' ),
  icon: 'smiley',
  category: 'widgets',
  attributes: {
    title: {
      type: 'string',
      default: 'null',
    },
    content: {
      type: 'string',
    },
  },
  edit: ( props ) => {
    function updateContent( event ) {
      props.setAttributes( { content: event.target.value });
    }
    return ([
      <TextControl
        label='Name'
        value={ props.attributes.content }
        placeholer='name'
        required
        onChange={ ( value ) => props.setAttributes({content: value}) }
      />,
    ]);
  },
  save: ( props ) => {
    // return React.createElement(
    //   "div",
    //   null,
    //   React.createElement("h3", null, "BlockStart"),
    //   React.createElement(
    //     "p",
    //     null,
    //     props.attributes.content
    //   )
    // );
    return null;
  }
});
