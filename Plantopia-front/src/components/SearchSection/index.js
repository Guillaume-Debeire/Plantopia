import React, { useState, useEffect } from 'react';
import trefle from 'src/data';
import axios from 'axios';

import Header from './Header';
import ResultMessage from './ResultMessage';
import SearchResults from './SearchResults';

import './style.scss';

// console.log(trefle.data);
const SearchSection = () => {
  const [search, setSearch] = useState('');
  useEffect (() => {
    fetch('https://trefle.io/api/auth/claim?token=jcB5q83VRMGNGhScytfotAYQNnwWtuZ_hNnHcg_BVmY&origin=localhost:8010&ip=52.47.119.214', {
        method: 'post',
        headers: { 
          'Content-Type': 'application/json',
          'Authorization': 'Bearer '
        }
      })
      .then((response) => {
       console.log('ça fonctionne pour token', response.json);
      })
  },[])
  // console.log('cha fonctionne', search);
  /* ***
     *** PREMIER TEST JWT
     ***
  */
// The parameters for our POST request


  return (
    <section className="search-section">
      <Header value={search} changeValue={setSearch} />
      {/* <button type="button" onClick={doSearch}>Rechercher </button> */}
      <div className="bg-grey">
        <ResultMessage content={`La recherche à donné ${trefle.meta.total} résultats`} />
        <SearchResults listOfTreflePlants={trefle.data} />
      </div>
    </section>
  );
};

export default SearchSection;
