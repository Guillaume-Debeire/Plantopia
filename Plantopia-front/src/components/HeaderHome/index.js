// == Import npm
import React from 'react';

import SearchSection from '../SearchSection';
import Menu from '../Menu';
import Burger from '../BurgerMenu';

import './style.scss';

// == Composant
const HeaderHome = () => (

  <header className="header-home">
    <Menu />
    <SearchSection />
    <Burger />
  </header>

);

// == Export
export default HeaderHome;
