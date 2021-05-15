import { connect } from 'react-redux';
import MyPlants from 'src/components/MyPlants';
import { fetchUserPlants } from 'src/actions/plants';

const mapStateToProps = (state) => ({
  userPlants: state.plants.mine,
});

const mapDispatchToProps = (dispatch) => ({
  fetchUserPlants: () => {
    dispatch(fetchUserPlants());
  },
});

export default connect(mapStateToProps, mapDispatchToProps)(MyPlants);
