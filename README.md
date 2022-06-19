# gulp + webpack　の使い方

- できること
  - SCSSコンパイル(FLOCSS)、CSS圧縮
	- JS圧縮・トランスパイル
	- Webp画像生成
	- 

# gulp + webpack　の使い方
- npm install でnode_modules生成
- themeNameを任意のテーマ名に変更
- npm run dev → 開発時
- npm run build → 納品時

# 注意
- 画像の圧縮は含めない。よってsrcファルだではなくassetsフォルダのimagesフォルダに圧縮した画像を直接保存。

# Webp画像の生成について
- 手順① assets > images > webpに圧縮した画像を保存。
- 手順② npm run webp　でWebp画像生成。
- 手順③ gulp cleanWebp でwebpフォルダ内のWebp画像以外を削除
- 注意...たまにWebp画像が生成されなかったりするのでその時は、npm run devを打ったり、もう一度コマンドを打って生成したりしてみる。

