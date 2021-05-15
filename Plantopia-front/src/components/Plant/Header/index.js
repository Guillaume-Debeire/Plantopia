import React from 'react';
import PropTypes from 'prop-types';
import Interactions from '../Interactions';
import './style.scss';

const Infos = ({
  name, picture, specification,
}) => (
  <>
    <ul className="breadcrumb">
      <li><a href="/">Accueil</a></li>
      <li>Plantes</li>
      <li>{name}</li>
    </ul>
    <header className="plant-header">
      <figure className="plant-header-left">
        <img
          src={`http://ec2-100-25-146-45.compute-1.amazonaws.com/images/picture/${picture}`}
          alt={name}
          className="plant-header-left-img"
        />
      </figure>
      <figcaption className="plant-header-right">
        <h1 className="plant-header-right-title">
          {name}
        </h1>
        <p className="plant-header-right-specification">
          {specification}
        </p>
        <Interactions />
      </figcaption>
    </header>
  </>
);

Infos.propTypes = {
  name: PropTypes.string.isRequired,
  picture: PropTypes.string.isRequired,
  specification: PropTypes.string.isRequired,
};

export default Infos;
