import { combineReducers } from 'redux';

import plantsReducer from './plants';
import userReducer from './user';

// On export ce que nous renvoie combineReducers avec notre "reducer racine"
const rootReducer = combineReducers({
  plants: plantsReducer,
  user: userReducer,
});

export default rootReducer;
