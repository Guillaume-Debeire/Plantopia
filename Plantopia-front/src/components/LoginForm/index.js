import React from 'react';
import PropTypes from 'prop-types';
import { Link, NavLink } from 'react-router-dom';
import Field from './Field';
// import { useField } from './hooks';

import './style.scss';

const LoginForm = ({
  username,
  password,
  changeField,
  handleLogin,
  handleLogout,
  isLogged,
  // loggedMessage,
}) => {
  const handleSubmit = (evt) => {
    evt.preventDefault();
    handleLogin();
  };

  return (
    <div className="login-form">
      {isLogged && (
        <div className="login-form-logged">
          <nav className="main-nav">
            <ul className="main-nav-list">
              <NavLink
                to="/mes-plantes"
                alt="Mes plantes"
                exact
                activeStyle={{
                  color: '#d06d13',
                }}
              >
                Mes plantes
              </NavLink>
              <NavLink
                to="/mes-plantes/creer"
                alt="Créer une plante"
                exact
                activeStyle={{
                  color: '#d06d13',
                }}
              >
                Créer une plante
              </NavLink>
              <button
                type="button"
                className="login-form-button-logout"
                onClick={handleLogout}
              >
                Déconnexion
              </button>
            </ul>
          </nav>
        </div>
      )}
      {!isLogged && (

        <form autoComplete="off" className="login-form-element" onSubmit={handleSubmit}>
          <Field
            name="username"
            placeholder="Adresse Email"
            onChange={changeField}
            value={username}
          />
          <Field
            name="password"
            type="password"
            placeholder="Mot de passe"
            onChange={changeField}
            value={password}
          />
          <button
            type="submit"
            className="login-form-button"
          >
            Connexion
          </button>
          <Link
            to="/signup"
            alt="Inscription"
          >
            <button
              type="button"
              className="login-form-button-logout"
            >
              Inscription
            </button>
          </Link>
        </form>
      )}
    </div>
  );
};

LoginForm.propTypes = {
  username: PropTypes.string.isRequired,
  password: PropTypes.string.isRequired,
  changeField: PropTypes.func.isRequired,
  handleLogin: PropTypes.func.isRequired,
  handleLogout: PropTypes.func.isRequired,
  isLogged: PropTypes.bool,
  // loggedMessage: PropTypes.string,
};

LoginForm.defaultProps = {
  isLogged: false,
  // loggedMessage: 'Connexion réussie',
};

export default LoginForm;
