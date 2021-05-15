import React from 'react';
import PropTypes from 'prop-types';

import Field from './Field';

// import { useField } from './hooks';
import gif from '../../assets/img/plantopia-cactus.gif';
import './style.scss';

const SignupForm = ({
  username,
  password1,
  password2,
  pseudo,
  changeField,
  handleSignup,
  isSignup,
  signupMessage,
}) => {
  const handleSignupSubmit = (evt) => {
    evt.preventDefault();
    handleSignup();
  };

  return (
    <section className="signup-container">
      <div className="signup-form">
        {isSignup && (
          <div className="signup-form-signup">
            <h2 className="signup-title">{signupMessage}</h2>
            <p className="signup-text"> Vous pouvez vous maintenant vous connecter pour accéder à votre compte.<br />
              <img src={gif} alt={signupMessage} />
            </p>
          </div>
        )}
        {!isSignup && (
          <>
            <h2 className="signup-title">Formulaire d'inscription</h2>
            <p className="signup-text">Inscrivez-vous pour débloquer l'accès à l'application</p>
            <form autoComplete="off" className="signup-form-element" onSubmit={handleSignupSubmit}>
              <Field
                name="pseudo"
                type="pseudo"
                placeholder="Pseudo"
                onChange={changeField}
                value={pseudo}
              />
              <Field
                name="username"
                placeholder="Adresse Email"
                onChange={changeField}
                value={username}
              />
              <Field
                name="password1"
                type="password"
                placeholder="Mot de passe"
                onChange={changeField}
                value={password1}
              />
              <Field
                name="password2"
                type="password"
                placeholder="Confirmation du mot de passe"
                onChange={changeField}
                value={password2}
              />
              <button
                type="submit"
                className="signup-form-button"
              >
                Inscription
              </button>
            </form>
          </>
        )}
      </div>
    </section>

  );
};

SignupForm.propTypes = {
  username: PropTypes.string.isRequired,
  password1: PropTypes.string.isRequired,
  password2: PropTypes.string.isRequired,
  pseudo: PropTypes.string.isRequired,
  changeField: PropTypes.func.isRequired,
  handleSignup: PropTypes.func.isRequired,
  isSignup: PropTypes.bool,
  signupMessage: PropTypes.string,
};

SignupForm.defaultProps = {
  isSignup: false,
  signupMessage: 'Inscription réussie !',
};

export default SignupForm;
