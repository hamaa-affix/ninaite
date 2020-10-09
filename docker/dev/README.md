## 開発環境の構築
1. 開発環境の作成
```
 mkdir ~/git
 mkdir ~/git/github
```
2. githubディレクトリにて
```
git clone  https://github.com/hamaa-affix/ninaite.git
```
3. hostsファイルにてdev.ninaite-affix.workを追加
```
sudo vim /etc/hosts 
　->127.0.0.1 dev.ninaite-affix.work追加  
```
4. appディレクトリ移動してコンテナを立ち上げ起動
```
cd ./docker/dev/app/ 
docker-compose up -d
```
5. appコンテナに入りcomposer install&&update,各種artisanコマンドを実行
```
dokcer exec -it app bash

composer install && update
php artisan key:generate
php artisan migrate
php artisan storage:link
```
6. ブラウザーからnanite.workでアクセス。 

## Infrastructure architecture
<p align="center"><img src="https://aws-ninaite-prod.s3-ap-northeast-1.amazonaws.com/Untitled+Diagram-Page-1+(2).png"></p>

## デプロイフロー
<p align="center"><img src="https://aws-ninaite-prod.s3-ap-northeast-1.amazonaws.com/Untitled+Diagram-%E3%83%98%E3%82%9A%E3%83%BC%E3%82%B7%E3%82%992+(1).png"></p>