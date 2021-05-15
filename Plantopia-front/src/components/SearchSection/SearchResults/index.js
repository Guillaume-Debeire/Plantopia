import React from 'react';
import PropTypes from 'prop-types';

import Result from './Result';

import './style.scss';

const SearchResults = ({ listOfTreflePlants }) => (
  <div className="catalog-list container">
    {listOfTreflePlants.map((currentTreflePlant) => (
      <Result key={currentTreflePlant.id} {...currentTreflePlant} />
    ))}
  </div>
);

SearchResults.propTypes = {
  listOfTreflePlants: PropTypes.arrayOf(
    PropTypes.shape({
      id: PropTypes.number.isRequired,
    }),
  ).isRequired,
};

export default SearchResults;
