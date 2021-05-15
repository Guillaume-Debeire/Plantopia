import React from 'react';
import PropTypes from 'prop-types';

import Field from './Field';

// import { useField } from './hooks';
import gif from '../../assets/img/plantopia-cactus.gif';
import './style.scss';

const CreatePlantForm = ({
  name,
  specification,
  age,
  watering,
  light,
  cut,
  fertilization,
  repotting,
  type,
  skill,
  picture,
  changeField,
  handleCreatePlant,
  plantIsCreated,
  createdPlantMessage,
}) => {
  const handleCreatePlantSubmit = (evt) => {
    evt.preventDefault();
    handleCreatePlant();
  };

  return (
    <section className="signup-container">
      <div className="signup-form">
        {plantIsCreated && (
          <div className="signup-form-signup">
            <h2 className="signup-title">{createdPlantMessage}</h2>
            <p className="signup-text"> Vous pouvez retrouvez votre plante dans "Mes Plantes".<br />
              <img src={gif} alt={createdPlantMessage} />
            </p>
          </div>
        )}
        {!plantIsCreated && (
          <>
            <h2 className="createplant-title">Création d'une plante</h2>
            <p className="createplant-text">Remplissez le formulaire ci dessous pour ajouter une plante</p>
            <form autoComplete="off" className="createplant-form-element" onSubmit={handleCreatePlantSubmit}>
              <p className="createplant-text">Champs obligatoires</p>
              <Field
                name="name"
                type="text"
                placeholder="Nom de la plante"
                onChange={changeField}
                value={name}
              />
              <Field
                name="specification"
                type="text"
                placeholder="Description de la plante"
                onChange={changeField}
                value={specification}
              />
              <p className="createplant-text">Champs facultatifs</p>
              <Field
                name="picture"
                type="file"
                placeholder="Lien d'une photo de la plante"
                onChange={changeField}
                value={picture}
              />
              <Field
                name="age"
                type="text"
                placeholder="Date de d'acquisition (ex: AAAA-MM-JJ)"
                onChange={changeField}
                value={age}
              />
              <Field
                name="watering"
                type="text"
                placeholder="Rythme d'arrosage"
                onChange={changeField}
                value={watering}
              />
              <Field
                name="light"
                type="text"
                placeholder="Besoin en lumière"
                onChange={changeField}
                value={light}
              />
              <Field
                name="cut"
                type="text"
                placeholder="Mois de taille"
                onChange={changeField}
                value={cut}
              />
              <Field
                name="fertilization"
                type="text"
                placeholder="Rythme d'apport d'engrais"
                onChange={changeField}
                value={fertilization}
              />
              <Field
                name="repotting"
                type="text"
                placeholder="Rythme de rempotage"
                onChange={changeField}
                value={repotting}
              />
              <Field
                name="type"
                type="number"
                placeholder="1 pour intérieur / 2 pour extérieur"
                onChange={changeField}
                value={type}
              />
              <Field
                name="skill"
                type="number"
                placeholder="1 pour débutant / 2 pour intermédiaire / 3 pour expert"
                onChange={changeField}
                value={skill}
              />
              <button
                type="submit"
                className="createplant-form-button"
              >
                Ajouter la plante
              </button>
            </form>
          </>
        )}
      </div>
    </section>

  );
};

CreatePlantForm.propTypes = {
  name: PropTypes.string.isRequired,
  specification: PropTypes.string.isRequired,
  picture: PropTypes.string,
  age: PropTypes.string,
  light: PropTypes.string,
  cut: PropTypes.string,
  fertilization: PropTypes.string,
  watering: PropTypes.string,
  repotting: PropTypes.string,
  type: PropTypes.number,
  skill: PropTypes.number,
  changeField: PropTypes.func.isRequired,
  handleCreatePlant: PropTypes.func.isRequired,
  plantIsCreated: PropTypes.bool,
  createdPlantMessage: PropTypes.string,
};

CreatePlantForm.defaultProps = {
  plantIsCreated: false,
  createdPlantMessage: 'La plante est ajoutée !',
};

export default CreatePlantForm;
