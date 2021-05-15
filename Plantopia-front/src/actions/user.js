export const LOGIN = 'LOGIN';
export const login = () => ({
  type: LOGIN,
});

export const CHANGE_INPUTVALUE = 'CHANGE_INPUTVALUE';
export const changeInputValue = (newValue, name) => ({
  type: CHANGE_INPUTVALUE,
  newValue,
  name,
});

export const MEMORIZE_USER = 'MEMORIZE_USER';
export const memorizeUser = () => ({
  type: MEMORIZE_USER,
});

export const MEMORIZE_USER_SIGNUP = 'MEMORIZE_USER_SIGNUP';
export const memorizeUserSignup = () => ({
  type: MEMORIZE_USER_SIGNUP,
});

export const FETCH_USERINFOS = 'FETCH_USERINFOS';
export const fetchUserInfos = () => ({
  type: FETCH_USERINFOS,
});

export const MEMORIZE_USER_INFOS = 'MEMORIZE_USER_INFOS';
export const memorizeUserInfos = (avatar, email, pseudo) => ({
  type: MEMORIZE_USER_INFOS,
  avatar,
  email,
  pseudo,
});

export const LOGOUT = 'LOGOUT';
export const logout = () => ({
  type: LOGOUT,
});

export const SIGNUP = 'SIGNUP';
export const signup = () => ({
  type: SIGNUP,
});
