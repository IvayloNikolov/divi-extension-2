// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';


class BackgroundIdeas extends Component {

  static slug = 'bifw_background_ideas';

  render() {
    const Content = this.props.content;

    return (
      <h1>
        <Content/>
      </h1>
    );
  }
}

export default BackgroundIdeas;
