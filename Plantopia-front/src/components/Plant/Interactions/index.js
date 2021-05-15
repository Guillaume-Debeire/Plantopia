import React from 'react';

import './style.scss';

const Interactions = () => (
  <div className="interactions">
    <button className="plant-btn add-btn" type="button"> Ajouter la plante</button>
    <button className="plant-btn modify-btn" type="button"> Modifier la plante</button>
    <button className="plant-btn delete-btn" type="button"> Supprimer la plante</button>
  </div>
);

export default Interactions;
