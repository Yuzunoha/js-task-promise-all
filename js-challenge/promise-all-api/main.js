'use strict';

const p = console.log;
const host = 'http://localhost';

const main = () => {
  // TODO
  fetch(host + '/sleep-api/123')
    .then((res) => res.json())
    .then(p)
    .catch(p);
};
