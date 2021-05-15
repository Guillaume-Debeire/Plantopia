/* eslint-disable arrow-body-style */
/* eslint-disable import/prefer-default-export */
import { getSlugByTitle } from 'src/utils';

/**
 * Find the plant we are asking for in list of plants
 * We will use selectors functions mostly in containers
 * @param {object} state - full state
 * @param {*} currentSlug - current slug in URL
 */
export function findPlant(state, currentSlug) {
  const plant = state.plants.list.find((theplant) => {
    return getSlugByTitle(theplant.name) === currentSlug;
  });
  return plant;
}
