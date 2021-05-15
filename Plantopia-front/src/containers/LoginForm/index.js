import { connect } from 'react-redux';
import LoginForm from 'src/components/LoginForm';

import { login, changeInputValue, logout } from 'src/actions/user';

const mapStateToProps = (state) => ({
  username: state.user.username,
  password: state.user.password,
  isLogged: state.user.logged,
});

const mapDispatchToProps = (dispatch) => ({
  handleLogin: () => {
    // Je teste, ça fonctionne quand je clique sur le btn
    // console.log('je réagis au submit yes yes');
    // J'appelle la fonction login que je vient de créer dans actions/user
    dispatch(login());
  },
  // Pour écrire dans les input :
  changeField: (newValue, name) => {
    // console.log('Test pour changer la valeur', newValue, name);
    dispatch(changeInputValue(newValue, name));
  },

  handleLogout: () => {
    dispatch(logout());
  },
});

export default connect(mapStateToProps, mapDispatchToProps)(LoginForm);
