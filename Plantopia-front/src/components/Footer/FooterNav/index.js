import React from 'react';
import { Link } from 'react-router-dom';
import FeatherIcon from 'feather-icons-react';
import footerlogo from '../../../assets/img/logo-plantopia-dark.png';

import './style.scss';

const FooterNav = () => (
  <div className="footer-assets">
    <div className="footer-logo">
      <img src={footerlogo} alt="logo plantopia" />
    </div>
    <nav className="footer-nav">
      <ul className="footer-nav-list">
        <Link
          to="/"
          alt="Accueil"
        >
          Accueil
        </Link>
        <Link
          to="/a-propos"
          alt="A propos"
        >
          A propos
        </Link>
        <a href="localhost:8000" target="_blank">Back-Office</a>
      </ul>
    </nav>
    <div className="footer-social">
      <a href="https://twitter.com/?lang=fr"><FeatherIcon icon="twitter" size={35} /></a>
      <a href="https://twitter.com/?lang=fr"><FeatherIcon icon="instagram" size={35} /></a>
      <a href="https://twitter.com/?lang=fr"><FeatherIcon icon="github" size={35} /></a>
    </div>
  </div>
);

export default FooterNav;
