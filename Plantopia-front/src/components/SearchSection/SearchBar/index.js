import React from 'react';
import PropTypes from 'prop-types';

import './style.scss';

const SearchBar = ({ value, changeValue }) => (
  <div className="searchform">
    <form
      className="searchform-field"
      onSubmit
    >
      <input
        className="searchform-field-input"
        name="search"
        placeholder="Recherche"
        value={value}
        onChange={(event) => {
          changeValue(event.target.value);
        }}
      />
    </form>
  </div>
);

SearchBar.propTypes = {
  value: PropTypes.string.isRequired,
  changeValue: PropTypes.func.isRequired,
};

export default SearchBar;
