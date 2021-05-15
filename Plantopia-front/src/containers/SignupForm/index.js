import { connect } from 'react-redux';
import SignupForm from 'src/components/SignupForm';

import { signup, changeInputValue } from 'src/actions/user';

const mapStateToProps = (state) => ({
  username: state.user.username,
  password1: state.user.password1,
  password2: state.user.password2,
  pseudo: state.user.pseudo,
  isSignup: state.user.signup,
});

const mapDispatchToProps = (dispatch) => ({
  handleSignup: () => {
    // Test, when I click on CTA it's working
    // console.log('je réagis au submit yes yes');
    // Calling signup func that I created in actions/user
    dispatch(signup());
  },
  // Func to write into input
  changeField: (newValue, name) => {
  //  console.log('Test pour changer la valeur', newValue, name);
    dispatch(changeInputValue(newValue, name));
  },

  // handleLogout: () => {
  //   dispatch(logout());
  // },
});

export default connect(mapStateToProps, mapDispatchToProps)(SignupForm);
