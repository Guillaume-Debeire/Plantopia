import { connect } from 'react-redux';
import CreatePlantForm from 'src/components/CreatePlantForm';

import { createplant, changeInputValue } from 'src/actions/plants';

const mapStateToProps = (state) => ({
  name: state.plants.name,
  specification: state.plants.specification,
  age: state.plants.age,
  picture: state.plants.picture,
  light: state.plants.light,
  cut: state.plants.cut,
  fertilization: state.plants.fertilization,
  watering: state.plants.watering,
  repotting: state.plants.repotting,
  type: state.plants.type,
  skill: state.plants.skill,
  plantIsCreated: state.plants.isCreated,
});

const mapDispatchToProps = (dispatch) => ({
  handleCreatePlant: () => {
    // Test, when I click on CTA it's working
    // console.log('je réagis au submit yes yes');
    // Calling createplant func that I created in actions/user
    dispatch(createplant());
  },
  // Func to write into input
  changeField: (newValue, name) => {
    // console.log('Test pour changer la valeur', newValue, name);
    dispatch(changeInputValue(newValue, name));
  },
});

export default connect(mapStateToProps, mapDispatchToProps)(CreatePlantForm);
