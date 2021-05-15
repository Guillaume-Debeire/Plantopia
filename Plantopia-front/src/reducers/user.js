import { CHANGE_INPUTVALUE, MEMORIZE_USER, LOGOUT, MEMORIZE_USER_SIGNUP, MEMORIZE_USER_INFOS } from 'src/actions/user';

const initialState = {
  username: '',
  password: '',
  password1: '',
  password2: '',
  pseudo: '',
  infos: [],
  logged: false,
  signup: false,
};

const reducer = (state = initialState, action = {}) => {
  switch (action.type) {
    case CHANGE_INPUTVALUE:
      return {
        ...state,
        [action.name]: action.newValue,
      };
    case MEMORIZE_USER:
      return {
        ...state,
        logged: true,
        username: '',
        password: '',
      };
    case MEMORIZE_USER_SIGNUP:
      return {
        ...state,
        signup: true,
        username: '',
        password1: '',
        password2: '',
      };
    case LOGOUT:
      return {
        ...state,
        logged: false,
        token: null,
      };
    case MEMORIZE_USER_INFOS:
      return {
        ...state,
        infos: action.user,
      };
    default:
      return state;
  }
};

export default reducer;
