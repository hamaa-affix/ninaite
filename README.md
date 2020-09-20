<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## app概要
地元の農業ボランティに参加した際に、個人農家の人で不足でマンパワー不足(高齢夫婦二人で営んでいた)、
次の担い手不足と行った問題に直面しており、市で公開していたボランティアの求人の外部への公開度の低さが目立ていました。ボランティアを通じて、もっとカジュアルに農業体験ができれば、
それを周知できる環境があればと思い作成しました。


## app機能
-キーワード登録、検索
-農園登録機能
-案件投稿機能
-検索機能
-チャット機能
-画像アップロード機能
-ペジネーション
-各種CRUD

##技術stack
backend:laravel

frontend:js,Vue.js(cat機能実装に伴い一部採用、今後はSPA化を目指す) bootstrap

dev環境： docker docker-compose yml

infra:aws(ECS,ELB,S3,RDS,route53,cloudwatch)
## Infrastructure architecture
## ER図

## 開発環境の構築
 1,mkdir ~/git/github
 2,githubディレクトにてgit clone
 3,sudo vim /etc/hosts ->127.0.0.1 dev.ninaite-affix.work追加
 4,cd ./docker/dev/app/
 5,docker-compose up -d
 6,docker exec -it app bash
 7,db migration and composer install&&update
 8 dev.nanite.workでアクセス。


