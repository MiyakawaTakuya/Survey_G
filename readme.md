## 手順
GraphiQLを使ってGitHubのGraphQL APIを触る


アクセストークンの作成手順
1. GitHub > Settings > Developer settings > Personal access tokens から作成
プライベートリポジトリへのアクセスには、[ ]repo Full control of private repositoriesをチェックする
2.アプリを起動し、Edit HTTP Headersを開く
キーにAuthorization、値にBearer <作成したトークン>を設定
3.元の画面に戻り、GraphQL Endpointにhttps://api.github.com/graphqlを入力

## 反省
・PHPを使わずapp経由でcontributionsを取得できてしまうため、今回の課題の趣旨からずれてしまった
・GitHubでアクセストークンが必要となり、承諾をもらえた相手しか表示できない.