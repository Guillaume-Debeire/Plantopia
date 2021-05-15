import React from 'react';

import Catalog from 'src/containers/Catalog';
import './style.scss';

const Home = () => (
  <section className="home">
    <section className="catalog">
      <h2 className="catalog-title">Dernières plantes ajoutées</h2>
      <p className="catalog-text">Quelques unes des dernières plantes ajoutées à notre base de données</p>
      <Catalog />
    </section>
  </section>
);

export default Home;
