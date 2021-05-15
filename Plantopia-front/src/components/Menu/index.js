import React from 'react';
import { Link, NavLink } from 'react-router-dom';
import LoginForm from 'src/containers/LoginForm';
import PropTypes from 'prop-types';

import logo from '../../assets/img/logo-plantopia-light.png';
import './style.scss';

const Menu = () => (
  <>
    <header className="main-header">
      <div className="container">
        <h1 className="logo">
          <Link
            to="/"
            alt="Home"
          >
            <img src={logo} width="80" height="80" alt="plantopia logotype" />
          </Link>
          Plantopia
        </h1>
        <nav className="main-nav">
          <ul className="main-nav-list">
            <li>
              <NavLink
                to="/search"
                alt="Recherche de Plantes"
                exact
                activeStyle={{ color:'#d06d13' }}
              >
                Explorer la jungle
              </NavLink>
            </li>
          </ul>
        </nav>
        <div className="loginform-menu">
          <LoginForm />
        </div>
      </div>
    </header>
  </>
);
// Adding conditionnal logged for menu items
// Menu.propTypes = {
//   isLogged: PropTypes.bool.isRequired,
// };

export default Menu;
