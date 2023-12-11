wp.blocks.registerBlockType('events/events-box', {
  title: 'Events Details',
  icon: 'smiley',
  category: 'common',
  attributes: {
    eventName: { type: 'string' },
    eventDescription: { type: 'string' },
    eventTime: { type: 'string' },
    eventLocation: { type: 'string' },
    speakerName: { type: 'string' },
    eventImage: { type: 'string', default: null },
  },

  edit: function(props) {
    function updateAttribute(attribute, value) {
      props.setAttributes({ [attribute]: value });
    }

    function onSelectImage(img) {
      updateAttribute('eventImage', img.sizes.full.url);
    }

    return wp.element.createElement(
      'div',
      { className: 'event-details' },
      wp.element.createElement(
        'h3',
        null,
        'Event Details'
      ),
      wp.element.createElement(
        'div',
        { className: 'event-fields' },

        wp.element.createElement(
          'div',
          { className: 'label-input' },
          wp.element.createElement(
            'label',
            { htmlFor: 'eventName' },
            'Event Name:'
          ),
          wp.element.createElement(
            'input',
            { type: 'text', id: 'eventName', value: props.attributes.eventName, onChange: (event) => updateAttribute('eventName', event.target.value) }
          )
        ),
        wp.element.createElement(
          'div',
          { className: 'label-input' },
          wp.element.createElement(
            'label',
            { htmlFor: 'eventDescription' },
            'Event Description:'
          ),
          wp.element.createElement(
            'textarea',
            { id: 'eventDescription', value: props.attributes.eventDescription, onChange: (event) => updateAttribute('eventDescription', event.target.value) }
          )
        ),
        wp.element.createElement(
          'div',
          { className: 'label-input' },
          wp.element.createElement(
            'label',
            { htmlFor: 'eventTime' },
            'Event Time:'
          ),
          wp.element.createElement(
            'input',
            { type: 'text', id: 'eventTime', value: props.attributes.eventTime, onChange: (event) => updateAttribute('eventTime', event.target.value) }
          )
        ),
        wp.element.createElement(
          'div',
          { className: 'label-input' },
          wp.element.createElement(
            'label',
            { htmlFor: 'eventLocation' },
            'Event Location:'
          ),
          wp.element.createElement(
            'input',
            { type: 'text', id: 'eventLocation', value: props.attributes.eventLocation, onChange: (event) => updateAttribute('eventLocation', event.target.value) }
          )
        ),
        wp.element.createElement(
          'div',
          { className: 'label-input' },
          wp.element.createElement(
            'label',
            { htmlFor: 'speakerName' },
            'Speaker Name:'
          ),
          wp.element.createElement(
            'input',
            { type: 'text', id: 'speakerName', value: props.attributes.speakerName, onChange: (event) => updateAttribute('speakerName', event.target.value) }
          )
        ),
        wp.element.createElement(
          'div',
          { className: 'label-input' },
          wp.element.createElement(
            'label',
            { htmlFor: 'eventImage' },
            'Event Image:'
          ),
          wp.element.createElement(
            'div',
            { className: 'event-image' },
            props.attributes.eventImage && (
              wp.element.createElement(
                'img',
                { src: props.attributes.eventImage, alt: 'Event' }
              )
            ),
            wp.element.createElement(
              wp.blockEditor.MediaUpload,
              {
                onSelect: onSelectImage,
                type: 'image',
                value: props.attributes.eventImage,
                render: ({ open }) => (
                  wp.element.createElement(
                    'button',
                    { onClick: open },
                    'Upload/Edit Image'
                  )
                )
              }
            )
          )
        )
      )
    );
  },
  
save: function(props) {
  return wp.element.createElement(
    'section ',
    { className: 'about-section', id: 'about' },
    wp.element.createElement(
      'div',
      { className: 'container' },
      wp.element.createElement(
        'div',
        { className: 'row clearfix' },
        // Content Column
        wp.element.createElement(
          'div',
          { className: 'content-column left' },
          wp.element.createElement(
            'div',
            { className: 'inner-column' },
            wp.element.createElement(
              'div',
              { className: 'sec-title' },
              wp.element.createElement(
                'div',
                { className: 'title' },
                props.attributes.eventName // Event Name
              )
            ),
            wp.element.createElement(
              'div',
              { className: 'text' },
              props.attributes.eventDescription // Event Description
            ),
            wp.element.createElement(
              'div',
              { className: 'detail' },
              wp.element.createElement(
                'span',
                { className: 'theme_color' },
                wp.element.createElement('i', { className: 'fa-solid fa-clock' }),
                props.attributes.eventTime // Event Time
              ),
              wp.element.createElement(
                'span',
                { className: 'theme_color' },
                wp.element.createElement('i', { className: 'fa-solid fa-location-dot' }),
                props.attributes.eventLocation // Event Location
              ),
              wp.element.createElement(
                'span',
                { className: 'theme_color' },
                wp.element.createElement('i', { className: 'fa-solid fa-microphone-lines' }),
                props.attributes.speakerName // Speaker Name
              )
            ),
            wp.element.createElement(
              'a',
              { href: 'tel:+35677369146', className: 'theme-btn btn-style-three' },
              'Book Now'
            )
          )
        ),
        // Image Column
        wp.element.createElement(
          'div',
          { className: 'image-column right' },
          wp.element.createElement(
            'div',
            { className: 'inner-column', 'data-wow-delay': '0ms', 'data-wow-duration': '1500ms' },
            wp.element.createElement(
              'div',
              { className: 'image' },
              wp.element.createElement('img', { src: props.attributes.eventImage, alt: '' }), // Event Image
              wp.element.createElement('div', { className: 'overlay-box' })
            )
          )
        )
      )
    )
  );
}

});
