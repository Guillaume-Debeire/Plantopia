import { connect } from 'react-redux';
import Menu from 'src/components/Menu';

const mapStateToProps = (state) => ({
  isLogged: state.user.logged,
});

const mapDispatchToProps = {};

export default connect(mapStateToProps, mapDispatchToProps)(Menu);
