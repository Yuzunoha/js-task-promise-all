'use strict';

const host = 'http://localhost';

const 模範解答 = () => {
  // パラレル
  const promises = [];
  for (let i = 1; i <= 17; i++) {
    const url = host + '/sleep-api/' + i;
    const promise = fetch(url).then((res) => res.json());
    promises.push(promise);
  }
  Promise.all(promises).then((results) => {
    results.forEach((result) => console.log(result));
  });
};

const ありそうな間違い = async () => {
  // シリアル
  for (let i = 1; i <= 17; i++) {
    const url = host + '/sleep-api/' + i;
    const result = await fetch(url).then((res) => res.json());
    console.log(result);
  }
};

const main = async () => {
  console.log('処理開始: ありそうな間違い');
  await ありそうな間違い();

  console.log('処理開始: 模範解答');
  模範解答();
};
