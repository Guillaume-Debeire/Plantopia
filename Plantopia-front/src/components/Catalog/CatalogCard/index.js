import React from 'react';
import PropTypes from 'prop-types';
import { Link } from 'react-router-dom';
// import slugify from 'slugify';
import { getSlugByTitle } from 'src/utils';

import './style.scss';

const CatalogCard = ({ id, name, picture }) => {
  const slug = getSlugByTitle(name, {
    lower: true,
  });
  return (
    <article className="catalog-card">
      <img className="catalog-card-img" src={`http://ec2-100-25-146-45.compute-1.amazonaws.com/images/picture/${picture}`} alt={name} />
      <div className="catalog-card-middle">
        <Link
          key={id}
          to={`/plant/${slug}`}
          alt="En savoir plus"
        >
          <div className="catalog-card-cta">
            +
          </div>
        </Link>
      </div>
      <div className="catalog-card-content">
        <h2 className="catalog-card-title">{name}</h2>
      </div>
    </article>
  );
};

CatalogCard.propTypes = {
  id: PropTypes.number.isRequired,
  name: PropTypes.string.isRequired,
  picture: PropTypes.string.isRequired,
};

export default CatalogCard;
