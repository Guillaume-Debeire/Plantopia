import { connect } from 'react-redux';
import App from 'src/components/App';

import { fetchPlants } from 'src/actions/plants';

// La fonction mapStatetoProps sait recevoir le state via connect (Lecture)
// console.log(state); Verification utilisée à l'intérieur de mapStatetoProps
// console.log(state.plants.list);
const mapStateToProps = (state) => ({
  loading: state.plants.loading,
  isLogged: state.user.logged,
});

const mapDispatchToProps = (dispatch) => ({
  fetchPlants: () => {
    // console.log('on va chercher nos ptites plantes');
    dispatch(fetchPlants());
  },
});

export default connect(mapStateToProps, mapDispatchToProps)(App);
