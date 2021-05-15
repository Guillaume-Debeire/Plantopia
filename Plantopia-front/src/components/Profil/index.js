import React, { useEffect } from 'react';
import PropTypes from 'prop-types';
import Infos from 'src/components/Profil/Infos';

import './style.scss';

const Profil = ({ userInfos, fetchUserInfos }) => {
  useEffect(() => {
    console.log('je veux charger mes infos');
    fetchUserInfos();
  }, []);
  return (
    <section className="home">
      <section className="catalog">
        <h2 className="catalog-title">Mon profil</h2>
        <p className="catalog-text">Vous pouvez consulter/gérer sur cette page votre profil utilisateur</p>
        {userInfos.map((info) => (
          <Infos key={info.id} {...info} />
        ))}
      </section>
    </section>
  );
};
Profil.propTypes = {

  fetchUserInfos: PropTypes.func.isRequired,
  userInfos: PropTypes.arrayOf(
    PropTypes.shape({
      id: PropTypes.number.isRequired,
    }),
  ).isRequired,
};
export default Profil;
