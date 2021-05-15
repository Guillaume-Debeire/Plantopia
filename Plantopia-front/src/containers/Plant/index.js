import { connect } from 'react-redux';
import { withRouter } from 'react-router-dom';
import Plant from 'src/components/Plant';
import { findPlant } from 'src/selectors/plants';

// La fonction mapStatetoProps sait recevoir le state via connect (Lecture)
// console.log(state); Verification utilisée à l'intérieur de mapStatetoProps
// console.log(state.plants.list);
const mapStateToProps = (state, ownProps) => {
  console.log(state, ownProps.match.params.slug);
  return ({
    plant: findPlant(state, ownProps.match.params.slug),
  });
};

const mapDispatchToProps = {};

const container = connect(mapStateToProps, mapDispatchToProps)(Plant);

const containerWithRouter = withRouter(container);
// Il va nous retourner Plant avec des infos en plus
export default containerWithRouter;
