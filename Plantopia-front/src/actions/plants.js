export const FETCH_PLANTS = 'FETCH_PLANTS';
export const fetchPlants = () => ({
  type: FETCH_PLANTS,
});

export const SAVE_PLANTS = 'SAVE_PLANTS';
export const savePlants = (plants) => ({
  type: SAVE_PLANTS,
  plants,
});

export const FETCH_USERPLANTS = 'FETCH_USERPLANTS';
export const fetchUserPlants = () => ({
  type: FETCH_USERPLANTS,
});

export const SAVE_USERPLANTS = 'SAVE_USERPLANTS';
export const saveUserPlants = (plants) => ({
  type: SAVE_USERPLANTS,
  plants,
});

// Create plant as a connected user
export const CREATEPLANT = 'CREATEPLANT';
export const createplant = () => ({
  type: CREATEPLANT,
});

export const CHANGE_INPUTVALUE = 'CHANGE_INPUTVALUE';
export const changeInputValue = (newValue, name) => ({
  type: CHANGE_INPUTVALUE,
  newValue,
  name,
});


// Create plant as a connected user
export const MEMORIZE_ISCREATED = 'MEMORIZE_ISCREATED';
export const memorizeIsCreated = () => ({
  type: MEMORIZE_ISCREATED,
});
