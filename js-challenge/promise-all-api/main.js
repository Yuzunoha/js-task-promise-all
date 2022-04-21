'use strict';

const host = 'http://localhost';

const main = () => {
  // TODO
  const promises = [];
  for (let i = 1; i <= 17; i++) {
    const url = host + '/sleep-api/' + i;
    const promise = fetch(url).then((res) => res.json());
    promises.push(promise);
  }
  Promise.all(promises).then((a) => {
    a.forEach((e) => console.log(e));
  });
};
