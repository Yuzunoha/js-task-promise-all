# promise-all 課題

## 概要

- 要件に沿って [main.js](/js-challenge/promise-all-api/main.js) をコーディングしてください

## セットアップ

- `make init` または `make up` を実行して Docker コンテナを起動してください

### コンテナを初回起動する手順

- `make init` を実行する
  - コンテナが起動すると port80 で待ち受ける

### コンテナを停止する手順

- `make down` を実行する

### 停止したコンテナを起動する手順

- `make up` を実行する

## ファイル

- [/js-challenge/promise-all-api/main.js](/js-challenge/promise-all-api/main.js)
  - index.html から読み込まれます。本課題を解く上で編集する唯一のファイルです。ファイルを新規作成する場合は要相談
- [/js-challenge/promise-all-api/index.html](/js-challenge/promise-all-api/index.html)
  - main.js の関数を実行します。ブラウザで開き、本課題の動作確認を行うために用います

## 要件

- 関数 `main`
  - この関数は画面の読み込み時に実行されます
  - `/sleep-api/1` から `/sleep-api/17` までの 17 の API からそれぞれ文字列を取得して、順番に console に出力してください
    - 順番にとは `/sleep-api/1` から取得した文字列、`/sleep-api/2` から取得した文字列、...、`/sleep-api/17` から取得した文字列の順番にということ
  - 各 API のバックエンド処理の実行時間はそれぞれランダムになっており、最短 0.001 秒 - 最長 0.500 秒となります
  - (重要)コンソール出力の順番は守りつつ各 API を非同期処理しましょう
    - 1 つの API のバックエンド処理が完了したら次の API の処理を開始する、という動作にならないように

## API 仕様

- /sleep-api/{ms}
  - method: get
  - response: string
  - 備考: 有効な{ms}の値は 1 以上 17 以下の整数
