import { SAVE_PLANTS, SAVE_USERPLANTS, CHANGE_INPUTVALUE, MEMORIZE_ISCREATED } from 'src/actions/plants';

// Chaque reducer va faire évoluer une portion de state
const initialState = {
  list: [],
  mine: [],
  name: '',
  specification: '',
  age: '',
  light: '',
  cut: '',
  fertilization: '',
  watering: '',
  repotting: '',
  type: '',
  skill: '',
  picture: '',
  loading: true,
  isCreated: false,
};
// Chaque reducer reçoit SA portion de state
const reducer = (state = initialState, action = {}) => {
  switch (action.type) {
    case SAVE_PLANTS:
      // console.log(state, action);
      return {
        ...state,
        list: action.plants,
        loading: false,
      };
    case SAVE_USERPLANTS:
      return {
        ...state,
        mine: action.plants,
      };
    case CHANGE_INPUTVALUE:
      return {
        ...state,
        [action.name]: action.newValue,
      };
    case MEMORIZE_ISCREATED:
      return {
        ...state,
        isCreated: true,
      };
    default:
      return state;
  }
};

export default reducer;
