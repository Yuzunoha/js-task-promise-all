'use strict';

const p = console.log;
const host = 'http://localhost';

const test = (num) => {
  fetch(host + '/sleep-api/' + num)
    .then((res) => res.json())
    .then(p)
    .catch(p);
};

const main = () => {
  // TODO
  for (let i = 1; i <= 17; i++) {
    test(i);
  }
};
