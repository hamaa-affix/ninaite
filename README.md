<p align="center"><img src="https://aws-ninaite-infra.s3.us-east-2.amazonaws.com/%E3%81%97%E3%81%A3%E3%81%A8%E3%82%8A%E4%BF%9D%E6%B9%BF%E3%82%BF%E3%82%A4%E3%83%95%E3%82%9A+%E3%83%8D%E3%83%AD%E3%83%AA+500ml.png"></p>

## app概要
地元の農業ボランティに参加した際に、個人農家の人で不足でマンパワー不足(高齢夫婦二人で営んでいた)、  
次の担い手不足と行った問題に直面しており、市で公開していたボランティアの求人の外部への公開度の低さが目立ていました。  
ボランティアを通じて、もっとカジュアルに農業体験ができれば,それを周知できる環境があればと思い作成しました。  

***https://ninaite-affix.work***

URLからブラウザーアクセス可能です。
テストユーザーでログインからお試しいただけます。



## app機能
 - キーワード登録、検索  
 - 農園登録機能  
 - 案件投稿機能  
 - 検索機能  
 - チャット機能  
 - 画像アップロード機能  
 - ペジネーション  
 - 各種CRUD  




## 技術stack

- backend
    - laravel 6.0
    - PHP7.3
    - Nginx

- frontend
    - js,Vue.js(cat機能実装に伴い一部採用、今後はSPA化を目指す)
    - bootstrap  

- 開発環境
    - docker
    - docker-compose yml  


- infra
    - ECS/Fargate　ELB　S3　RDS　route53　cloudwatch

- CI/CD 
    - circleci  
## Infrastructure architecture
<p align="center"><img src="https://aws-ninaite-prod.s3-ap-northeast-1.amazonaws.com/Untitled+Diagram-Page-1+(2).png"></p>

## デプロイフロー
<p align="center"><img src="https://aws-ninaite-prod.s3-ap-northeast-1.amazonaws.com/Untitled+Diagram-%E3%83%98%E3%82%9A%E3%83%BC%E3%82%B7%E3%82%992+(1).png"></p>




## ER図

<p align="center"><img src="https://aws-ninaite-prod.s3-ap-northeast-1.amazonaws.com/Untitled+Diagram+(1).png"></p>

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



