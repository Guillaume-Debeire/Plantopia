/* eslint-disable max-len */
import React from 'react';
import FeatherIcon from 'feather-icons-react';
import melanie from '../../../assets/img/profil-melanie.jpg';
import christophe from '../../../assets/img/profil-christophe.jpg';
import guillaume from '../../../assets/img/profil-guillaume.jpg';
import yanis from '../../../assets/img/profil-yanis.jpg';
import './style.scss';

const TeamCards = () => (
  <section className="about-list">
    <figure className="profil-card">
      <div className="profile-image"><img src={yanis} alt="Yanis Desson" /></div>
      <figcaption>
        <h3>Yanis Desson</h3>
        <h4>Lead Dev Front React<br /> Resp. Technique du Calendrier</h4>
        <div className="icons"><a href="https://twitter.com/HXRUS21" target="_blank"><FeatherIcon icon="twitter" size={25} className="feather-icons" /></a>
          <a href="https://github.com/Hxrus" target="_blank"> <FeatherIcon icon="github" size={25} className="feather-icons" /></a>
          <a href="mailto:yanis2101@live.fr"> <FeatherIcon icon="mail" size={25} className="feather-icons" /></a>
        </div>
      </figcaption>
    </figure>
    <figure className="profil-card">
      <div className="profile-image"><img src={melanie} alt="Mélanie Riché" /></div>
      <figcaption>
        <h3>Mélanie Riché</h3>
        <h4>Developpeuse Front-End React<br />Product Owner / Webdesigner</h4>
        <div className="icons"><a href="https://twitter.com/rchmelanie" target="_blank"><FeatherIcon icon="twitter" size={25} className="feather-icons" /></a>
          <a href="https://github.com/MelanieRiche" target="_blank"> <FeatherIcon icon="github" size={25} className="feather-icons" /></a>
          <a href="mailto:contact@melanieriche.fr"> <FeatherIcon icon="mail" size={25} className="feather-icons" /></a>
        </div>
      </figcaption>
    </figure>
    <figure className="profil-card">
      <div className="profile-image"><img src={guillaume} alt="Guillaume Debeire" /></div>
      <figcaption>
        <h3>Guillaume Debeire</h3>
        <h4>Lead dev back Symfony<br /> Git master</h4>
        <div className="icons"><a href="https://twitter.com/fixit_up" target="_blank"><FeatherIcon icon="twitter" size={25} className="feather-icons" /></a>
          <a href="https://github.com/Guillaume-Debeire" target="_blank"> <FeatherIcon icon="github" size={25} className="feather-icons" /></a>
          <a href="mailto:guillaume@debeire.com"> <FeatherIcon icon="mail" size={25} className="feather-icons" /></a>
        </div>
      </figcaption>
    </figure>
    <figure className="profil-card">
      <div className="profile-image"><img src={christophe} alt="Christophe Ugo" /></div>
      <figcaption>
        <h3>Christophe Ugo</h3>
        <h4>Developpeur Back-End Symfony<br /> Scrum master</h4>
        <div className="icons"><a href="https://twitter.com/"><FeatherIcon icon="twitter" size={25} className="feather-icons" /></a>
          <a href="https://github.com/Christophe-Ugo" target="_blank"> <FeatherIcon icon="github" size={25} className="feather-icons" /></a>
          <a href="mailto:"> <FeatherIcon icon="mail" size={25} className="feather-icons" /></a>
        </div>
      </figcaption>
    </figure>
  </section>
);

export default TeamCards;
