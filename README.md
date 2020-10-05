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

##技術stack
backend:laravel  

frontend:js,Vue.js(cat機能実装に伴い一部採用、今後はSPA化を目指す) bootstrap  

dev環境： docker docker-compose yml  

infra:aws(ECS,ELB,S3,RDS,route53,cloudwatch)  

CI/CD circleci  
## Infrastructure architecture
<p align="center"><img src="https://viewer.diagrams.net/?highlight=0000ff&edit=_blank&layers=1&nav=1&title=Untitled%20Diagram.drawio#R%3Cmxfile%3E%3Cdiagram%20id%3D%2229VhhJ1i6vlpa4bbFShj%22%20name%3D%22Page-1%22%3E5Vxde6I4FP41XuoDhC8v%2FezMbueZzrjP7O5VnwhR0yJhIVTbX78JBBSSqp1ixRkvWjiEfL3nPSc5J9oBo%2FX2JobR6gvxUdAxNH%2FbAeOOYRia67J%2FXPKcS1xbzwXLGPu5aE8wwy9ICDUhTbGPkkpBSkhAcVQVeiQMkUcrMhjHZFMttiBBtdUILpEkmHkwkKV%2FY5%2BuxCgMZyf%2FhPByVbSs2%2F38yRoWhcVIkhX0yWZPBCYdMIoJofnVejtCAZ%2B8Yl7y96avPC07FqOQnvLCNyN%2BgJ8mXz%2BDzacwDWEwivwusEXn6HMx4pikoY%2F4S1oHDElMV2RJWPFbQiIm1JnwAVH6LLCCKSVMtKLrQDxl%2FYmf%2F%2BHv9yzDLgT%2FMkFX62laWWS8FW3kd8%2F7d3coxmtEUSyE8mDF%2BBOSxh46MEIxQArjJaIHyhUVIr%2BiEGIubxBh3YmfWYEYBZDip6p%2BQKFmy7LcDgl2IcB4AzCi208wSEVLg9uhhBVJaYBDNCqVn8%2BVD5NVid8Tiilm6nwL5yi4IwmmmITs2ZxQStZ7BQYBXvIHlKM8hOLOY%2FPNQdjHlylyxNtfb5ec8z24SUAPRlHAquG13wcE%2BvdzGMDQy95d4CAYkYDEWafB1HItYDI5e93HrIHiWUhCdAhr3lW0PQiOeNo1DDGBwuyYfcHCzY7EhWi1x19XOxOeroTn9%2FGsY9gBa3g4j9nVkpZjbyXCsZ%2FIWBoTBwzds2JZ2E%2BBpGMzsyJh6RgKLM%2FFzcI37YHZYtzSREXCsTEGY3BeEtqaW0AlwOsDCTnTkpGzwbmQk81qy5FTcO4joGMLtwpwlmw%2BbfsDgTNNCSfuqGfiVoz83UuXn19m6O7F1hni1TuCWadLCIEj2c1qFXlPxVs1eMpuvINqssdDXvKzHm9BdmrO3Q4wprwvEgX48sJxJ9r%2B8mKMY1ZRTtGQK4WCUpo10h3OQxqTR7T3ZJF9PsAC8BEKvdSN4l7MCm8SJlE%2BHQu85f1QmQyzF6NcUz97vD9DdptfVUtxIJqxE6ZW0zJHYSgUvrmQvcdQUGv6l3vz7fPgxbOM9QvWzUVY%2BuYzGwoU%2BgO%2Bu2S3JEJhLpli3td37lfKXe4xQ2JqTRuSd1noUnl2fGeaRyEOYdwsxwWGp1FYFG4deyNud1E8eWKVJa8vAsyemEQU3xuN7Y3qnLXl9bQrc9ZqYG%2Bk5Kx5fFHWLmdvWDJH8Xz01V4%2FfvsyS2%2B0xPuRbv9kTrBdFLWOT3Shg3idBcb250vNiqNkCviDIfQelxliKt%2BaNTYoKKLki%2BjPeEUpj%2FwN%2BEwYU88PjR5mFFlgpgsxI8uaSX1IIfvH5WzBMU2Ih2HQzW67Ho69NIBx18v6YUwtnc%2FqEtNVOu%2FqhtuLwmUTLLNBlWXlFnWPZa6CZYWsefTlvc9k9P2qQhDIu1A4ydb7tZ2srSkWOn0ZzgL1xuEE4DiZL2kinROXMXa7TKQjzSqbRIos0GJaZD28t8Ar3LDPHSoAFWYAU2aGpYgVnC3UCoxWM6PwC8cjBU6rqAGuKuqZra5DRO%2BXkKINfH673%2FD3wgYIJrQ5utRciaEijCI3YZ3LlZgysoM1fGEjN7TZiYbvjZu31%2BMs9QRDUdFJWrTGvs%2B7KWlRqV6HFGmzwhTNIpjRd8N0qbaxK8ZZbEQy5WPFMVsx5hFZ5Q4uiomfelSEZKJYFZFJQDPqVdvaAVtWLVehWrp2LmNsymGBWTpnxDxNrV5RnzeAptqNK2Hi25Moa1IFUPb0Psm7XtVS0afDhitAC7pTl9vsbgwUzHGdvt636wrfhOUxa8phu7JyAE2lHc7ZtKPfJs98cujNbdoxq0P4JnDrgBWuo6gkH5MUxJeqsswq9i742GyA9WuaAcmNley9RgPhOkftQ3ku62Psg9X2tF%2BxL7yyba6lCB5MQMc1OkMruwCd4Uhc9LU9idsZuNmF3em7HXeSXQw7Q7fFW4EkCe4j6AfEe1SkDY4k0yWGa9mnIcbpetUsm4qtgAFkxpkNEC6a3oLV4iaY6SBxkrX%2FcPcHYh2SFeMjGLiXTxNVNpVPs04NROkXo6g6kXkZID5gokG7EpeWHPIrguLc81am3P4vJcWDbpLN4YAV0K1ou3u4C6QfqaWwb11h0nhVOFyhGNNz18bTKB2%2BH5hyy5LlVET9TJQ3UW32VHFNRZkhpFUFk8x33cqXe%2FgYsRmG83K5lqVMM%2FStYcca87qY%2BiZigddUeMaoh2d0S06Pqo6OGg3YZGUS8YRA%2F8UsgdqJnGgIjItZ3EPJ2rdkR5tIfr6yylEmQCs5UnVKdB6QZY%2BtvB7nMOh5pPfAeD7d5H%2B6%2FDABh9OYphE%2Fpc3To8x8MRymWRqUZ0cD5OEsCdpQ6syqL3H6veI03x6jdKCglKn39AaCnkolPeHQQTtWNadSrF0HEA71%2Bi2e9oI%2BkmebGTppslIlyX8vt2jrVadoKTYq9pmcolKVnGti68nfQbqYQ1R2W97UNznHXgCTBHuVaX7fuuPUadY%2FKH6rO7UzI%2F2zBV0PzceVmFsfsSXJ8%2B9mWK16UqavS4ZVlQxuwrAq4w4nfEOmHZZW2XvFwcyDX%2BFqSbBHFYJoyxbvXfNcHDltyTzLB2DXMOFmgX9fmw3l%2Bu2JdOxUk%2Fda54peqFO8xlV5oR93o3e6oGtIYD5FfN31a2Uvy694HzhWZatU3y5%2BBOENus9ud7%2FckK%2FXdr9%2FASb%2FAw%3D%3D%3C%2Fdiagram%3E%3Cdiagram%20id%3D%22JhD4l7Kq3Zc53R0_LXWL%22%20name%3D%22%E3%83%9A%E3%83%BC%E3%82%B82%22%3EldFBD4IgFADgX8OxLaVpnk2zQ63WWuvIBIENfQ5pWr8%2BG5oxL3Vh8PF48B4Ix2W31aQWe6BMIX9JO4Q3yPejVdCPb3hYCEbgWlJL3gRn%2BWQDLge9S8oaJ9AAKCNrF3OoKpYbx4jW0LphBSj31ppwNoNzTtRcr5IaYXXth5NnTHIx3uwFkd0pyRg8VNIIQqH9IpwgHGsAY2dlFzP17t3Yl3RXNLcoCw6hFKfdcc%2B1uCxssvSfI58SNKvMr6n7yfS0fuH8L05e%3C%2Fdiagram%3E%3C%2Fmxfile%3E"></p>


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


