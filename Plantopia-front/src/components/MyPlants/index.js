import React, { useEffect } from 'react';
import FullCalendar from '@fullcalendar/react';
import dayGridPlugin from '@fullcalendar/daygrid';
import PropTypes from 'prop-types';
import Catalog from 'src/components/Catalog';
// import plts from 'src/dataplants';
import './style.scss';

// console.log(plts.data);
const MyPlants = ({ userPlants, fetchUserPlants }) => {
  useEffect(() => {
    // console.log('je veux charger mes plantes');
    fetchUserPlants();
  }, []);
  return (
    <section className="home">
      <section className="catalog">
        <h2 className="catalog-title">Mes plantes </h2>
        <p className="catalog-text">Vous pouvez gérer sur cette page les plantes ajoutées à votre profil</p>
        <Catalog plants={userPlants} />
        <div className="calendar-container">
          <FullCalendar
            plugins={[dayGridPlugin]}
            initialView="dayGridMonth"
            events={[
              {
                title: 'Arrosage',
                start: '2021-03-25',
              },
              {
                title: 'Fertilisation',
                start: '2021-03-27',
              },
              {
                title: 'Arrosage',
                start: '2021-03-10',
              },
              {
                title: 'Rempottage',
                start: '2021-03-01',
              },
              {
                title: 'Semis',
                start: '2021-03-31',
                description: 'Basilic et menthe',
              },
              {
                title: 'Arrosage',
                start: '2021-04-15',
              },
              {
                title: 'Arrosage',
                start: '2021-04-30',
              },
              // etc...
            ]}
            
          />
        </div>
      </section>
    </section>
  );
};
MyPlants.propTypes = {
  userPlants: PropTypes.array.isRequired,
  fetchUserPlants: PropTypes.func.isRequired,
};

export default MyPlants;
