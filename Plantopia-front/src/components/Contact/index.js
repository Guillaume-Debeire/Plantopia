import React from 'react';

import './style.scss';

const Contact = () => (
  <div className="wrapper">
    <div className="contact-form">
      <div className="input-fields">
        <input type="text" className="Input" placeholder="Nom" />
        <input type="text" className="Input" placeholder="Prénom" />
        <input type="text" className="Input" placeholder="Email" />
        <input type="text" className="Input" placeholder="Subject" />
      </div>
      <div className="msg">
        <textarea placeholder="Message" />
        <button className="btn" type="submit">Envoyer</button>
      </div>
    </div>
  </div>
);

export default Contact;
