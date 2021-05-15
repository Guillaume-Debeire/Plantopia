import React from 'react';
import { Link } from 'react-router-dom';
import logo from '../../assets/img/logo-plantopia-dark.png';

import './style.scss';

const NewPassword = () => (
  <form className="box" action="#" method="post">
    <a href="/"><img src={logo} alt="logo" /></a>
    <h1 className="np-title">NOUVEAU MOT DE PASSE</h1>
    <input className="input" type="text" name="" placeholder="New password" />
    <input className="input" type="password" name="" placeholder="Confirmation" />
    <input className="login" type="submit" name="" value="Changer mot de passe" />
  </form>
);

export default NewPassword;
