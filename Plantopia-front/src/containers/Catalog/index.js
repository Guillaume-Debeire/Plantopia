import { connect } from 'react-redux';
import Catalog from 'src/components/Catalog';

import { fetchUserPlants } from 'src/actions/plants';

// La fonction mapStatetoProps sait recevoir le state via connect (Lecture)
// console.log(state); Verification utilisée à l'intérieur de mapStatetoProps
// console.log(state.plants.list);
const mapStateToProps = (state) => ({
  plants: state.plants.list,
});

const mapDispatchToProps = (dispatch) => ({
  fetchOwnPlants: () => {
    // console.log('je veux afficher mes plantes');
    dispatch(fetchUserPlants());
  },
});

export default connect(mapStateToProps, mapDispatchToProps)(Catalog);
