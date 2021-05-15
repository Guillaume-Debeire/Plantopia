import React from 'react';
import PropTypes from 'prop-types';

import SearchBar from '../SearchBar';

import './style.scss';

const Header = ({ value, changeValue }) => (
  <div className="search-section-bg">
    <div className="container">
      <h2 className="search-section-title light ">Explorez la jungle</h2>
      <p className="search-section-p light">Utilisez la barre de recherche pour trouver une plante et en savoir plus sur elle</p>
      <SearchBar value={value} changeValue={changeValue} />
    </div>
  </div>
);

Header.propTypes = {
  value: PropTypes.string.isRequired,
  changeValue: PropTypes.func.isRequired,
};

export default Header;
