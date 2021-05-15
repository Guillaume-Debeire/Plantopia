import React from 'react';

import cactsanscact from '../../assets/img/404.png';
// import './style.scss';

const About = () => (
  <section className="about">
    <h2 className="signup-title">Oupsi, il y a un problème d'interface arrosoir-plante<br />
      <img src={cactsanscact} width="600" alt="404" /><br />
      <button className="plant-btn modify-btn" type="button"> <a href="/">Retourner sur l'accueil</a></button>
    </h2>

  </section>
);

export default About;
