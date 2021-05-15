import React from 'react';
import PropTypes from 'prop-types';

import './style.scss';

const CatalogCard = ({ avatar, email, pseudo }) => {
  <div className="catalog-card">
    <img className="catalog-card-img" src={avatar} alt={pseudo} />
    <div className="catalog-card-content">
      <h2 className="catalog-card-title">{email}</h2>
      <h2 className="catalog-card-title">{pseudo}</h2>
    </div>
  </div>;
};

CatalogCard.propTypes = {
  id: PropTypes.number.isRequired,
  name: PropTypes.string.isRequired,
  picture: PropTypes.string.isRequired,
};

export default CatalogCard;
