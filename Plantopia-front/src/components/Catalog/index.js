import React from 'react';
import PropTypes from 'prop-types';

import CatalogCard from 'src/components/Catalog/CatalogCard';

import './style.scss';

const Catalog = ({ plants }) => (
  <div className="catalog-list">
    {plants.reverse().slice(0, 40).map((plant) => (
      <CatalogCard key={plant.id} {...plant} />
    ))}
  </div>
);

Catalog.propTypes = {
  plants: PropTypes.arrayOf(
    PropTypes.shape({
      id: PropTypes.number.isRequired,
    }),
  ).isRequired,
  // fetchFavorites: PropTypes.func.isRequired,
};

export default Catalog;
