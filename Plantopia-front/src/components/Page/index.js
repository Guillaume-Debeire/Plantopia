import React from 'react';
import PropTypes from 'prop-types';
import Footer from 'src/components/Footer';
import Menu from 'src/components/Menu';
// console.log(data);
import './style.scss';

const Page = ({ children }) => (
  <main className="page">
    <Menu />
    {children}
    <Footer />
  </main>
);

Page.propTypes = {
  children: PropTypes.node.isRequired,
};

export default Page;
