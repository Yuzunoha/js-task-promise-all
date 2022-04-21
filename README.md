# 多重 ajax 課題

## 概要

- 要件に沿って [main.js](/js-challenge/multi-ajax-api/main.js) をコーディングしてください

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

- [/js-challenge/multi-ajax-api/main.js](/js-challenge/multi-ajax-api/main.js)
  - index.html から読み込まれます。本課題を解く上で編集する唯一のファイルです。ファイルを新規作成する場合は要相談
- [/js-challenge/multi-ajax-api/index.html](/js-challenge/multi-ajax-api/index.html)
  - main.js の関数を実行します。ブラウザで開き、本課題の動作確認を行うために用います

## 備考

- 本仕様書内の文には次のように変数を用います
  - 変数 `id` に格納された値が仮に `23` である場合、`{id}` という表記は `23` という意味になります
  - 例) `/user/{id}` は `/user/23` という意味

## 要件

- 関数 `init`
  - この関数は画面の読み込み時に実行されます
  - API `/maxnum` から数値 `{maxnum}` を取得して、既存のセレクトタグ `select1` にオプションを `{maxnum}` 個追加してください
  - オプションの個数は `1` から順番に `{maxnum}` までの `{maxnum}` 個となります
  - 各オプションの属性 value と属性 text はそれぞれ自分が何番目のオプションかを表す数値になります
  - 例)`13` 番目のオプションの value と text の値はそれぞれ `13` となる
- 関数 `run`
  - この関数は `select1` で新たに値が選択される度に実行されます
  - 現在選択されている値を取得してください(この値を変数 `id` とする)
  - API `/first/{id}` から値を取得してください(この値を変数 `first_text` とする)
  - API `/second/{id}` から値を取得してください(この値を変数 `second_text` とする)
  - API `/third/{id}` から値を取得してください(この値を変数 `third_text` とする)
  - API `/delimiter` から値を取得してください(この値を変数 `delimiter` とする)
  - これまでに取得した変数を次の様に連結してください(この値を変数 `full_text` とする)
    - `{first_text}` + `{delimiter}` + `{second_text}` + `{delimiter}` + `{third_text}`
  - API `/check/{id}` から値を取得してください(この値を変数 `check_result` とする)
  - 既存の p タグ `result1` の属性 textContent の値を `{check_result}` で上書きしてください

## API 仕様

- /maxnum
  - method: get
  - response:
    - {maxnum}
- /delimiter
  - method: get
  - response:
    - {delimiter}
- /first/{id}
  - method: get
  - response:
    - {first_text}
- /second/{id}
  - method: get
  - query string:
    - first_text={first_text}
  - response:
    - {second_text}
- /third/{id}
  - method: get
  - query string:
    - first_text={first_text}
    - second_text={second_text}
  - response:
    - {third_text}
- /check/{id}
  - method: get
  - query string:
    - full_text={full_text}
  - response:
    - {check_result}

# 完成イメージ

![image](https://user-images.githubusercontent.com/22877094/156331416-babcbf07-6498-47fd-b4e0-d307a3ae21d6.png)
