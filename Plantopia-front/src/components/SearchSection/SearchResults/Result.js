/* eslint-disable camelcase */
import React from 'react';
import PropTypes from 'prop-types';

import FeatherIcon from 'feather-icons-react';
import './style.scss';

const SearchResults = ({ common_name, family, year, scientific_name }) => (
  <article className="trefle-card">
    <div className="trefle-card-content">
      <h2 className="trefle-card-title">{common_name}</h2>
      <h3 className="trefle-card-subtitle orange"><FeatherIcon className="trefle-card-icon orange nomargin" icon="folder" size={12} /> {family}</h3>
      <div className="trefle-card-specs">
        <FeatherIcon className="trefle-card-icon green-light" icon="tag" size={12} />
        <span className="trefle-card-scientificname green-light">{scientific_name}</span>
        <FeatherIcon className="trefle-card-icon green" icon="clock" size={12} />
        <span className="trefle-card-year green">{year}</span>
      </div>
    </div>
  </article>
);

SearchResults.propTypes = {
  common_name: PropTypes.string.isRequired,
  family: PropTypes.string.isRequired,
  year: PropTypes.number.isRequired,
  scientific_name: PropTypes.string.isRequired,
};

export default SearchResults;
