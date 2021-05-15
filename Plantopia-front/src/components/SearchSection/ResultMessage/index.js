import React from 'react';
import PropTypes from 'prop-types';

import './style.scss';

const ResultMessage = ({ content }) => (
  <div className="container">
    <p className="result-message">
      {content}
    </p>
  </div>
);

ResultMessage.propTypes = {
  content: PropTypes.string.isRequired,
};

export default ResultMessage;
