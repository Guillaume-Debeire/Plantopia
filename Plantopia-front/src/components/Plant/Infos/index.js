import React from 'react';
import PropTypes from 'prop-types';
import FeatherIcon from 'feather-icons-react';

import './style.scss';

const Infos = ({
  age, watering, light, cut, fertilization, repotting,
}) => (
  <section className="plant-infos">
    {/* <div className="plant-infos-card">
      <FeatherIcon className="plant-infos-card-icon" icon="calendar" size={60} />
      <p className="plant-infos-card-text">{age}</p>
    </div> */}
    {/* <div className="plant-infos-card">
      <FeatherIcon className="plant-infos-card-icon green" icon="droplet" size={60} />
      <p className="plant-infos-card-text green">{watering}</p>
    </div> */}
    <div className="plant-infos-card">
      <FeatherIcon className="plant-infos-card-icon" icon="sun" size={60} />
      <p className="plant-infos-card-text">{light}</p>
    </div>
    <div className="plant-infos-card">
      <FeatherIcon className="plant-infos-card-icon green" icon="scissors" size={60} />
      <p className="plant-infos-card-text green">{cut}</p>
    </div>
    <div className="plant-infos-card">
      <FeatherIcon className="plant-infos-card-icon" icon="filter" alt="Fertilisation" size={60} />
      <p className="plant-infos-card-text">{fertilization}</p>
    </div>
    <div className="plant-infos-card">
      <FeatherIcon className="plant-infos-card-icon green" icon="refresh-cw" size={60} />
      <p className="plant-infos-card-text green">{repotting}</p>
    </div>
  </section>
);

Infos.propTypes = {
  age: PropTypes.string.isRequired,
  watering: PropTypes.string.isRequired,
  light: PropTypes.string.isRequired,
  cut: PropTypes.string.isRequired,
  fertilization: PropTypes.string.isRequired,
  repotting: PropTypes.string.isRequired,
};

export default Infos;
