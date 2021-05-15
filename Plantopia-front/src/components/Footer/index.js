// == Import npm
import React from 'react';

import FooterNav from 'src/components/Footer/FooterNav';
import FooterCopyright from 'src/components/Footer/FooterCopyright';

import './style.scss';

// == Composant
const Footer = () => (

  <footer className="footer">
    <FooterNav />
    <FooterCopyright />
  </footer>

);

// == Export
export default Footer;
