<p align="center"><img src="https://aws-ninaite-infra.s3.us-east-2.amazonaws.com/%E3%81%97%E3%81%A3%E3%81%A8%E3%82%8A%E4%BF%9D%E6%B9%BF%E3%82%BF%E3%82%A4%E3%83%95%E3%82%9A+%E3%83%8D%E3%83%AD%E3%83%AA+500ml.png"></p>

## app概要
地元の農業ボランティに参加した際に、個人農家の人で不足でマンパワー不足(高齢夫婦二人で営んでいた)、  
次の担い手不足と行った問題に直面しており、市で公開していたボランティアの求人の外部への公開度の低さが目立ていました。  
ボランティアを通じて、もっとカジュアルに農業体験ができれば,それを周知できる環境があればと思い作成しました。  

***ninaite-affix.work***

URLからブラウザーアクセス可能です。
テストユーザーでログインからお試しいただけます。



## app機能
-キーワード登録、検索  
-農園登録機能  
-案件投稿機能  
-検索機能  
-チャット機能  
-画像アップロード機能  
-ペジネーション  
-各種CRUD  




## 技術stack

**-backend**
    
laravel  

**-frontend**

js,Vue.js(cat機能実装に伴い一部採用、今後はSPA化を目指す) bootstrap  

**-開発環境**

docker docker-compose yml  


**infra**

ECS/Fargate　ELB　S3　RDS　route53　cloudwatch

**-CI/CD** 

circleci  
## Infrastructure architecture


## ER図

<p align="center"><img src="https://aws-ninaite-prod.s3-ap-northeast-1.amazonaws.com/Untitled+Diagram+(1).png"></p>

## 開発環境の構築
 1,mkdir ~/git/github  
 2,githubディレクトにてgit clone  
 3,sudo vim /etc/hosts ->127.0.0.1 dev.ninaite-affix.work追加  
 4,cd ./docker/dev/app/  
 5,docker-compose up -d  
 6,docker exec -it app bash  
 7,db migration and composer install&&update  
 8 dev.nanite.workでアクセス。  


