import { connect } from 'react-redux';
import Profil from 'src/components/Profil';
import { fetchUserInfos } from 'src/actions/user';

const mapStateToProps = (state) => ({
  userInfos: state.user.infos,
});

const mapDispatchToProps = (dispatch) => ({
  fetchUserInfos: () => {
    dispatch(fetchUserInfos());
  },
});

export default connect(mapStateToProps, mapDispatchToProps)(Profil);
