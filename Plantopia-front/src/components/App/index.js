// == Import npm
import React, { useEffect } from 'react';
import { Route, Redirect, Switch } from 'react-router-dom';
import PropTypes from 'prop-types';
// == Import
import Page from 'src/components/Page';
import Home from 'src/components/Home';
import Plant from 'src/containers/Plant';
import About from 'src/components/About';
import Profil from 'src/components/Profil';
import Contact from 'src/components/Contact';
import SignupForm from 'src/containers/SignupForm';
import SearchSection from 'src/components/SearchSection';
import NotFound from 'src/components/NotFound';
import MyPlants from 'src/containers/MyPlants';
import CreatePlantForm from 'src/containers/CreatePlantForm';

// import dataplants from 'src/dataplants';
import load from '../../assets/img/loading_screen.gif';
import './style.scss';
// import data from 'src/data';

// == Composant
const App = ({ fetchPlants, loading, isLogged }) => {
  useEffect(() => {
    fetchPlants();
  }, []);
  return (
    <div className="app">
      {loading && (
        <div className="app-loading"><img src={load} alt="" /><br />Ca pousse, patience</div>
      )}
      {!loading && (
        <Switch>
          {isLogged && (
            <Switch>
              <Route path="/mes-plantes" exact>
                <Page>
                  <MyPlants />
                </Page>
              </Route>
              <Route path="/mes-plantes/creer" exact>
                <Page>
                  <CreatePlantForm />
                </Page>
              </Route>
              <Route path="/profil" exact>
                <Page>
                  <Profil />
                </Page>
              </Route>
              <Route path="/" exact>
                <Page>
                  <Home />
                </Page>
              </Route>
              <Route path="/plant/:slug" exact>
                <Page>
                  <Plant />
                </Page>
              </Route>
              <Route path="/a-propos" exact>
                <Page>
                  <About />
                </Page>
              </Route>
              <Route path="/signup" exact>
                <Page>
                  <SignupForm />
                </Page>
              </Route>
              <Route path="/contact" exact>
                <Page>
                  <Contact />
                </Page>
              </Route>
              <Route path="/search" exact>
                <Page>
                  <SearchSection />
                </Page>
              </Route>
              <Route>
                <Page>
                  <NotFound />
                </Page>
              </Route>
            </Switch>
          )}
          {!isLogged && (
            <Switch>
              <Route path="/" exact>
                <Page>
                  <Home />
                </Page>
              </Route>
              <Route path="/plant/:slug" exact>
                <Page>
                  <Plant />
                </Page>
              </Route>
              <Route path="/a-propos" exact>
                <Page>
                  <About />
                </Page>
              </Route>
              <Route path="/signup" exact>
                <Page>
                  <SignupForm />
                </Page>
              </Route>
              <Route path="/contact" exact>
                <Page>
                  <Contact />
                </Page>
              </Route>
              <Route path="/search" exact>
                <Page>
                  <SearchSection />
                </Page>
              </Route>
              <Redirect from="/mes-plantes" to="/" />
              <Redirect from="/profil" to="/" />
              <Redirect from="/mes-plantes/creer" to="/" />
              <Route>
                <Page>
                  <NotFound />
                </Page>
              </Route>
            </Switch>
          )}
        </Switch>
      )}
    </div>
  );
};

App.propTypes = {
  fetchPlants: PropTypes.func.isRequired,
  loading: PropTypes.bool.isRequired,
  isLogged: PropTypes.bool.isRequired,
};
// == Export
export default App;
