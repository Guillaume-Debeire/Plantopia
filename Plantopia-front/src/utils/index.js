/* eslint-disable import/prefer-default-export */
/* Desactive eslint car il nous saoule avec ses remarques,
surtout pour ce fichier où on exporte des fonctions */
import slugify from 'slugify';

export function getSlugByTitle(name) {
  return slugify(name, {
    lower: true,
  });
}
