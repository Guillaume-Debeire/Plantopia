import { createStore, applyMiddleware, compose } from 'redux';

// Reducer import
import reducer from 'src/reducers';
import ajax from 'src/middlewares/ajax';

// DevTools
const composeEnhancers = window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__ || compose;

const enhancers = composeEnhancers(
  applyMiddleware(
    ajax,
  ),
);

// Mon store c'est ce que me retourne createStore, il a besoin de se baser sur un reducer
const store = createStore(reducer, enhancers);

// Export du store
export default store;
