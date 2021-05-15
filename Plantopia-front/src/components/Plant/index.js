import React from 'react';
import PropTypes from 'prop-types';

import Header from './Header';
import Infos from './Infos';
import './style.scss';

function Plant({ plant }) {
  return (
    <section className="plant">
      <div className="plant-container">
        <Header
          name={plant.name}
          picture={plant.picture}
          specification={plant.specification}
        />
        <Infos
          light={plant.light}
          watering={plant.watering}
          fertilization={plant.fertilization}
          repotting={plant.repotting}
          cut={plant.cut}
          age={plant.age}
        />
      </div>
    </section>
  );
}

Plant.propTypes = {
  plant: PropTypes.shape({
    name: PropTypes.string,
    specification: PropTypes.string,
    age: PropTypes.string,
    watering: PropTypes.string,
    light: PropTypes.string,
    cut: PropTypes.string,
    fertilization: PropTypes.string,
    repotting: PropTypes.string,
    picture: PropTypes.string,
  }).isRequired,
};

export default Plant;
