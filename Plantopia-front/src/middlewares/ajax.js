/* eslint-disable default-case */
import axios from 'axios';
import {
  FETCH_PLANTS,
  savePlants,
  FETCH_USERPLANTS,
  saveUserPlants,
  CREATEPLANT,
  memorizeIsCreated,
} from 'src/actions/plants/';
import {
  LOGIN,
  memorizeUser,
  SIGNUP,
  memorizeUserSignup,
  LOGOUT,
  FETCH_USERINFOS,
  memorizeUserInfos,
} from 'src/actions/user';

// Code Factorization :
// Default Axios config so we don't have to write it in every case
axios.defaults.baseURL = 'http://ec2-100-25-146-45.compute-1.amazonaws.com/';

const ajax = (store) => (next) => (action) => {
  switch (action.type) {
    /* FETCH_PLANTS => To get a list of plants from API */
    case FETCH_PLANTS:
    {
      axios.get('/api/plants')
        .then((response) => {
          store.dispatch(savePlants(response.data));
        })
        .catch((error) => {
          console.error(error);
        });
      break;
    }
    /* LOGIN => To login a user already in db into API, get token in response */
    case LOGIN:
    {
      const state = store.getState();
      axios.post('/api/login_check', {
        username: state.user.username,
        password: state.user.password,
      })
        .then((response) => {
          console.log('ça fonctionne', response);
          store.dispatch(memorizeUser());
          console.log(response.data.token);
          // Default header config => Every request after login will use this header with token
          axios.defaults.headers.common.Authorization = `Bearer ${response.data.token}`;
        })
        .catch((error) => {
          console.log(error.response.request.response);
        });
      break;
    }
    /* LOGOUT => To delete the token when user logout */
    case LOGOUT:
      delete axios.defaults.headers.common.Authorization;
      break;
    /* SIGNUP => To register a first-time user into database API */
    case SIGNUP:
    {
      const state = store.getState();
      axios.post('/api/myaccount', {
        email: state.user.username,
        pseudo: state.user.pseudo,
        password: { first: state.user.password1, second: state.user.password2 },
      })
        .then((response) => {
          console.log('ça fonctionne', response);
          store.dispatch(memorizeUserSignup(response.data.pseudo));
        })
        .catch((error) => {
          console.log(error.response.request.response);
        });
      break;
    }
    /* FETCH_USERPLANTS => To get the connected user's plant list */
    case FETCH_USERPLANTS:
    {
      axios.get('/api/myaccount')
        .then((response) => {
          console.log('ça fonctionne', response, response.data);
          store.dispatch(saveUserPlants(response.data[1]));
        })
        .catch((error) => {
          console.log(error.response.request.response);
        });
      break;
    }
    /* FETCH_USERPLANTS => To get the connected user's info */
    // case FETCH_USERINFOS:
    // {
    //   axios.get('/api/myaccount')
    //     .then((response) => {
    //       // console.log('ça fonctionne', response, response.data[0]);
    //       store.dispatch(memorizeUserInfos(response.data[0]));
    //     })
    //     .catch((error) => {
    //       console.log(error.response.request.response);
    //     });
    //   break;
    // }
    /* CREATEPLANT => To create a connected user plant via form */
    case CREATEPLANT:
    {
      console.log('je rentre dans le case CREATEPLANT');
      const state = store.getState();
      console.log(state);
      axios.post('/api/plants', {
        name: state.plants.name,
        specification: state.plants.specification,
        // picture: state.plants.picture,
        // age: '2020-10-02',
        light: '8h/jour', // string
        // cut: { 0: 'Printemps' }, // array
        // fertilization: { state.plants.fertilization }, // array
        // watering: state.plants.watering, // interval
        // repotting: { state.plants.repotting }, // array
        // type: 1,
        // skill: '2',
      })
        .then((response) => {
          console.log('ça fonctionne, ajoute une plante', response);
          store.dispatch(memorizeIsCreated(response.data[0]));
        })
        .catch((error) => {
          console.log(error.response.request.response);
        });
      break;
    }
  }
  next(action);
};

export default ajax;
