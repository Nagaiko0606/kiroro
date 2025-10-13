# 開発環境を構築する手順

## 環境
- Wordpress
- PHP
- Node.js[18.15.0]


## Docker
.envファイルにプロジェクト名設定

Dockerの立ち上げ
```bash
docker-compose up -d
```
Dockerの終了
```bash
docker compose down
```
### URL
http://localhost:8000/

### phpMyAdmin
http://localhost:8888/

### アップロードサイズ変更
1. コンテナIDを確認
```bash
docker ps
```
2. コンテナ内に入る
```bash
docker exec -it [コンテナID] bash
```
3. vimエディタのインストール
```bash
apt update
apt install -y vim
```
4. php.ini ファイルの作成
```bash
vi /usr/local/etc/php/php.ini
```
php.ini ファイル内には以下を記述してください。
```bash
post_max_size = 320M
upload_max_filesize = 320M
max_execution_time = 300
```
5. 再起動
```bash
service apache2 restart
```

## Node.js
```bash
npm install
gulp
```
### URL
http://localhost:3000/

### gulpとDockerを同期
```bash
const browserSyncOption = {
  proxy: 'localhost:8000',
  // server: DIST,
  reloadDelay: 100
}
```
